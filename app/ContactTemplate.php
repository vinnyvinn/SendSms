<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactTemplate extends Model
{
    
    public const GROUP = false;


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'type',
    ];
}
