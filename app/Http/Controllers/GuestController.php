<?php

namespace App\Http\Controllers;

use App\Models\CatGallery;
use App\Models\Gallery;
use App\Models\Camera;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Saran;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        foreach ($galleries as $gallery) {
            $gallery->path_image = $this->addPathImageGallery($gallery->path_image);
        }
        $catgalleries = CatGallery::all();
        $cameras = Camera::all();
        foreach ($cameras as $camera) {
            $camera->photo = $this->addPathImageCamera($camera->photo);
        }
        $contact = Contact::first();
        $services = Service::all();
        $contacts = Contact::all();
        return view('guest.index', compact('galleries', 'catgalleries', 'cameras', 'services', 'contacts', 'contact'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('guest.contact', compact('contact'));
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

    public function comment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'required|email|max:64',
            'phone' => 'required|numeric',
            'subject' => 'required|max:64',
            'message' => 'required|max:255',
        ]);
        $saran = new Saran;
        $saran->name = $request->name;
        $saran->email = $request->email;
        $saran->phone = $request->phone;
        $saran->subject = $request->subject;
        $saran->message = $request->message;
        $saran->save();
        // redirect route with #comment
        return redirect()->route('baseC')->with('msg', 'Comment has been sent successfully.');
    }
}