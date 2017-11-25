<?php namespace App\Repositories\Eloquent;
 
use App\Repositories\Contracts\Repository;

 
class AccountRepository extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Account';
    }

    public function all($columns = array('*'))
    {
        return $this->user->Accounts()->with(['Transactions.TransactionType', 'Balance'])->get($columns);
    }

    public function create(array $data = array('*'))
    {
        return $this->model->create(['user_id' => $this->user->id]);
    }
}