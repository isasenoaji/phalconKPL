<?php

namespace KPL\SAR\Domain\Model;

interface UserRepository {
	public function byId($nip, $password);
}