<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory;


class UsersTest extends TestCase
{
    use DatabaseTransactions;

    public function testIndex()
    {
        $response = $this->json('GET','api/users');
   
        $response->assertStatus(200);

    }

    public function testShow()
	{
        $user = factory(User::class)->create();
        $response = $this->json('GET', 'api/users/' . $user->id);

        $response->assertStatus(200);
	}


    public function testUpdate()
    {
    	$user = factory(User::class)->create();

    	$data = [
            'email' => 'email2',
    	];

		$response = $this->json('PUT', 'api/users/'.$user->id, $data)
			->assertStatus(200)
			->assertJson($data);
	}
	


	public function testDestroy()
	{
		$user = factory(User::class)->create();

		$response = $this->json('DELETE', 'api/users/'.$user->id, [])
			->assertStatus(204);
			
	}
}
