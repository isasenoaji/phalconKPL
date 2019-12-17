<?php
declare(strict_types=1);

use KPL\SAR\Domain\Model\Sar2;
use PHPUnit\Framework\TestCase;

class Sar2Test extends TestCase {
    public function testCanBeInstantiated(): void {
        $sar2 = new Sar2(1, "S1", "2019/2020 GASAL", "FTIK", 1.0, 1.0, "Foo", true);

        $this->assertInstanceOf(Sar2::class, $sar2);
    }

    public function testCanBeInstantiatedWithoutOptionalParams(): void {
        $sar2 = new Sar2(1, "S1", "2019/2020 GASAL", "FTIK", 1.0, 1.0, "Foo");

        $this->assertFalse($sar2->isLocked());
    }

    public function testCanGenerateArray(): void {
        $sar2 = new Sar2(1, "S1", "2019/2020 GASAL", "FTIK", 1.0, 1.0, "Foo", true);
        $arrayResult = $sar2->generateToArray();

        $this->assertArrayHasKey("id", $arrayResult);
        $this->assertArrayHasKey("jenjang", $arrayResult);
        $this->assertArrayHasKey("periode", $arrayResult);
        $this->assertArrayHasKey("fakultas", $arrayResult);
        $this->assertArrayHasKey("sasaran", $arrayResult);
        $this->assertArrayHasKey("capaian", $arrayResult);
        $this->assertArrayHasKey("pengisi", $arrayResult);
        $this->assertArrayHasKey("IsLocked", $arrayResult);
    }
}
