<?php


use KPL\SAR\Domain\Model\Sar5;
use PHPUnit\Framework\TestCase;

class Sar5Test extends TestCase {
    public function testCanBeInstantiated(): void {
        $sar5 = new Sar5(1, "S1", "Jarkom", "A", "2019/2020 GASAL", "Informatika", "AJK", 1.0, 1.0, 2.0, 2.0, "Foo", true);

        $this->assertInstanceOf(Sar4::class, $sar5);
    }

    public function testCanBeInstantiatedWithoutOptionalParams(): void {
        $sar5 = new Sar5(1, "S1", "Jarkom", "A", "2019/2020 GASAL", "Informatika", "AJK", 1.0, 1.0, 2.0, 2.0, "Foo");

        $this->assertFalse($sar5->isLocked());
    }

    public function testCanGenerateArray(): void {
        $sar5 = new Sar5(1, "S1", "Jarkom", "A", "2019/2020 GASAL", "Informatika", "AJK", 1.0, 1.0, 2.0, 2.0, "Foo", true);
        $arrayResult = $sar5->generateToArray();

        $this->assertArrayHasKey("id", $arrayResult);
        $this->assertArrayHasKey("jenjang", $arrayResult);
        $this->assertArrayHasKey("periode", $arrayResult);
        $this->assertArrayHasKey("MkKelas", $arrayResult);
        $this->assertArrayHasKey("kelas", $arrayResult);
        $this->assertArrayHasKey("jurusan", $arrayResult);
        $this->assertArrayHasKey("sasaran", $arrayResult);
        $this->assertArrayHasKey("capaian", $arrayResult);
        $this->assertArrayHasKey("sasaran_jurusan", $arrayResult);
        $this->assertArrayHasKey("capaian_jurusan", $arrayResult);
        $this->assertArrayHasKey("pengisi", $arrayResult);
        $this->assertArrayHasKey("IsLocked", $arrayResult);
    }
}
