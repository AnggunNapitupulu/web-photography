<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Saran;
use App\Models\Camera;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\CatGallery;
use App\Models\OrderCamera;
use Illuminate\Support\Str;
use App\Models\ReturnCamera;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  private function getGallery()
  {
    return Gallery::all();
  }
  private function getUser()
  {
    return User::all()->skip(1);
  }
  private function getCamera()
  {
    return Camera::all();
  }
  private function getOrder()
  {
    return Order::all();
  }
  private function getCameraOrder()
  {
    return OrderCamera::all();
  }
  private function getContact()
  {
    return Contact::all();
  }
  private function getService()
  {
    return Service::all();
  }
  public function getComment()
  {
    return Saran::all();
  }
  private function getCatGallery()
  {
    return CatGallery::all();
  }
  private function getGalleryById($id)
  {
    return Gallery::find($id);
  }
  private function getCameraById($id)
  {
    return Camera::find($id);
  }
  private function getServiceById($id)
  {
    return Service::find($id);
  }
  private function getReturnCamera()
  {
    return ReturnCamera::all();
  }

  // Index
  public function index()
  {
    $orderGrafik = $this->countOrderByMonth();
    return view(
      'admin.index',
      [
        'services' =>  $this->getService(),
        'orders' =>  $this->getOrder(),
        'cameras' =>  $this->getCamera(),
        'users' =>  $this->getUser(),
        'title' => "Dashboard",
        'orderGrafik' => $this->fillOrderNullByMonth($orderGrafik),
      ],
    );
  }

  // Fill Order Null By Month
  private function fillOrderNullByMonth($data)
  {
    $month = [];
    for ($i = 1; $i <= 12; $i++) {
      $isNull = true;
      foreach ($data as $item) {
        if ($item->month == $i) {
          $month[$i] = $item->total;
          $isNull = false;
          break;
        }
      }
      if ($isNull) {
        $month[$i] = 0;
      }
    }
    return $month;
  }

  // Count Order By Month
  private function countOrderByMonth()
  {
    $countOrder = Order::selectRaw('count(*) as total, MONTH(service_date) as month')
      ->groupBy('month')
      ->get();
    return $countOrder;
  }

  // User
  public function user()
  {
    return view(
      'admin.user',
      [
        'users' =>  $this->getUser(),
        'title' => "User",
      ],
    );
  }

  // User Delete
  public function rmUser($id)
  {
    if ($this->deleteUser($id)) {
      return redirect()->back()->with('msg', 'User Account has been deleted');
    } else {
      return redirect()->back()->withErrors(['msg' => 'User Account is not available']);
    }
  }

  // User Delete Data
  private function deleteUser($id)
  {
    $user = User::find($id);
    return $user ? $user->delete() : False;
  }

  // Order
  public function order()
  {
    return view(
      'admin.order',
      array(
        'orders' =>  $this->getOrder(),
        'cameraorders' =>  $this->getCameraOrder(),
        'camerareturns' =>  $this->getReturnCamera(),
        'title' => "Order",
      ),
    );
  }

  // public function photograph()
  // {
  //     return view(
  //         'admin.photograph',
  //         array(
  //             'contacts' => $this->getContact(),
  //             'title' => "Photograph",
  //         ),
  //     );
  // }

  // Comment
  public function comment()
  {
    return view(
      'admin.comment',
      array(
        'comments' => $this->getComment(),
        'title' => 'Comment',
      ),
    );
  }

  // Comment Delete
  public function rmComment($id)
  {
    if ($this->deleteComment($id)) {
      return redirect()->back()->with('msg', 'Comment has been deleted');
    } else {
      return redirect()->back()->withErrors(['msg' => 'Comment id is not available']);
    }
  }

  // Comment Delete Data
  private function deleteComment($id)
  {
    $comment = Saran::find($id);
    return $comment ? $comment->delete() : False;
  }

  // Gallery
  public function gallery()
  {
    $galleries = $this->getGallery();

    foreach ($galleries as $gallery) {
      $gallery->path_image = $this->addPathImageGallery($gallery->path_image);
    }

    return view(
      'admin.gallery',
      [
        'galleries' =>  $galleries,
        'title' => "Gallery",
      ],
    );
  }

  // Gallery Create Page
  public function galleryCreate()
  {
    return view(
      'admin.createGallery',
      array(
        'title' => "Gallery",
        'categories' => $this->getCatGallery(),
      ),
    );
  }

  // Gallery Create Store
  public function galleryStore(Request $request)
  {
    $this->validate($request, [
      'title' => 'required|max:64',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);
    if ($request->category == "") {
      return redirect()->back()->with(['msgE' => 'Category is not available']);
    }

    if ($request->file('image') != "") {
      $file = $request->file('image');
      $input['imagename'] = time() . '.' . $file->getClientOriginalExtension();
      $destinationPath = public_path('/assets/images/gallery');
      $file->move($destinationPath, $input['imagename']);
    } else {
      return redirect()->back()->with('msg', 'Please select photo before upload');
    }

    $gallery = new Gallery();
    $gallery->title = $request->title;
    $gallery->path_image = $input['imagename'];
    $gallery->cat_gallery_id = $request->category;
    $gallery->save();

    return redirect()->back()->with('msg', 'Gallery has been added');
  }

  // Gallery Edit Page
  public function galleryUpdate($id)
  {
    $gallery = $this->getGalleryById($id);
    $gallery->path_image = $this->addPathImageGallery($gallery->path_image);
    return view(
      'admin.updateGallery',
      array(
        'title' => "Gallery",
        'gallery' => $gallery,
        'categories' => $this->getCatGallery(),
      ),
    );
  }



  // Gallery Update Store
  public function galleryUpdateStore(Request $request)
  {
    $this->validate($request, [
      'title' => 'required|max:64',
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ]);
    $image = $request->file('image');
    // check file is exist
    if ($image) {
      $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('/assets/images/gallery');
      $gallery = Gallery::find($request->id);
      $gallery->title = $request->title;
      $gallery->path_image = $input['imagename'];
      $gallery->cat_gallery_id = $request->category;
      $gallery->save();
      $image->move($destinationPath, $input['imagename']);
    } else {
      $gallery = Gallery::find($request->id);
      $gallery->title = $request->title;
      $gallery->cat_gallery_id = $request->category;
      $gallery->save();
    }
    return redirect()->back()->with('msg', 'Data has been updated');
  }

  // Gallery Delete
  public function rmGallery($id)
  {
    if ($this->deleteGallery($id)) {
      return redirect()->back()->with('msg', 'Gallery has been deleted');
    } else {
      return redirect()->back()->withErrors(['msg' => 'Gallery id is not available']);
    }
  }

  // Gallery Delete Data
  private function deleteGallery($id)
  {
    $gallery = Gallery::find($id);
    $destinationPath = public_path('/assets/images/gallery/' . $gallery->path_image);
    unlink($destinationPath);
    return $gallery ? $gallery->delete() : False;
  }

  // Add Path Image to Gallery
  private function addPathImageGallery($path)
  {
    $newPath = substr($path, 0, 4);
    if ($newPath == "http") {
      return $path;
    }
    $newPath = asset('assets/images/gallery/' . $path);
    return $newPath;
  }

  // Camera
  public function camera()
  {
    $cameras = $this->getCamera();

    foreach ($cameras as $camera) {
      $camera->photo = $this->addPathImageCamera($camera->photo);
    }
    return view(
      'admin.camera',
      [
        'cameras' =>  $cameras,
        'title' => "Camera",
      ],
    );
  }

  // Camera Create Page
  public function cameraCreate()
  {
    return view(
      'admin.createCamera',
      array(
        'title' => "Camera",
      ),
    );
  }

  // Camera Create Store
  public function cameraStore(Request $request)
  {
    $this->validate($request, [
      'camera' => 'required|max:30',
      'price' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $image = $request->file('image');
    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
    $destinationPath = public_path('/assets/images/camera');
    $camera = new Camera();
    $camera->camera = $request->camera;
    $camera->price = $request->price;
    $camera->description = $request->description;
    $camera->photo = $input['imagename'];
    $camera->save();
    $image->move($destinationPath, $input['imagename']);
    return redirect()->back()->with('msg', 'Camera has been added');
  }

  // Camera Edit Page
  public function cameraUpdate($id)
  {
    $camera = $this->getCameraById($id);
    $camera->photo = $this->addPathImageCamera($camera->photo);
    return view(
      'admin.updateCamera',
      array(
        'title' => "Camera",
        'camera' => $camera,
      ),
    );
  }

  // Camera Update Store
  public function cameraUpdateStore(Request $request)
  {
    $this->validate($request, [
      'camera' => 'required|max:32',
      'price' => 'required',
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $image = $request->file('image');
    // check file is exist
    if ($image) {
      $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
      $destinationPath = public_path('/assets/images/camera');
      $camera = Camera::find($request->id);
      $camera->camera = $request->camera;
      $camera->price = $request->price;
      $camera->description = $request->description;
      $camera->photo = $input['imagename'];
      $camera->save();
      $image->move($destinationPath, $input['imagename']);
    } else {
      $camera = Camera::find($request->id);
      $camera->camera = $request->camera;
      $camera->price = $request->price;
      $camera->description = $request->description;
      $camera->save();
    }
    return redirect()->back()->with('msg', 'Data has been updated');
  }

  // Camera Delete
  public function rmCamera($id)
  {
    if ($this->deleteCamera($id)) {
      return redirect()->back()->with('msg', 'Camera has been deleted');
    } else {
      return redirect()->back()->withErrors(['msg' => 'Camera id is not available']);
    }
  }

  // Camera Delete Data
  private function deleteCamera($id)
  {
    $camera = Camera::find($id);
    return $camera ? $camera->delete() : False;
  }

  // Add Path Image to Camera
  private function addPathImageCamera($path)
  {
    $newPath = substr($path, 0, 4);
    if ($newPath == "http") {
      return $path;
    }
    $newPath = asset('assets/images/camera/' . $path);
    return $newPath;
  }

  // Service
  public function service()
  {
    return view(
      'admin.service',
      array(
        'services' =>  $this->getService(),
        'title' => "Service",
      ),
    );
  }

  // Create Service Page
  public function serviceCreate()
  {
    return view(
      'admin.createService',
      array(
        'title' => "Service",
      ),
    );
  }

  // Create Service Store
  public function serviceStore(Request $request)
  {
    $this->validate($request, [
      'service' => 'required|max:30',
      'description' => 'required|max:255',
    ]);
    $service = new Service();
    $service->service = $request->service;
    $service->slug_service = Str::slug($request->service);
    $service->description = $request->description;
    $service->save();
    return redirect()->back()->with('msg', 'Service has been added');
  }

  // Service Edit Page
  public function serviceUpdate($id)
  {
    return view(
      'admin.updateService',
      array(
        'title' => "Service",
        'service' => $this->getServiceById($id),
      ),
    );
  }

  // Service Update Store
  public function serviceUpdateStore(Request $request)
  {
    $this->validate($request, [
      'service' => 'required|max:32',
      'description' => 'required|max:255',
    ]);
    $service = Service::find($request->id);
    $service->service = $request->service;
    $service->slug_service = Str::slug($request->service);
    $service->description = $request->description;
    $service->save();
    return redirect()->back()->with('msg', 'Data has been updated');
  }

  // Service Delete
  public function rmService($id)
  {
    if ($this->deleteService($id)) {
      return redirect()->back()->with('msg', 'Service has been deleted');
    } else {
      return redirect()->back()->withErrors(['msg' => 'Service id is not available']);
    }
  }

  // Service Delete Data
  private function deleteService($id)
  {
    $service = Service::find($id);
    return $service ? $service->delete() : False;
  }

  // Export Excel
  public function exportExcel()
  {
    return Excel::download(new OrdersExport, 'Order.xlsx');
  }

  // Export PDF
  public function exportPdf()
  {
    $orders = $this->getOrder();
    $pdf = PDF::loadView('admin.exportPdf', array('orders' => $orders));
    return $pdf->download('Order.pdf');
  }

  // Accept Order Camera
  public function acceptOrder($id)
  {
    return redirect()->back()->with('msg', 'Order has been accepted');
  }

  // Decline Order Camera
  public function declineOrder($id)
  {
    $order = OrderCamera::find($id);
    $order->delete();
    return redirect()->back()->with('msgD', 'Order has been declined');
  }

  // Accept Return Camera
  public function acceptReturn($id)
  {
    $retrunCamera = ReturnCamera::find($id);
    $retrunCamera->delete();
    return redirect()->back()->with('msg1', 'Return has been accepted');
  }

  // Decline Return Camera
  public function declineReturn($id)
  {
    $order = ReturnCamera::find($id)->only('camera_id', 'user_id', 'name', 'email', 'phone', 'photo', 'order_date', 'delivery_date');
    OrderCamera::create($order);
    $return = ReturnCamera::find($id);
    if (File::exists(public_path('images/camera/return/' . $return->photo))) {
      if (!File::exists(public_path('images/camera/order/' . $return->photo))) {
        File::move(public_path('images/camera/return/' . $return->photo), public_path('images/camera/order/' . $return->photo));
      }
      File::delete(public_path('images/camera/return/' . $return->photo));
    }
    $return->delete();
    return redirect()->back()->with('msg1D', 'Return has been declined');
  }
}
