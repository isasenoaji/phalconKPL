<?php

namespace KPL\SAR\Application;


class SetSasaranSarResponse
{
    public $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

}