<?php


use KPL\SAR\Domain\Model\Sar4;
use PHPUnit\Framework\TestCase;

class Sar4Test extends TestCase {
    public function testCanBeInstantiated(): void {
        $sar4 = new Sar4(1, "S1", "2019/2020 GASAL", "AJK", 1.0, 1.0, "Informatika", 2.0, 2.0, "Foo", true);

        $this->assertInstanceOf(Sar4::class, $sar4);
    }

    public function testCanBeInstantiatedWithoutOptionalParams(): void {
        $sar4 = new Sar4(1, "S1", "2019/2020 GASAL", "AJK", 1.0, 1.0, "Informatika", 2.0, 2.0, "Foo");

        $this->assertFalse($sar4->isLocked());
    }

    public function testCanGenerateArray(): void {
        $sar4 = new Sar4(1, "S1", "2019/2020 GASAL", "AJK", 1.0, 1.0, "Informatika", 2.0, 2.0, "Foo", true);
        $arrayResult = $sar4->generateToArray();

        $this->assertArrayHasKey("id", $arrayResult);
        $this->assertArrayHasKey("jenjang", $arrayResult);
        $this->assertArrayHasKey("periode", $arrayResult);
        $this->assertArrayHasKey("jurusan", $arrayResult);
        $this->assertArrayHasKey("sasaran", $arrayResult);
        $this->assertArrayHasKey("capaian", $arrayResult);
        $this->assertArrayHasKey("sasaran_jurusan", $arrayResult);
        $this->assertArrayHasKey("capaian_jurusan", $arrayResult);
        $this->assertArrayHasKey("pengisi", $arrayResult);
        $this->assertArrayHasKey("IsLocked", $arrayResult);
    }
}
