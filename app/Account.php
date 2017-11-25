<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $fillable = ['user_id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bank_account';

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
