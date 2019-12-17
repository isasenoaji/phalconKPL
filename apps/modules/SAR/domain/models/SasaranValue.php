<?php


namespace KPL\SAR\Domain\Model;


class SasaranValue {
    private $sasaranValue;

    public function __construct($sasaranValue) {
        if ($sasaranValue >= 0 && $sasaranValue <= 4) {
            $this->sasaranValue = $sasaranValue;
        } else {
            throw new \InvalidArgumentException();
        }
    }

    public function sasaranValue() {
        return $this->sasaranValue;
    }
}