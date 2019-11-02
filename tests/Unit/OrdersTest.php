<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Order;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory;


class OrdersTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        $response = $this->json('GET','api/orders');
   
        $response->assertStatus(200);

    }

    public function testShow()
	{
        $order = factory(Order::class)->create();
        $response = $this->json('GET', 'api/orders/' . $order->id);

        $response->assertStatus(200);
	}

    public function testStore()
    {
        $data = [
            'price' => 123,
            'phone_no' => 123,
            'manufacture_date_from' => '2019-01-02',
            'manufacture_date_to' => '2019-02-02',
            'engine_power' => 160,
            'engine_volume' => 3,
            'mileage' => 123,
            'damage_id' => 1,
            'status_id' => 1,
            'fuel_id' => 1,
            'gearbox_id' => 1,
            'body_type_id' => 1,
            'color_id' => 1,
            'steering_wheel_id' => 1,
            'number_of_doors_id' => 1,
            'driven_wheels_id' => 1,
            'climate_control_id' => 1,
            'euro_standard_id' => 1,
            'brand_id' => 2,
            'model_id' => 1,
            'user_id' => 1
        ];
    
        $response = $this->json('POST','api/orders', $data);

        $response
        ->assertStatus(201)
        ->assertJson([
            'price' => 123,
            'phone_no' => 123,
            'manufacture_date_from' => '2019-01-02',
            'manufacture_date_to' => '2019-02-02',
            'engine_power' => 160,
            'engine_volume' => 3,
            'mileage' => 123,
            'damage_id' => 1,
            'status_id' => 1,
            'fuel_id' => 1,
            'gearbox_id' => 1,
            'body_type_id' => 1,
            'color_id' => 1,
            'steering_wheel_id' => 1,
            'number_of_doors_id' => 1,
            'driven_wheels_id' => 1,
            'climate_control_id' => 1,
            'euro_standard_id' => 1,
            'brand_id' => 2,
            'model_id' => 1,
            'user_id' => 1
        ]);

    }

    public function testUpdate()
    {
    	$order = factory(Order::class)->create();

    	$data = [
            'price' => 1234
    	];

		$response = $this->json('PUT', 'api/orders/'.$order->id, $data)
			->assertStatus(200)
			->assertJson($data);
	}
	


	public function testDestroy()
	{
		$order = factory(Order::class)->create();

		$response = $this->json('DELETE', 'api/orders/'.$order->id, [])
			->assertStatus(204);
			
	}
}
