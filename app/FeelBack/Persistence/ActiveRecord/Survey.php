<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Survey
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Survey extends Model
{
    /**
     * @var string
     */
    protected $table = 'survey';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Relation with entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function entities()
    {
        return $this->belongsToMany('App\FeelBack\Persistence\ActiveRecord\Entity', 'entity_to_survey')->withPivot('order')->withTimestamps();
    }

    public function results()
    {
        return $this->hasMany('App\FeelBack\Persistence\ActiveRecord\Result', 'survey_id', 'id');
    }
}
