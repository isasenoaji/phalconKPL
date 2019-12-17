<?php


use KPL\SAR\Domain\Model\Sar3;
use PHPUnit\Framework\TestCase;

class Sar3Test extends TestCase {
    public function testCanBeInstantiated(): void {
        $sar3 = new Sar3(1, "S1", "2019/2020 GASAL", "Informatika", 1.0, 1.0, "Foo", true);

        $this->assertInstanceOf(Sar3::class, $sar3);
    }

    public function testCanBeInstantiatedWithoutOptionalParams(): void {
        $sar3 = new Sar3(1, "S1", "2019/2020 GASAL", "Informatika", 1.0, 1.0, "Foo");

        $this->assertFalse($sar3->isLocked());
    }

    public function testCanGenerateArray(): void {
        $sar3 = new Sar3(1, "S1", "2019/2020 GASAL", "FTIK", 1.0, 1.0, "Foo", true);
        $arrayResult = $sar3->generateToArray();

        $this->assertArrayHasKey("id", $arrayResult);
        $this->assertArrayHasKey("jenjang", $arrayResult);
        $this->assertArrayHasKey("periode", $arrayResult);
        $this->assertArrayHasKey("jurusan", $arrayResult);
        $this->assertArrayHasKey("sasaran", $arrayResult);
        $this->assertArrayHasKey("capaian", $arrayResult);
        $this->assertArrayHasKey("pengisi", $arrayResult);
        $this->assertArrayHasKey("IsLocked", $arrayResult);
    }
}
