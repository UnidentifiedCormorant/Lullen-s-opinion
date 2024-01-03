<?php

namespace App\Domain\Entities;

use App\Models\Stage;
use App\Services\Math\CriteriaTable;

class StageConsoleLogEntity
{
    public function __construct
    (
        public Stage $stage,
        public array $tableTitles,
        public CriteriaTable $criteriaTable,
    )
    {
    }
}
