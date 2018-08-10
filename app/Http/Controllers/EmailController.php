<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;


class EmailController extends Controller
{
    public function sendEmail() {
       //$name = 'EmailController';
       
       //Mail::to('prakash.vadher@agileinfoways.com')->send(new SendMailable($name));   

        $emailJob = (new SendEmailJob())->delay(Carbon::now()->addSeconds(3));          
		dispatch($emailJob);    
	    
	    return 'Email was sent';
        
    }
}
