<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Stage;
use App\Models\Vector;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private readonly string $expertOneEnding = 'для <spam class="text-purple uppercase">Эксперта 1</spam>',
        private readonly string $expertTwoEnding = 'для <spam class="text-purple uppercase">Эксперта 2</spam>',
    ){}

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Stage::truncate();
        Vector::truncate();

        Stage::create([
            'expert' => 1,
            'description' => 'Сравнение альтернатив между собой <span class="text-purple uppercase">ВРЕМЯ РАЗРАБОТКИ </span>' . $this->expertOneEnding,
            'slug' => 'alternativesExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Сравнение альтернатив между собой <span class="text-purple uppercase">ВРЕМЯ РАЗРАБОТКИ </span>' . $this->expertTwoEnding,
            'slug' => 'alternativesExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">ВРЕМЯ РАЗРАБОТКИ </span>' . $this->expertOneEnding,
            'slug' => 'developmentTimeExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">ВРЕМЯ РАЗРАБОТКИ </span>' . $this->expertTwoEnding,
            'slug' => 'developmentTimeExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">СЛОЖНОСТЬ ВНЕДРЕНИЯ </span>' . $this->expertOneEnding,
            'slug' => 'complexityOfImplementationExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">СЛОЖНОСТЬ ВНЕДРЕНИЯ </span>' . $this->expertTwoEnding,
            'slug' => 'complexityOfImplementationExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">ТЕХНОЛОГИЧЕСКИЕ ВОЗМОЖНОСТИ </span>' . $this->expertOneEnding,
            'slug' => 'technologicalCapabilitiesExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">ТЕХНОЛОГИЧЕСКИЕ ВОЗМОЖНОСТИ </span>' . $this->expertTwoEnding,
            'slug' => 'technologicalCapabilitiesExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">СПРОС </span>' . $this->expertOneEnding,
            'slug' => 'demandExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">СПРОС </span>' . $this->expertTwoEnding,
            'slug' => 'demandExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">СЛОЖНОСТЬ РАЗРАБОТКИ </span>' . $this->expertOneEnding,
            'slug' => 'complexityOfDevelopmentExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <span class="text-purple uppercase">СЛОЖНОСТЬ РАЗРАБОТКИ </span>' . $this->expertTwoEnding,
            'slug' => 'complexityOfDevelopmentExpert2',
        ]);
        Stage::create([
            'description' => 'Финалочка',
            'slug' => 'final',
        ]);
    }
}
