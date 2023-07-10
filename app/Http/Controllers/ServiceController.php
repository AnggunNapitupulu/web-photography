<?php

namespace App\Http\Controllers;

use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('auth.user.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $service = Service::where('slug_service', $slug)->first();
        // Dynamic take from model collections
        $services = Service::skip($service->id)->take(3)->get();
        $relatedServices = collect($services);
        $forTaked = 0;
        if ($services->count() < 3) {
            $forTaked = 3 - $services->count();
            // return $forTaked;
            // Service::take($forTaked)->get()->dd();
            foreach (Service::take($forTaked)->get() as $object) :
                $relatedServices->push($object);
            endforeach;
        }
        return view('guest.service', compact('service', 'relatedServices'));
    }

    public function orderService()
    {
        $data = session()->get('status');
        if ($data == "LOGIN") {
            $services = Service::all();
            $orderlists = \App\Models\Order::where('user_id', auth()->user()->id)->get();
            return view('auth.user.service.order', compact('services', 'orderlists'));
        } else {
            return view('auth.login', ['title' => 'Login User']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
