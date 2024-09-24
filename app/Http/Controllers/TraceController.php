<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trace;

class TraceController extends Controller
{
    //
    public function getlist() 
    {
        $list = Trace::orderBy('codeTrace', "DESC")->paginate(100);            
        return view('traces.listtrace', compact('list'));
    }

    public static function setTrace($contenu , $user, $type = "", $id = null)
    {
        $add = new Trace();
        $add->action = $user;
        $add->libelle = $contenu;
        $add->type = $type;
        $add->idsec = $id;
        $add->save();
        return 0;
    }
}
