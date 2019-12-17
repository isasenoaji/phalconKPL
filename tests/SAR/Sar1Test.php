<?php
declare(strict_types=1);

use KPL\SAR\Domain\Model\Sar1;
use PHPUnit\Framework\TestCase;

class Sar1Test extends TestCase {
    public function testCanBeInstantiated(): void {
        $sar1 = new Sar1(1, "S1", "2019/2020 GASAL", 1.0, 1.0, "Foo", true);

        $this->assertInstanceOf(Sar1::class, $sar1);
    }

    public function testCanBeInstantiatedWithoutOptionalParams(): void {
        $sar1 = new Sar1(1, "S1", "2019/2020 GASAL", 1.0, 1.0, "Foo");

        $this->assertFalse($sar1->isLocked());
    }

    public function testCanGenerateArray(): void {
        $sar1 = new Sar1(1, "S1", "2019/2020 GASAL", 1.0, 1.0, "Foo", true);
        $arrayResult = $sar1->generateToArray();

        $this->assertArrayHasKey("id", $arrayResult);
        $this->assertArrayHasKey("jenjang", $arrayResult);
        $this->assertArrayHasKey("periode", $arrayResult);
        $this->assertArrayHasKey("sasaran", $arrayResult);
        $this->assertArrayHasKey("capaian", $arrayResult);
        $this->assertArrayHasKey("pengisi", $arrayResult);
        $this->assertArrayHasKey("IsLocked", $arrayResult);
    }
}
