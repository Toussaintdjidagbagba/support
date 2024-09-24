<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Send;

class SendMail extends Controller
{
    public static function senddeclaration($destinataire, $Subject, $donn)
    {
        $view = "viewadmindste.mail.notif"; 

        return Mail::to($destinataire)->queue(new Send($donn, $Subject, $view));  
    }
    
}
