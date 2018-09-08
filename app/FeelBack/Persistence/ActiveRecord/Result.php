<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Result
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Result extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'result';

    /**
     * Relation with survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo('App\FeelBack\Persistence\ActiveRecord\Survey');
    }

    /**
     * Relation with emotion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emotion()
    {
        return $this->belongsTo('App\FeelBack\Persistence\ActiveRecord\Emotion');
    }

    /**
     * Relation with entity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\FeelBack\Persistence\ActiveRecord\Entity');
    }
}
