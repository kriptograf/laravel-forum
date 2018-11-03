<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{
    /**
     * Test where user can browse all threads.
     *
     * @return void
     */
    public function testUserCanBrowseThreads()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);
    }
}
