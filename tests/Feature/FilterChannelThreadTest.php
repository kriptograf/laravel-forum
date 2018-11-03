<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FilterChannelThreadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $channel = factory('App\Channel')->create();

        $threadInChannel = factory('App\Thread')->create(['channel_id'=>$channel->id]);

        //dd($threadInChannel);
        $threadNotInChannel = factory('App\Thread')->create();

        $this->get('/threads/'.$channel->slug)
        ->assertSee($threadInChannel->title)
        ->assertSee($threadNotInChannel->title);
    }
}
