<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;

use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateOrders(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        return $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $this->validateOrders($request);
        // dd($validated);
        // return redirec back
        // return $inputs;
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        } else {
            $inputs = $request->only(['service_id', 'name', 'email', 'phone', 'service_date']);
            $inputs['user_id'] = auth()->user()->id;
            // Update user phone
            $order = Order::create($inputs);
            return redirect()->route('user.service.order')->with('success', 'Order has been created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if ($order->user_id == auth()->user()->id) {
            $order->delete();
            return redirect()->route('user.service.order')->with('success-delete', 'Order has been deleted');
        } else {
            abort(404);
        }
    }

    protected function rules()
    {
        return [
            'service_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'service_date' => 'required|date|after:today',
        ];
    }

    protected function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'date' => 'The :attribute field must be a date.',
            'after' => 'The :attribute field must be a date after today.',
        ];
    }
}
