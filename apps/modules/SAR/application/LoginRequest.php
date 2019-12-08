<?php

namespace KPL\SAR\Application;

class LoginRequest
{
    public $nip;
    public $password;

    public function __construct($nip, $password)
    {
        $this->nip = $nip;
        $this->password = $password;
    }

}