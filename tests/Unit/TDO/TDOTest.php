<?php

namespace Tests\Unit\TDO;

use App\Exceptions\TDOValidationException;
use App\TDO\TDO;
use PHPUnit\Framework\TestCase;

class TDOTest extends TestCase
{
    /**
     * Test TDO can be get value as proparty.
     */
    public function test_tdo_get_as_proparty(): void
    {
        $data = [
            'key1' => 'value1',
            'key2' => 'value2'
        ];

        $tdo = new TDO($data);

        $this->assertEquals('value1', $tdo->key1, '__get on ' . TDO::class . ' not work');
        $this->assertEquals('value2', $tdo->key2, '__get on ' . TDO::class . ' not work');
        $this->assertNull($tdo->key3, '__get on ' . TDO::class . ' not work');
    }

    /**
     * Tet TDO can be converting ot array
     */
    public function test_tdo_to_array(): void
    {
        $data = [
            'key1' => 'value1',
            'key2' => 'value2'
        ];

        $tdo = new TDO($data);

        $this->assertSame($data, $tdo->toArray(), 'toArray on ' . TDO::class . ' not work');
    }

    /**
     * Test TDO can be get all data
     */
    public function test_tdo_all(): void
    {
        $data = [
            'key1' => 'value1',
            'key2' => 'value2'
        ];

        $tdo = new TDO($data);

        $this->assertSame($data, $tdo->all(), 'all on ' . TDO::class . ' not work');
    }

    /**
     * Test TDO can be has key.
     */
    public function test_tdo_has(): void
    {
        $data = [
            'key1' => 'value1',
            'key2' => 'value2'
        ];

        $tdo = new TDO($data);

        $this->assertTrue($tdo->has('key1'), 'has on ' . TDO::class . ' not work');
        $this->assertTrue($tdo->has('key2'), 'has on ' . TDO::class . ' not work');
        $this->assertFalse($tdo->has('key3'), 'has on ' . TDO::class . ' not work');
    }

    /**
     * Test TDO can be get all data with keys as snake case
     */
    public function test_tdo_as_snake(): void
    {
        $data = [
            'firstName' => 'jon',
            'lastName'  => 'don'
        ];

        $tdo = new TDO($data);

        $expectedData = [
            'first_name' => 'jon',
            'last_name'  => 'don'
        ];

        $this->assertSame($expectedData, $tdo->asSnake(), 'all on ' . TDO::class . ' not work');
    }

}
