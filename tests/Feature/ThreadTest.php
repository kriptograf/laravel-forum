<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    public function testCanMakeStringPath()
    {
        $thread = factory('App\Thread')->create();
        $this->assertEquals('/threads/'.$thread->channel->slug.'/'.$thread->id, $thread->path());
    }

    /**
     * Test see has one thread.
     *
     * @return void
     */
    public function testHasOneThread()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get($thread->path());

        $response->assertSee($thread->title);
    }

    /**
     * Test can add reply
     */
    public function testThreadCanAddReply()
    {
        $thread = factory('App\Thread')->create();

        $thread->addReply([
            'user_id'=>1,
            'body'=>'test'
        ]);

        $this->assertCount(1, $thread->replies);
    }
}
