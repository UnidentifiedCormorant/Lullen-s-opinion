<?php

namespace App\Domain\Entities;

use App\Models\Stage;

class StartPageEntity
{
    public function __construct
    (
        public bool $progress,
        public Stage $stage
    )
    {
    }
}
