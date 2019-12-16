<?php

namespace KPL\SAR\Application;

class SarListedResponse
{
    public $list;

    public function __construct( $list)
    {
        $this->list = $list;
    }

}