<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateThreadTest extends TestCase
{
    /**
     * A test authenticated user can create new forum threads.
     *
     * @return void
     */
    public function testAuthenticatedUserCanCreateNewForumThreads()
    {
        //Give we have a signed in user
        $this->actingAs(factory('App\User')->create());

        //When we hit the endpoint to create a new thread
        $thread = factory('App\Thread')->create();
        $this->post('/threads', $thread->toArray());

        //Then, when we visit the thread page
        $response = $this->get($thread->path());

        //We should see the new thread
        $response->assertSee($thread->title)->assertSee($thread->body);
    }
}
