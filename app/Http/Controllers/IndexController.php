<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::limit(4)->get();
        return view('index',['formations' => $formations]);
    }

    public function formations ()
    {
        $formations = Formation::all();
        return view('formations',[
            'formations' => $formations
        ]);
    }

    public function afficheFormation($id)
    {
        $formation = Formation::findOrfail($id);
        return view('details-formation',[
             'formation' => $formation
        ]);
    }

    public function lectureFormation($id)
    {
        if( Gate::denies('learn')){
            return redirect()->route('login');
        }

        $formation = Formation::findOrfail($id);
        return view('lecture-formation',[
             'formation' => $formation
        ]);
    }

    public function profil()
    {
        $id = Auth::user()->id ;
        // dd($id);
        $user = User::find($id);
        return view('profil', compact('user'));
    }

    public function editProfil($id)
    {
        
    }
}
