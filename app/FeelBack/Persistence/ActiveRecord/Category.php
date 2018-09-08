<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Category extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'category';

    /**
     * @var array
     */
    protected $guarded = ['id'];
}
