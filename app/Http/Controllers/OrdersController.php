<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrdersController extends Controller
{

   /* public function __construct()
    {
        $this->middleware('auth.role:user')->except(['index', 'destroy']);
        $this->middleware('auth.role:admin')->except(['store', 'myOrders']);
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::joinEnumsToOrders();
        return $orders;
    }

    public function getIndexes()
    {
        $orders = Order::getAllOrders();
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'price' => 'required|integer',
            'phone_no' => 'required',
            'manufacture_date_from' => 'required|date|date_format:Y-m-d',
            'manufacture_date_to' => 'required|date|date_format:Y-m-d',
            'engine_power' => 'required|integer|min:0',
            'engine_volume' => 'required|integer|min:0',
            'mileage' => 'integer|min:0',
            'damage_id' => 'required|integer|min:0',
            'fuel_id' => 'required|integer|min:0',
            'gearbox_id' => 'required|integer|min:0',
            'body_type_id' => 'required|integer|min:0',
            'color_id' => 'required|integer|min:0',
            'steering_wheel_id' => 'required|integer|min:0',
            'number_of_doors_id' => 'required|integer|min:0',
            'driven_wheels_id' => 'required|integer|min:0',
            'climate_control_id' => 'required|integer|min:0',
            'euro_standard_id' => 'required|integer|min:0',
            'brand_id' => 'required|integer|min:0',
            'model_id' => 'required|integer|min:0'
        ]);

        $order = Order::storeOrder($request);
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $order;
    }

    public function myOrders()
    {
        $user = JWTAuth::parseToken()->toUser();

        $orders = Order::joinEnumsToUserOrders($user->id);

        return $orders;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'price' => 'required|integer',
            'phone_no' => 'required',
            'manufacture_date_from' => 'required|date|date_format:Y-m-d',
            'manufacture_date_to' => 'required|date|date_format:Y-m-d',
            'engine_power' => 'required|integer|min:0',
            'engine_volume' => 'required|integer|min:0',
            'mileage' => 'integer|min:0',
            'damage_id' => 'required|integer|min:0',
            'fuel_id' => 'required|integer|min:0',
            'gearbox_id' => 'required|integer|min:0',
            'body_type_id' => 'required|integer|min:0',
            'color_id' => 'required|integer|min:0',
            'steering_wheel_id' => 'required|integer|min:0',
            'number_of_doors_id' => 'required|integer|min:0',
            'driven_wheels_id' => 'required|integer|min:0',
            'climate_control_id' => 'required|integer|min:0',
            'euro_standard_id' => 'required|integer|min:0',
            'brand_id' => 'required|integer|min:0',
            'model_id' => 'required|integer|min:0'
        ]);

        $order = Order::updateOrder($request, $order);
        return $order;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order = Order::deleteOrder($order);
        return $order;
    }
}
