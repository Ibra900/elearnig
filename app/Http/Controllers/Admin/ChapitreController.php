<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use App\Models\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ChapitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbre = Chapitre::all()->count();
        $i = 0;

        $chapitres = DB::table('chapitres')
                    ->join('modules', 'modules.id', 'chapitres.module_id')
                    ->select('chapitres.*', 'modules.name as module', 'modules.id as idmodule')
                    ->get();
        return view('admin.chapitres.liste-chapitres',compact('chapitres','nbre', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin.chapitres.create-chapitre',[
            'modules' =>$modules
        ]);
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

        Chapitre::create([
            'name' => $request->name,
            'module_id' => $request->module
        ]);

        return redirect()->route('admin.chapitres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function show(Chapitre $chapitre)
    {
        $data = DB::table('chapitres')
                    ->join('modules', 'modules.id', 'chapitres.module_id')
                    ->join('lecons', 'lecons.chapitre_id', 'chapitres.id')
                    ->select('chapitres.name as chapitre', 'modules.name as module', 'lecons.name as lecon', 'modules.id as idmodule')
                    ->where('chapitres.id', $chapitre->id)
                    ->get();
        $i = 0;
        return view('admin.chapitres.detail-chapitre',compact('data', 'i'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapitre $chapitre)
    {
        return view('admin.chapitres.edit-chapitre',[
            'chapitre' => $chapitre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapitre $chapitre)
    {
        $chapitre->name = $request->name;
        $chapitre->save();

        return redirect()->route('admin.chapitres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapitre  $chapitre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapitre $chapitre)
    {
        if( Gate::denies('delete')){
            return redirect()->route('admin.chapitres.index');
        }

        $chapitre->delete();

        return redirect()->route('admin.chapitres.index');
    }
}
