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
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        \Mail::to($email)
            ->send(new Thankyou($name,$message));

        \Mail::to('adopt@bryanandsarahray.family')
            ->cc('webmaster@bryanandsarahray.com')
            ->send(new Contact($name,$message));
    }

}