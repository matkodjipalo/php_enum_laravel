<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'initiator_id',
        'receiver_id',
        'status',
    ];
}