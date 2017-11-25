<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaction';

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Account()
    {
        return $this->belongsTo('App\Account');
    }
    public function TransactionType()
    {
        return $this->hasOne('App\TransactionType');
    }
}
