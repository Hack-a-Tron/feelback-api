<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \App\FeelBack\Persistence\ActiveRecord\Emotion;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('EmotionSeeder');
    }
}

/**
 * Class EmotionSeeder
 */
class EmotionSeeder extends Seeder
{
    public function run()
    {
        DB::table('emotion')->delete();

        Emotion::create([
            'code'        => 'INC268A99T',
            'name'        => 'Joy',
            'description' => '',
            'image'       => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'O83FCDHPLM',
            'name'        => 'Trust',
            'description' => '',
            'image'       => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'AGYNHQK8S6',
            'name'        => 'Fear',
            'description' => '',
            'image'       => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'CVPBNMJOHN',
            'name'        => 'Surprise',
            'description' => '',
            'image'       => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'NN029SZHF9',
            'name'        => 'Sadness',
            'description' => '',
            'image'       => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'CZ4F39VYOU',
            'name'        => 'Disgust',
            'description' => '',
            'image'       => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'DKKHLKSFBB',
            'name'        => 'Anger',
            'description' => '',
            'image'       => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'PT3PXPSUNG',
            'name'        => 'Anticipation',
            'description' => '',
            'image'       => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);
    }
}
