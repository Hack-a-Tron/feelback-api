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

    protected $guarded = ['id'];

    /**
     * Relation with entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function entities()
    {
        return $this->belongsToMany('App\FeelBack\Persistence\ActiveRecord\Entity', 'entity_to_survey');
    }
}