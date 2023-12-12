<?php

namespace App\Http\Controllers;

use App\Models\Studants;
use Illuminate\Http\Request;

class RepController extends Controller
{
    public function rep1 (){
        $students = Studants::all();

        return view('rep1',compact('students'));
    }
    public function rep2 (){
        $students = Studants::all();

        return view('rep2',compact('students'));
    }
}
