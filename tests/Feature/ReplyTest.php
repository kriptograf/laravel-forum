<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    /**
     * Test see reply for thread.
     *
     * @return void
     */
    public function testExample()
    {
        //Create thread
        $thread = factory('App\Thread')->create();

        //Create reply
        $reply = factory('App\Reply')->create(['thread_id'=>$thread->id]);

        $response = $this->get($thread->path());

        $response->assertSee($reply->body);
    }
}
