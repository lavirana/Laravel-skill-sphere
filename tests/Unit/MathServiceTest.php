<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MathServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_add_numbers(){
        $math = new \App\Services\MathService();
        $this->assertEquals(5, $math->add(2, 3));
    }
}
