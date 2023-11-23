<?php

namespace App\Domain\Entities;

use App\Models\Stage;

class StageEntity
{
    public function __construct
    (
        public Stage $stage,
        public array $buttonsTitles,
    )
    {
    }
}
