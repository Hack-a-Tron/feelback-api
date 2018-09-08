<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Emotion
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Emotion extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'emotion';

    /**
     * @var array
     */
    protected $guarded = ['id'];
}
