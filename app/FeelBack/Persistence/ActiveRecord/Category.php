<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'category';

    /**
     * @var array
     */
    protected $guarded = ['id'];
}
