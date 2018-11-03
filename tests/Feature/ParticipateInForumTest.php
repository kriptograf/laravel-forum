<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
    //use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testParticipateInForum()
    {
        //Give we have authenticated user
        //$user = factory('App\User')->create();
        $this->be($user = factory('App\User')->create());

        //Give existing thread
        $thread = factory('App\Thread')->create();

        //When the user add reply to thread
        $reply = factory('App\Reply')->make();
        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())->assertSee($thread->body);

    }

    public function testUnauthenticatedUsersNotAddReplies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = factory('App\Thread')->create();

        //When the user add reply to thread
        $reply = factory('App\Reply')->make();
        $this->post($thread->path().'/replies', $reply->toArray());
    }
}
