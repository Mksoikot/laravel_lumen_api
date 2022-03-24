<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{



    function testconn(){
        $dbname=DB::connection()->select("SELECT * FROM details ");
        return $dbname;
    }



}