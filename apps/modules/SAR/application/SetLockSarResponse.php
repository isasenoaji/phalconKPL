<?php

namespace KPL\SAR\Application;

class SetLockSarResponse
{
    public $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

}