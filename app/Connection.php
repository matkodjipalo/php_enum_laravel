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

    /**
     * @param string $status
     *
     * @return string
     */
    public function getStatusAttribute($status)
    {
        return ConnectionStatusType::createFromString($status);
    }

    /**
     * @param ConnectionStatusType $status
     *
     * @return string
     */
    public function setStatusAttribute(ConnectionStatusType $status)
    {
        $this->attributes['status'] = $status->getName();
    }
}