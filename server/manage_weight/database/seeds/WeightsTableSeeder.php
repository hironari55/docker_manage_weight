<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;

class WeightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample1 = [
            'date' => Date('2022-01-28'),
            'weight' => 69.8,
            'fat_percentage' => 17.5,
            'muscle_weight' => 54.65,
            'calorie_intake' => 1900,
        ];
        $sample2 = [
            'date' => Date('2022-01-29'),
            'weight' => 69.4,
            'fat_percentage' => 18.3,
            'muscle_weight' => 53.75,
            'calorie_intake' => 1500,
        ];
        $sample3 = [
            'date' => Date('2022-01-30'),
            'weight' => 69.3,
            'fat_percentage' => 17.8,
            'muscle_weight' => 54.0,
            'calorie_intake' => 1500,
        ];

        $sample_weights = [$sample1, $sample2, $sample3];

        $user = User::first();

        foreach($sample_weights as $sample_weight) {
            DB::table('weights')->insert([
                'date' =>$sample_weight['date'],
                'weight' => $sample_weight['weight'],
                'fat_percentage' => $sample_weight['fat_percentage'],
                'muscle_weight' => $sample_weight['muscle_weight'],
                'fat_weight' => $sample_weight['weight'] * $sample_weight['fat_percentage'] * 0.01,
                'calorie_intake' => $sample_weight['calorie_intake'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id,
            ]);
        }

    }
}
