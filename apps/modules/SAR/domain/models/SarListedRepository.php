<?php

namespace KPL\SAR\Domain\Model;

interface SarListedRepository {
	public function getList($nip);
}