<?php

namespace App\Domain\Entities;

use App\Models\Stage;
use App\Services\Math\CriteriaTable;

class FinalStageEntity
{
    public string $winner = 'Эксперт ';
    public string $winnerColor = 'purple';

    public function __construct
    (
        public ExpertSummary $expertOneSummary,
        public ExpertSummary $expertTwoSummary,
    )
    {
        $this->winner .= $this->expertOneSummary->maxFinalWeight > $this->expertTwoSummary->maxFinalWeight ? '1' : '2' ;

        if($this->winner === 'Эксперт 2'){
            $this->winnerColor = 'azur';
        }
    }
}
