<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequireTitleThreadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /*public function testTitleRequired()
    {
        $this->withExceptionHandling()->be($user = factory('App\User')->create());

        $thread = factory('App\Thread')->make(['title'=>null]);

        $this->post('/threads', $thread->toArray())->assertSessionHasErrors('title');
    }

    public function testBodyRequired()
    {
        $this->withExceptionHandling()->be($user = factory('App\User')->create());

        $thread = factory('App\Thread')->make(['body'=>null]);

        $this->post('/threads', $thread->toArray())->assertSessionHasErrors('body');
    }

    public function testChannelRequired()
    {
        $this->withExceptionHandling()->be($user = factory('App\User')->create());

        $thread = factory('App\Thread')->make(['channel_id'=>null]);

        $this->post('/threads', $thread->toArray())->assertSessionHasErrors('channel_id');
    }*/

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
