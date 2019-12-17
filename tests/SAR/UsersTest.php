<?php
declare(strict_types=1);

use KPL\SAR\Domain\Model\Users;
use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase {
    public function testCanBeInstantiated(): void {
        $user = new Users(10, "Foo", 5, "foobar");

        $this->assertInstanceOf(Users::class, $user);
    }

    public function testCanAddJabatan(): void  {
        $user = new Users(10, "Foo", 5, "foobar");
        $user->addJabatan("Dekan");
        $jabatan = $user->jabatan();

        $this->assertEquals("Dekan", $jabatan[0]);
    }
}
