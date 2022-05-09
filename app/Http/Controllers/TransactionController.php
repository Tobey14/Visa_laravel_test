<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = $_GET['id'];
        $transactions = Transaction::where('user', $id)->get();
        return view('home.transactions')->with([
            'trans'=>$transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // input validation starts
        $this->validate($request, [
            "user"=>'required',
            "email"=>'required',
            "amount"=>'required',

		]);

        $transaction = new Transaction;  // transa$transaction creation starts

        $transaction->user = htmlentities($request->input("user"));
        $transaction->amount = htmlentities($request->input("amount"));

        if($transaction->amount==0){
            return redirect()->route('dashboard');
        }
        $transaction->type = htmlentities($request->input("type"));       
        $saved= $transaction->save(); //transaction is saved


        if($saved){

            $user = User::find($transaction->user);
            $old_amount = $user->balance;
            $new_balance = $old_amount + $transaction->amount;
            $user->balance = $new_balance;

            $user->save();

            return redirect()->route('dashboard');

        }else{
            return back()->withError(['error', 'Failed Try again']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
