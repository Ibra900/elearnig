<?php

namespace App\Http\Controllers\Admin;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class FormationController extends Controller
{
    public function __construct () {
        $this->middleware('auth');  //permet l'accès des différentes pages uniquement aux utilisateurs connectés
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::all();
        $nbreFormations = Formation::all()->count();
        return view ('admin.formations.liste-formations',[
            'formations' => $formations,
            'nbreFormations' => $nbreFormations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.formations.create-formation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'name' => ['required', 'string', 'max:255']
        ]);

        Formation::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.formations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = Formation::find($id);
        return view('admin.formations.detail-formation',[
            'formation' => $formation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
      * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation = Formation::find($id);
        return view('admin.formations.edit-formation',[
            'formation' => $formation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $formation = Formation::find($id);
        $formation->name = $request->name;
        $formation->save();

        return redirect()->route('admin.formations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Gate::denies('delete')){
            return redirect()->route('admin.formations.index');
        }
        //$formation->modules()->detach();
        $formation = Formation::find($id);
        //dd($formation);
        $formation->delete();

        return redirect()->route('admin.formations.index');
    }
}
