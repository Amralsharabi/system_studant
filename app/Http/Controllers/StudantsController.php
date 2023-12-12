<?php

namespace App\Http\Controllers;

use App\Models\Attedn;
use App\Models\User;
use App\Models\Studants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class StudantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Studants::all();
        // $attedns = Attedn::all();
        // $students = Studants::whereHas('attedns',function ($query) {
        //     $query->where('attedn_lacks',0);
        // })->count();

        $students = Studants::all();

        // foreach ($students as $student) {
        //     $absenceCount = $student->attedns->where('attedn_lacks', 0)->count();
        //     echo "اسم الطالب: " . $student->name . " - عدد أيام الغياب: " . $absenceCount . "<br>";
        // }
        // return $students;
        return view('rep',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $professions = DB::table('professions')->get();
        return view('users.Add_studant',compact('roles','professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'Status' => 'required',
            'roles_name' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = request('full_name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->Status = request('Status');
            $user->roles_name = request('roles_name');
            $user->save();
            $user->assignRole($request->input('roles_name'));

            Studants::create([
                'user_id' => $user->id,
                'full_name' => request("full_name"),
                'class' => request("classes"),
                'section' => request("section"),
            ]);

            DB::commit();
            return redirect()->route('users.index')->with('success', 'تم انشاء الحساب بنجاح');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'message' => 'An error occurred while processing your request. Please try again later.'
            ], 500);
        }
        // return redirect()->route('users.index')
        //     ->with('success', 'تم اضافة المستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studants  $studants
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studants  $studants
     * @return \Illuminate\Http\Response
     */
    public function edit(Studants $studants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studants  $studants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        return "illl";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studants  $studants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studants $studants)
    {
        //
    }
}
