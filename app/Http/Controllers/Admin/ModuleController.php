<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbre = Module::all()->count();
        $i = 0;

        $modules = DB::table('modules')
                ->join('formations', 'formations.id', 'modules.formation_id')
                ->select('modules.*', 'formations.name as formation', 'formations.id as idform')
                ->get();

        return view('admin.modules.liste-modules', compact('modules', 'nbre', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formations = Formation::all();
        return view('admin.modules.create-module',[
            'formations' =>$formations
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
        ///dd($request->formation);
        Module::create([
            'formation_id' => $request->formation,
            'name' => $request->name
        ]);

        return redirect()->route('admin.modules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        $data = DB::table('modules')
                ->join('formations', 'formations.id', 'modules.formation_id')
                ->join('chapitres', 'chapitres.module_id', 'modules.id')
                ->join('lecons', 'lecons.chapitre_id', 'chapitres.id')
                ->select('modules.name as module', 'formations.name as formation', 'chapitres.name as chapitre', 'lecons.name as lecon', 'formations.id as idform')
                ->where('modules.id', $module->id)
                ->get();

        //         dd($det);
        // dd($det[0]->module);
        return view('admin.modules.detail-module', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('admin.modules.edit-module',[
            'module' => $module
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module->name = $request->name;
        $module->save();

        return redirect()->route('admin.modules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        if( Gate::denies('delete')){
            return redirect()->route('admin.modules.index');
        }

        $module->delete();

        return redirect()->route('admin.modules.index');
    }
}
