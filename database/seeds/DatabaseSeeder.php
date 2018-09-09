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

/**
 * Class CategorySeeder
 */
class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->delete();

        Category::create([
            'code'        => 'exp',
            'name'        => 'Experience',
            'description' => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Category::create([
            'code'        => 'aof',
            'name'        => 'App/Feature',
            'description' => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Category::create([
            'code'        => 'pos',
            'name'        => 'Product/Service',
            'description' => '',
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Category::create([
            'code'        => 'prs',
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
            'code'       => 'userone',
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
            'code'        => 'expe',
            'name'        => 'Experienta Emag',
            'description' => '',
            'image'       => '/path/to/img.png',
            'category_id' => Category::where('code', '=', 'exp')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Entity::create([
            'code'        => 'serc',
            'name'        => 'Search in site',
            'description' => '',
            'image'       => '/path/to/img.png',
            'category_id' => Category::where('code', '=', 'aof')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);

        Entity::create([
            'code'        => 'ordr',
            'name'        => 'Ordering',
            'description' => '',
            'image'       => '/path/to/img.png',
            'category_id' => Category::where('code', '=', 'aof')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);


        Entity::create([
            'code'        => 'delv',
            'name'        => 'Delivery',
            'description' => '',
            'image'       => '/path/to/img.png',
            'category_id' => Category::where('code', '=', 'exp')->first()['id'],
            'created_at'  => time(),
            'updated_at'  => time(),
            'deleted_at'  => null,
        ]);


        Entity::create([
            'code'        => 'prod',
            'name'        => 'Product',
            'description' => '',
            'image'       => '/path/to/img.png',
            'category_id' => Category::where('code', '=', 'pos')->first()['id'],
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
            'code'        => 'survey',
            'title'       => 'Experienta ta cu',
            'description' => '',
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

        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', 'survey')->first()['id'],
                'entity_id' => Entity::where('code', '=', 'expe')->first()['id'],
                'order'     => $i++,
            ],
        ]);


        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', 'survey')->first()['id'],
                'entity_id' => Entity::where('code', '=', 'serc')->first()['id'],
                'order'     => $i++,
            ],
        ]);


        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', 'survey')->first()['id'],
                'entity_id' => Entity::where('code', '=', 'ordr')->first()['id'],
                'order'     => $i++,
            ],
        ]);


        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', 'survey')->first()['id'],
                'entity_id' => Entity::where('code', '=', 'delv')->first()['id'],
                'order'     => $i++,
            ],
        ]);


        DB::table('entity_to_survey')->insert([
            [
                'survey_id' => Survey::where('code', '=', 'survey')->first()['id'],
                'entity_id' => Entity::where('code', '=', 'prod')->first()['id'],
                'order'     => $i++,
            ],
        ]);
    }
}

