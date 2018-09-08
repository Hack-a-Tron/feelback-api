<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entity
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Entity extends Model
{
    /**
     * @var string
     */
    protected $table = 'entity';

    protected $guarded = ['id'];

    /**
     * Relation with surveys
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function surveys()
    {
        return $this->belongsToMany('App\FeelBack\Persistence\ActiveRecord\Survey', 'entity_to_survey');
    }
}
