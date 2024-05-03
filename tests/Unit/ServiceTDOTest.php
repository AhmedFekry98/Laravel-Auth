<?php

namespace Tests\Unit;

use App\TDO\ServiceTDO;
use PHPUnit\Framework\TestCase;

class ServiceTDOTest extends TestCase
{
    /**
     * Test success TDO
     */
    public function test_success_tdo(): void
    {
        $tdo = new ServiceTDO([
            'name' => 'jon don',
            'age'  => 40
        ]);

        $this->assertFalse($tdo->isError(), "isError() oon " . ServiceTDO::class . " not works");
        $this->assertNull($tdo->errorMessage(), "errorMessage() oon " . ServiceTDO::class . " not works");
        $this->assertNull($tdo->errorCode(), "errorCode() oon " . ServiceTDO::class . " not works");

        $this->assertEquals(
            [
                'name' => 'jon don',
                'age'  => 40
            ],
            $tdo->data(),
            "data() oon " . ServiceTDO::class . " not works"
        );
    }
}
