<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class UserController extends Controller
{
    public function store(Request $request)
    {
         // input validation starts
         $this->validate($request, [
            "username"=>'required',
            "email"=>'required',
            "password"=>'required',

		]);

        $user = new User;  // user creation starts

        $user->username = htmlentities($request->input("username"));
        $user->email = htmlentities($request->input("email"));
        $user->password = bcrypt($request->input("password"));
        $user->role = htmlentities($request->input("role"));
        $user->balance = 0.00;
        

        
        $saved= $user->save(); //user is saved


        if($saved){

            return redirect()->route('login');

        }else{
            return back()->withErrors(['message'=>'User Not Successfully Registered, Try Again Later!',]);
        }
    }


    public function storeTransaction()
    {

        $transaction = new Transaction;  //transaction creation starts

        $transaction->user = htmlentities($_GET["user"]);
        $transaction->amount = htmlentities($_GET["amount"]);
        $transaction->type = htmlentities($_GET["type"]);      
        $saved= $transaction->save(); //transaction is saved


        if($saved){

            $user = User::find($transaction->user);
            $old_amount = $user->balance;
            $new_balance = $old_amount + $transaction->amount;
            $user->balance = $new_balance;

            $user->save();

            $response['message'] = 'Wallet Funded Successfully..';
            $response['status']  = 200;
            echo json_encode($response);

        }else{
            $response['message'] = 'Wallet Funding Failed..';
            $response['status']  = 400;
            echo json_encode($response);
        }

    }
}
