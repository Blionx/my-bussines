<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'balance';

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
