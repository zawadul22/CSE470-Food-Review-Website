<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use App\Models\Review;


class ReviewTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->get('/review');
        $response->assertStatus(200);
    }

    public function testReview(){
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.png');
        
        $data = [
            'restaurant_id' => '34', 
            'review' => 'test review',
            'img' => $file
        ];
        
        $this->withoutMiddleware();
        $response = $this->post('/review', $data);
        $response->assertRedirect('/allReviews');
    }

    public function testReviewUpdate(){
        $row = Review::first();
        $data = [
            'comment' => 'test comment', 
        ];
        
        $this->withoutMiddleware();
        $response = $this->call('PUT', '/reviewUpdate/' . $row->id, $data, [], [], ['HTTP_REFERER' => '/myRestaurantReview']);
        $response->assertRedirect('/myRestaurantReview');
    }
}



