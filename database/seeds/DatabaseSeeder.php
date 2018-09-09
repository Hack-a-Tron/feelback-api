<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \App\FeelBack\Persistence\ActiveRecord\Emotion;
use \App\FeelBack\Persistence\ActiveRecord\Category;
use \App\FeelBack\Persistence\ActiveRecord\Customer;
use \App\FeelBack\Persistence\ActiveRecord\Entity;
use \App\FeelBack\Persistence\ActiveRecord\Survey;


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
        $this->call('CategorySeeder');
        $this->call('CustomerSeeder');
        $this->call('EntitySeeder');
        $this->call('SurveySeeder');
        $this->call('EntityToSurveySeeder');
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
            'order'       => 1,
            'pair'        => 'a',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'O83FCDHPTL',
            'name'        => 'Trust',
            'description' => '',
            'image'       => '',
            'order'       => 2,
            'pair'        => 'b',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'AGYNHQK8S6',
            'name'        => 'Fear',
            'description' => '',
            'image'       => '',
            'order'       => 7,
            'pair'        => 'c',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'CVPBNMJOHN',
            'name'        => 'Surprise',
            'description' => '',
            'image'       => '',
            'order'       => 8,
            'pair'        => 'd',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'NN029SZHF9',
            'name'        => 'Sadness',
            'description' => '',
            'image'       => '',
            'order'       => 5,
            'pair'        => 'a',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'CZ4F39VYOU',
            'name'        => 'Disgust',
            'description' => '',
            'image'       => '',
            'order'       => 6,
            'pair'        => 'b',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'DKKHLKSFBB',
            'name'        => 'Anger',
            'description' => '',
            'image'       => '',
            'order'       => 3,
            'pair'        => 'c',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Emotion::create([
            'code'        => 'PT3PXPSUNG',
            'name'        => 'Anticipation',
            'description' => '',
            'image'       => '',
            'order'       => 4,
            'pair'        => 'd',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);
    }
}

/**
 * Class CategorySeeder
 */
class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->delete();

        Category::create([
            'code'        => 'PK4QTDJ6JZ',
            'name'        => 'Experience',
            'description' => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Category::create([
            'code'        => 'SBGP1XLP7I',
            'name'        => 'App/Feature',
            'description' => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Category::create([
            'code'        => 'NGW9F4YU1Y',
            'name'        => 'Product/Service',
            'description' => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Category::create([
            'code'        => 'GUEOVW5XMK',
            'name'        => 'Person',
            'description' => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);
    }
}

/**
 * Class CustomerSeeder
 */
class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('customer')->delete();

        Customer::create([
            'code'       => 'L964DX6Q4C',
            'name'       => 'John Duet',
            'created_at' => time(),
            'updated_at' => time(),
            'deleted_at' => null,
        ]);
    }
}

/**
 * Class EntitySeeder
 */
class EntitySeeder extends Seeder
{
    public function run()
    {
        DB::table('entity')->delete();

        Entity::create([
            'code'        => 'MVK7SM1339',
            'name'        => 'eMAG Brand',
            'description' => '',
            'image'       => 'Logo@2x.png',
            'category_id' => Category::where('code', '=', 'PK4QTDJ6JZ')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Entity::create([
            'code'        => 'ZIHEY98DJ1',
            'name'        => 'Searching in site',
            'description' => '',
            'image'       => 'search@2x.png',
            'category_id' => Category::where('code', '=', 'SBGP1XLP7I')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Entity::create([
            'code'        => 'WPBP874SFU',
            'name'        => 'Ordering and payment',
            'description' => '',
            'image'       => 'order@2x.png',
            'category_id' => Category::where('code', '=', 'SBGP1XLP7I')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Entity::create([
            'code'        => 'A0EPI43SOB',
            'name'        => 'Delivery',
            'description' => '',
            'image'       => 'delivery@2x.png',
            'category_id' => Category::where('code', '=', 'PK4QTDJ6JZ')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Entity::create([
            'code'        => '1GSDFWSGEW',
            'name'        => 'Philips PerfectCare Pure GC7635/30',
            'description' => '',
            'image'       => 'philips.jpg',
            'category_id' => Category::where('code', '=', 'NGW9F4YU1Y')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);
    }
}

/**
 * Class EntitySeeder
 */
class SurveySeeder extends Seeder
{
    public function run()
    {
        DB::table('survey')->delete();

        Survey::create([
            'code'        => 'PDNW4998Z1',
            'title'       => 'Customer experience - eMAG order flow',
            'description' => 'Select at most 4 emotions that can describe your experience with:',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);
    }
}


/**
 * Class EntityToSurveySeeder
 */
class EntityToSurveySeeder extends Seeder
{
    public function run()
    {
        DB::table('entity_to_survey')->delete();

        $i = 1;
        $surveyCode = 'PDNW4998Z1';

        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', $surveyCode)->first()['id'],
                'entity_id' => Entity::where('code', '=', 'MVK7SM1339')->first()['id'],
                'order'     => $i++,
            ],
        ]);


        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', $surveyCode)->first()['id'],
                'entity_id' => Entity::where('code', '=', 'ZIHEY98DJ1')->first()['id'],
                'order'     => $i++,
            ],
        ]);


        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', $surveyCode)->first()['id'],
                'entity_id' => Entity::where('code', '=', 'WPBP874SFU')->first()['id'],
                'order'     => $i++,
            ],
        ]);


        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', $surveyCode)->first()['id'],
                'entity_id' => Entity::where('code', '=', 'A0EPI43SOB')->first()['id'],
                'order'     => $i++,
            ],
        ]);


        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', $surveyCode)->first()['id'],
                'entity_id' => Entity::where('code', '=', '1GSDFWSGEW')->first()['id'],
                'order'     => $i++,
            ],
        ]);
    }
}
