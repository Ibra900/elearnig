<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use App\Models\Formation;
use Illuminate\Http\Request;
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
        $modules = Module::all();
        $nbre = Module::all()->count();
        return view('admin.modules.liste-modules',[
            'modules' => $modules,
            'nbre' => $nbre
        ]);
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
        return view('admin.modules.detail-module',[
            'module' => $module
        ]);
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
