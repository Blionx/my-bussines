<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions_types';

    public function Transaction()
    {
        return $this->HasMany('App\Transaction');
    }
}
