<?php

namespace App\FeelBack\Persistence\ActiveRecord;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\FeelBack\Persistence\ActiveRecord
 */
class Customer extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'customer';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $hidden = ['id'];
}
