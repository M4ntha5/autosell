<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Ad;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdUnitTest extends TestCase
{
    use DatabaseTransactions;


    public function testIndex()
    {
        $response = $this->json('GET','api/ads');
   
        $response
        ->assertStatus(200);

    }

    public function testShow()
	{
        $ad = factory(Ad::class)->create();
        $response = $this->json('GET', 'api/ads/' . $ad->id);

        $response->assertStatus(200);
	}

    public function testStore()
    {
        $data = [
            'price' => 123,
            'phone_no' => 123,
            'description' => 'desc',
            'manufacture_date' => '2019-02-02',
            'mileage' => 123,
            'engine_power' => 160,
            'engine_volume' => 3,
            'damage_id' => 1,
            'fuel_id' => 1,
            'gearbox_id' => 1,
            'body_type_id' => 1,
            'color_id' => 1,
            'steering_wheel_id' => 1,
            'number_of_doors_id' => 1,
            'driven_wheels_id' => 1,
            'climate_control_id' => 1,
            'euro_standard_id' => 1,
            'brand_id' => 1,
            'model_id' => 1,
            'user_id' => 1
        ];
    
        $response = $this->json('POST','api/ads', $data);

        $response
        ->assertStatus(201)
        ->assertJson([
            'price' => 123,
            'phone_no' => 123,
            'description' => 'desc',
            'manufacture_date' => '2019-02-02',
            'mileage' => 123,
            'engine_power' => 160,
            'engine_volume' => 3,
            'damage_id' => 1,
            'fuel_id' => 1,
            'gearbox_id' => 1,
            'body_type_id' => 1,
            'color_id' => 1,
            'steering_wheel_id' => 1,
            'number_of_doors_id' => 1,
            'driven_wheels_id' => 1,
            'climate_control_id' => 1,
            'euro_standard_id' => 1,
            'brand_id' => 1,
            'model_id' => 1,
            'user_id' => 1
        ]);

    }

    public function testUpdate()
    {
    	$ad = factory(Ad::class)->create();

    	$data = [
            'price' => 1234
    	];

		$response = $this->json('PUT', 'api/ads/'.$ad->id, $data)
			->assertStatus(200)
			->assertJson($data);
	}
	


	public function testDestroy()
	{
		$ad = factory(Ad::class)->create();

		$response = $this->json('DELETE', 'api/ads/'.$ad->id, [])
			->assertStatus(204);
			
	}

}
