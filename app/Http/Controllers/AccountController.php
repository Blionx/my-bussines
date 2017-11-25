<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\AccountRepository as Account;

class AccountController extends Controller
{
    function __construct(Account $account)
    {
    	$this->Account = $account;
    }

    public function List(Request $request)
    {
    	return response()->json( $this->Account->all() );
    }

    public function Create(Request $request)
    {
    	try {
    		$this->Account->create();
    		return response()->json("created");
    	} catch (Exception $e) {
    		return response()->json("Notcreated");
    	}
    	
    }

    public function Delete(Request $request, $id)
    {
    	try {
    		$this->Account->delete($id);
    		$response = array('DELETED');
    	} catch (Exception $e) {
    		$response = array('ERROR');
    	}
    	return response()->json( $response );
    }
}
