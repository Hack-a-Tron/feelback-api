<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Entity
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Entity extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'entity';

    /**
     * @var array 
     */
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
