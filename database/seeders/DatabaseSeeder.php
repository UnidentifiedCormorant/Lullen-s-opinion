<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Stage;
use App\Models\Vector;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Stage::truncate();
        Vector::truncate();

        Stage::create([
            'expert' => 1,
            'description' => 'Сравнение альтернатив между собой <font color="blue">(Эксперт 1)</font>',
            'slug' => 'alternativesExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Сравнение альтернатив между собой <font color="red">(Эксперт 2)</font>',
            'slug' => 'alternativesExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">ВРЕМЯ РАЗРАБОТКИ</font> для <font color="red">Эксперта 1</font>',
            'slug' => 'developmentTimeExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">ВРЕМЯ РАЗРАБОТКИ</font> для <font color="red">Эксперта 2</font>',
            'slug' => 'developmentTimeExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">СЛОЖНОСТЬ ВНЕДРЕНИЯ</font> для <font color="red">Эксперта 1</font>',
            'slug' => 'complexityOfImplementationExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">СЛОЖНОСТЬ ВНЕДРЕНИЯ</font> для <font color="red">Эксперта 2</font>',
            'slug' => 'complexityOfImplementationExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">ТЕХНОЛОГИЧЕСКИЕ ВОЗМОЖНОСТИ</font> для <font color="red">Эксперта 1</font>',
            'slug' => 'technologicalCapabilitiesExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">ТЕХНОЛОГИЧЕСКИЕ ВОЗМОЖНОСТИ</font> для <font color="red">Эксперта 2</font>',
            'slug' => 'technologicalCapabilitiesExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">СПРОС</font> для <font color="red">Эксперта 1</font>',
            'slug' => 'demandExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">СПРОС</font> для <font color="red">Эксперта 2</font>',
            'slug' => 'demandExpert2',
        ]);

        Stage::create([
            'expert' => 1,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">СЛОЖНОСТЬ РАЗРАБОТКИ</font> для <font color="red">Эксперта 1</font>',
            'slug' => 'complexityOfDevelopmentExpert1',
        ]);
        Stage::create([
            'expert' => 2,
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">СЛОЖНОСТЬ РАЗРАБОТКИ</font> для <font color="red">Эксперта 2</font>',
            'slug' => 'complexityOfDevelopmentExpert2',
        ]);

        Stage::create([
            'expert' => '',
            'description' => 'Текущий этап: Сравнение альтернатив для критетрия <font color="blue">СЛОЖНОСТЬ РАЗРАБОТКИ</font> для <font color="red">Эксперта 2</font>',
            'slug' => 'complexityOfDevelopmentExpert2',
        ]);
    }
}
