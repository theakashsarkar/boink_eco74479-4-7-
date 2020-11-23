<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Session;
use Mail;
class CheckoutController extends Controller
{
    public function checkout(){
        return view('frontEnd.pages.chckout');
    }
    public function signup(Request $request){
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name  = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password      = bcrypt($request->password);
        $customer->phone_number  = $request->phone_number;
        $customer->address       = $request->address;
        $customer->save();
        Session::put('customerId',$customer->id);
        Session::put('customerFullName',$customer->first_name.' '.$customer->last_name);
        $data = $customer->toArray();
        Mail::send('frontEnd.mails.confirmation-mail',$data, function($message) use($data){
           $message->to($data['email_address']);
           $message->subject('confirmation-mail');
        });

    }
}
