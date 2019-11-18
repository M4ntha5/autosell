<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrdersController extends Controller
{

    /*public function __construct()
    {
      $this->middleware('auth.role:admin')->except(['store']);
      $this->middleware('auth.role:user')->except(['index', 'destroy']);
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'price' => 'required|decimal',
            'phone_no' => 'required|regex:/(+370)[0-9]{8}/',
            'manufacture_date_from' => 'required|date|date_format:Y-m-d',
            'manufacture_date_to' => 'required|date|date_format:Y-m-d',
            'engine_power' => 'required|integer|min:0',
            'engine_volume' => 'required|decimal|min:0',
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
            'price' => 'required|decimal',
            'phone_no' => 'required|regex:/(+370)[0-9]{8}/',
            'manufacture_date_from' => 'required|date|date_format:Y-m-d',
            'manufacture_date_to' => 'required|date|date_format:Y-m-d',
            'engine_power' => 'required|integer|min:0',
            'engine_volume' => 'required|decimal|min:0',
            'mileage' => 'integer|min:0',
            'status_id' => 'required|min:0',
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
