<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\OrderCamera;
use App\Models\ReturnCamera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class CameraController extends Controller
{
    protected function validateOrders(Request $request,$version = 1)
    {
        $validator = Validator::make($request->all(), $this->rules($version), $this->messages());
        return $validator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cameras = Camera::all();
        return view('auth.user.camera.index',compact('cameras'));
    }


    public function order(){
        $cameras = Camera::all();
        $orderCameras = OrderCamera::where('user_id',auth()->user()->id)->get();
        return view('auth.user.camera.order',compact('cameras','orderCameras'));
    }

    public function postOrder(Request $request){
        $validated = $this->validateOrders($request);
        // dd($validated);
        // return redirec back
        // return $inputs;
        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput();
        }else{     
            $inputs = $request->only(['camera_id', 'name', 'email', 'phone', 'photo', 'order_date', 'delivery_date']);
            $inputs['user_id'] = auth()->user()->id;
            // store file photo
            $file = $request->file('photo');
            // dd($file);
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/images/camera/order/'), $fileName);
            $inputs['photo'] = $fileName;
            $order = OrderCamera::create($inputs);
            return redirect()->route('user.camera.order')->with('success', 'Order has been created');
        }
    }

    public function postReturn(Request $request){
        $camera = $request->camera;
        $camera_id = Camera::where('camera', $camera)->first()->id;
        $orderCamera = OrderCamera::where('camera_id', $camera_id)->first();
        $request->merge(['camera_id' => $camera_id]);
        $validated = $this->validateOrders($request,2);
        if($validated->fails()){
            return response()->json([
                'code' => 400,
                'errors' => $validated->getMessageBag(),
            ]);
        }else{
            $returnPath = '/images/camera/return/';
            $orderPath = '/images/camera/order/';
            $inputs = $request->only(['camera_id', 'name', 'email', 'phone', 'order_date', 'delivery_date']);
            $inputs['user_id'] = auth()->user()->id;
            // store file photo
            $file = $request->file('photo2');
            // dd($file);
            $fileName = $file->getClientOriginalName();
            $file->move(public_path($returnPath), $fileName);
            $inputs['photo'] = $fileName;
            $order = ReturnCamera::create($inputs);
            if(File::exists(public_path($orderPath.$orderCamera->photo))) {
                File::delete(public_path($orderPath.$orderCamera->photo));
            }
            $orderCamera->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Orden has been returned',
            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Support\Facades\Validator;
     */

    protected function rules($version){
        if($version == 1){
        return [
            'camera_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'photo' => 'required',
            'order_date' => 'required|date|after:today',
            'delivery_date' => 'required|date|after:order_date',
        ];
    } else  if($version == 2){
        return [
            'camera_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'photo2' => 'required',
            'order_date' => 'required|date',
            'delivery_date' => 'required|date|after:order_date',
        ];
    }
    }

    protected function messages(){
        return [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must be a valid email address.',
            'image' => 'The :attribute must be an image.',
            'mimes' => 'The :attribute must be a file of type: jpeg, jpg, png',
            'date' => 'The :attribute field is not a valid date.',
            'after' => 'The :attribute field must be a date after :date.',
        ];
    }
}