<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Comment;
use App\Ad;
use Faker\Factory;

class CommentsTest extends TestCase
{
	use DatabaseTransactions;

    public function testIndex()
    {
		//$ad = 506;
		
		$comments = factory(Comment::class)->create();
	
		$response = $this->json('GET','api/ads/' . $comments->ad_id . '/comments')
			->assertStatus(200)
			->assertJson([$comments->toArray()]);
    }

    public function testUpdate()
    {
    	$comment = factory(Comment::class)->create();

    	$data = [
	        'title' => 'tit',
			'body' => 'body',
    	];

		$response = $this->json('PUT','api/ads/' . $comment->ad_id . '/comments/' . $comment->id, $data) 
			->assertStatus(200)
			->assertJson($data);
	}
	
	public function testShow()
	{
		$comment = factory(Comment::class)->create();

        $response = $this->json('GET','api/ads/' . $comment->ad_id . '/comments/' . $comment->id) 
            ->assertStatus(200);
	}


	public function testDestroy()
	{
		$comment = factory(Comment::class)->create();

		$response = $this->json('DELETE','api/ads/' . $comment->ad_id . '/comments/' . $comment->id) 
			->assertStatus(204);
			
	}

	public function testStore()
    {
		$ad = factory(Ad::class)->create()->id;
    	$data = [
	        'title' => 'tit',
			'body' => 'body',
			'ad_id' => $ad
    	];
    
        $response = $this->json('POST','api/ads/' . $ad . '/comments', $data)
			->assertStatus(201)
			->assertJson([
				'title' => 'tit',
				'body' => 'body',
				'ad_id' => $ad
			]);
		
	}
	


}
