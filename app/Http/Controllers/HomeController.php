<?php

namespace App\Http\Controllers;

use App\Models\Attedn;
use App\Models\AttednLack;
use App\Models\BirthRestriction;
use App\Models\FamilyCard;
use Illuminate\Http\Request;
use App\Models\CardPersonaNew;
use App\Models\CardDamageRenewal;
use App\Models\DeathStatement;
use App\Models\LogDivorce;
use App\Models\LogMarriage;
use App\Models\Studants;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // $chartjs = app()->chartjs
        // ->name('barChartTest')
        // ->type('bar')
        // ->size(['width' => 400, 'height' => 200])
        // ->labels(['طلبات تم تحديد موعد الحضور', 'طلبات ملغية'])
        // ->datasets([
        //     [
        //         "label" => "نسبة الطلبات الملغية",
        //         'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
        //         'data' => [69, 59]
        //     ],
        //     [
        //         "label" => "تسبة الطلبات تم تحديد موعد الحضور",
        //         'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
        //         'data' => [65, 12]
        //     ]
        // ])
        // ->options([]);
        public function index()
        {
            // $user = User::where('id',Auth()->id());
            $student = Studants::where('user_id',Auth()->id())->first();

            if(isset($student->id)){
                $attedns = Attedn::where("studants_id",$student->id)->get();
                return view('home',compact('attedns'));
            }
                return view('home');
            
        }

        
}
