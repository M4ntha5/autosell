<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $fillable = ['price','phone_no','manufacture_date_from','manufacture_date_to',
                          'engine_power','engine_volume','mileage','damage_id','status_id',
                          'fuel_id','gearbox_id','body_type_id','color_id','steering_wheel_id',
                          'number_of_doors_id','driven_wheels_id','climate_control_id','euro_standard_id',
                          'brand_id', 'model_id', 'user_id'];

    public static function storeOrder()
    {
        $order = Order::create($request->all());
        return response()->json($order, 201);
    }
    public static function updateOrder(Request $request, Order $order)
    {
        $order->update($request->all());
        return response()->json($order, 200);
    }

    public static function deleteOrder(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }


    public static function joinEnumsToOrders()
    {
        $orders = Order::join('damage', 'orders.damage_id', '=', 'damage.id')
                ->join('status_types', 'orders.status_id', '=', 'status_types.id')
                ->join('fuel_types', 'orders.fuel_id', '=', 'fuel_types.id')
                ->join('gearbox_types', 'orders.gearbox_id', '=', 'gearbox_types.id')
                ->join('body_types', 'orders.body_type_id', '=', 'body_types.id')
                ->join('colors', 'orders.color_id', '=', 'colors.id')
                ->join('steering_wheel', 'orders.steering_wheel_id', '=', 'steering_wheel.id')
                ->join('number_of_doors', 'orders.number_of_doors_id', '=', 'number_of_doors.id')
                ->join('driven_wheels', 'orders.driven_wheels_id', '=', 'driven_wheels.id')
                ->join('climate_control', 'orders.climate_control_id', '=', 'climate_control.id')
                ->join('euro_standard', 'orders.euro_standard_id', '=', 'euro_standard.id')
                ->join('brands', 'orders.brand_id', '=', 'brands.id')
                ->join('models', 'orders.model_id', '=', 'models.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select( 'orders.id','orders.created_at','orders.updated_at',
                        'orders.price',
                        'orders.phone_no',
                        'orders.manufacture_date_from',
                        'orders.manufacture_date_to',
                        'orders.mileage',
                        'orders.engine_power',
                        'orders.engine_volume',
                        'damage.name as damage',
                        'status_types.name as status',
                        'fuel_types.name as fuel',
                        'gearbox_types.name as gearbox',
                        'body_types.name as body_type',
                        'colors.name as color',
                        'steering_wheel.name as steering_wheel',
                        'number_of_doors.name as number_of_doors',
                        'driven_wheels.name as driven_wheels',
                        'climate_control.name as climate_control',
                        'euro_standard.name as euro_standard',
                        'brands.name as brand',
                        'models.name as model',
                        'users.name as user'
                        )
                ->orderBy('created_at', 'desc')->paginate(6);
        return $orders;
    }
}
