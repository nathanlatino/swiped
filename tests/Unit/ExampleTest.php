<?php

namespace Tests\Unit;

use App\Swipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->call('get','/api/swipe');
        print($response);
    }
}
