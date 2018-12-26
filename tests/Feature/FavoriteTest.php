<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FavoriteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $reply = factory('App\Reply')->create();
        $this->post('replies/'.$reply->id.'/favorites');
        $this->assertCount(1, $reply->favorites);
    }
}
