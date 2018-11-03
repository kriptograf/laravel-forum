<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadCreatorTest extends TestCase
{
    /**
     * Test get creator thread.
     *
     * @return void
     */
    public function testHasCreator()
    {
        //Create thread
        $thread = factory('App\Thread')->create();
        //Get creator
        $this->assertInstanceOf('App\User', $thread->creator);
    }
}
