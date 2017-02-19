<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 2/10/17
 * Time: 9:34 PM
 */

namespace App\Http\Controllers;


use App\Mail\Contact;
use App\Mail\Thankyou;
use Illuminate\Http\Request;

class SiteController
{
    public function show(){
        return view('site');
    }

    public function contact(Request $request){
        $name = strip_tags($request->input('name'));
        $email = strip_tags($request->input('email'));
        $message = strip_tags($request->input('message'));

        try {
            \Mail::to('adopt@bryanandsarahray.family')
                ->cc('webmaster@bryanandsarahray.com')
                ->send(new Contact($email,$name,$message));

            \Mail::to($email)
                ->send(new Thankyou($email,$name,$message));
        } catch (\Exception $ex){
            return response(array('error' => $ex->getMessage()),500);
        }
        return response('Email Sent',200);
    }

}