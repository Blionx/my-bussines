<?php namespace App\Repositories\Eloquent;
 
use App\Repositories\Contracts\Repository;

 
class TransactionRepository extends Repository {
 
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Transactions';
    }

    public function all($columns = array('*'))
    {
        return $this->user->Transactions()->with(['Account', 'TransactionType'])->get($columns);
    }

    public function create(array $data = array('*'))
    {
        $lastBalance = $this->model->Account()->Balance()->last();
        $this->model->create($data);
        $finalAmmount = ($data->type_id == 2)? $lastBalance->final_balance - $data->ammount : $lastBalance->final_balance + $data->ammount;
        $finalBalance = [
                                        'final_balance' => $finalAmmount,
                                        'account_id'    => $this->model->Account()->get()->id,
                                        'user_id'       => $this->user->id 
                                    ];
        return  $this->model->Balance()->create($finalBalance);
    }
}