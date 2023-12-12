<?php

namespace App\Http\Controllers;

use App\Models\Attedn;
use Carbon\Carbon;
use App\Models\Studants;
use App\Models\AttednLack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AttednLackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "fff";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $students = Studants::select('*')->where('class','=',$request->classes)->where('section','=',$request->section)->get();
        $classes = $request->classes;
        return view("home",compact('classes','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $user = new Attedn();
            $user->user_id = Auth()->id();
            $user->studants_id = request('studant_id');
            $user->attedn_lacks = request('attedn_lacks');
            $user->save();
            return redirect()->route('attedn.create')->with('success', 'تم التحضير بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttednLack  $attednLack
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::where('id', Auth()->id)->first();
        return $user;
        // $attedn = AttednLack::wherd("full_name", Auth()-());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttednLack  $attednLack
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttednLack  $attednLack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttednLack  $attednLack
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
