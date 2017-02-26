<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reward;
use App\Purchase;
use Auth;

class PurchaseController extends Controller
{

    const STATUS_PENDING = "pending";
    const STATUS_DONE = "done";
    const STATUS_REJECT = "reject";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $pending = $user->purchases()->where('status', '=', self::STATUS_PENDING)->get();
        $done = $user->purchases()->where('status', '=', self::STATUS_DONE)->get();

        $data= [
            'pending' => $pending,
            'done' => $done,
        ];

        return view('purchase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $reward = Reward::find($id);

        if (!$reward) abort(404);

        return view('purchase.create', ['reward' => $reward, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $reward = Reward::find($id);

        if (!$reward) abort(404);

        $user = $reward->user;

        if (!$user->account_id) return back()->with('error', $user->name . ' account is not valid. The charge has been cancelled.');

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $username = $request->input('username');

        try {
            $amount = $reward->amount * 100.0;
            $fee = $amount * config('plans.application_fee_percent')/100.0;
            $charge = \Stripe\Charge::create(array(
              "amount" => $reward->amount * 100.0,
              "currency" => "usd",
              "source" => $request->input('stripeToken'), // obtained with Stripe.js
              "application_fee" => $fee,
              "description" => "Snapy: " . $user->name
            ),
            array("stripe_account" => $user->account_id));

            $purchase = new Purchase;
            $purchase->status = self::STATUS_PENDING;
            $purchase->username = $username;
            $purchase->charge_id = $charge->id;

            $reward->purchases()->save($purchase);

            return redirect('');

        }
        catch (\Stripe\Error\Base $e) {
            return back()->with('error', $e->getMessage());
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
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
        $purchase = Purchase::find($id);
        $purchase->status = self::STATUS_DONE;
        $purchase->save();
        
        return back();
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
