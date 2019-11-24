<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class Order extends Model
{
    protected $fillable = ['price','phone_no','manufacture_date_from','manufacture_date_to',
                          'engine_power','engine_volume','mileage','damage_id','status_id',
                          'fuel_id','gearbox_id','body_type_id','color_id','steering_wheel_id',
                          'number_of_doors_id','driven_wheels_id','climate_control_id','euro_standard_id',
                          'brand_id', 'model_id', 'user_id'];

    public static function storeOrder(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();

        $order = Order::create($request->except('user_id', 'status_id') + [
            'user_id' => $user->id,
            'status_id' => 1
          ]);
        return response()->json($order, 201);
    }

    public static function updateOrder(Request $request, Order $order)
    {
        $user = JWTAuth::parseToken()->toUser();
        $order->update($request->except('user_id') + [
            'user_id' => $user->id,
          ]);
       // $order->update($request->all());
        return response()->json($order, 200);
    }

    public static function deleteOrder(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }

    public static function getAllOrders()
    {
        return Order::orderBy('created_at', 'desc')->paginate(6);
    }

   /* public static function getAllUserOrders()
    {
        $user = JWTAuth::parseToken()->toUser();

        $orders = Order::where('orders.user_id', '=', $user->id)->orderBy('created_at', 'desc')->paginate(6);
        return $orders;
    }*/


    public static function joinEnumsToOrders()
    {
        $orders = Order::join('damage', 'orders.damage_id', '=', 'damage.id')
                ->join('status_types', 'orders.status_id', '=', 'status_types.id')
                ->join('fuel_types', 'orders.fuel_id', '=', 'fuel_types.id')
                ->join('gearbox_types', 'orders.gearbox_id', '=', 'gearbox_types.id')
                ->join('body_types', 'orders.body_type_id', '=', 'body_types.id')
                ->join('brands', 'orders.brand_id', '=', 'brands.id')
                ->join('models', 'orders.model_id', '=', 'models.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.id','orders.created_at','orders.updated_at',
                        'orders.phone_no','orders.brand_id', 'orders.model_id',
                        'orders.manufacture_date_from','orders.user_id', 'orders.status_id',
                        'orders.manufacture_date_to','orders.damage_id','orders.body_type_id',
                        'orders.climate_control_id','orders.euro_standard_id',
                        'orders.number_of_doors_id','orders.driven_wheels_id','orders.fuel_id',
                        'orders.color_id','orders.gearbox_id','orders.steering_wheel_id',
                        'orders.engine_power','orders.engine_volume','orders.price',
                        'status_types.name as status',
                        'fuel_types.name as fuel',
                        'gearbox_types.name as gearbox',
                        'body_types.name as body_type',
                        'brands.name as brand',
                        'models.name as model',
                        'users.name as user'
                        )
                ->orderBy('created_at', 'desc')->paginate(6);
        return $orders;
    }

    public static function joinEnumsToUserOrders($userid)
    {
        $orders = Order::join('status_types', 'orders.status_id', '=', 'status_types.id')
                ->join('fuel_types', 'orders.fuel_id', '=', 'fuel_types.id')
                ->join('gearbox_types', 'orders.gearbox_id', '=', 'gearbox_types.id')
                ->join('body_types', 'orders.body_type_id', '=', 'body_types.id')
                ->join('brands', 'orders.brand_id', '=', 'brands.id')
                ->join('models', 'orders.model_id', '=', 'models.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.id','orders.created_at','orders.updated_at',
                        'orders.price', 'orders.brand_id', 'orders.model_id',
                        'orders.phone_no','orders.user_id', 'orders.status_id',
                        'orders.manufacture_date_from','orders.damage_id','orders.body_type_id',
                        'orders.manufacture_date_to','orders.fuel_id','orders.color_id',
                        'orders.mileage','orders.gearbox_id','orders.steering_wheel_id',
                        'orders.engine_power','orders.climate_control_id','orders.euro_standard_id',
                        'orders.engine_volume', 'orders.number_of_doors_id','orders.driven_wheels_id',
                        'status_types.name as status',
                        'fuel_types.name as fuel',
                        'gearbox_types.name as gearbox',
                        'body_types.name as body_type',
                        'brands.name as brand',
                        'models.name as model',
                        'users.name as user'
                        )
                ->where('orders.user_id', '=', $userid)->orderBy('created_at', 'desc')->paginate(6);
        return $orders;
    }
}
