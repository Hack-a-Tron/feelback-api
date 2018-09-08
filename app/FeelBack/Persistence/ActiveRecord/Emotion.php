<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emotion
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Emotion extends Model
{
    /**
     * @var string
     */
    protected $table = 'emotion';

    /**
     * @var array
     */
    protected $guarded = ['id'];
}
