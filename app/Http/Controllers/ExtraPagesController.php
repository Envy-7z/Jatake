<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraPagesController extends Controller
{
    //
    public function page($page)
    {
        $page = str_replace('-','_',$page);
        try{
            return $this->$page();
        }
        catch(\Exception $e)
        {
            abort(404);
        }
    }

    public function term_condition()
    {
        return "Term Cond";
    }
}
