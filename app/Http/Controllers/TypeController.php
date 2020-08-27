<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('types')->paginate(10);
        return view('types.index')->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            //dd($request->input());
            $type = new Type();
            $type->name = $request->name;
            $type->observation = $request->observation;
            $type->save();
    
            Session::flash('success', 'Bien enregister');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas ajouter cette objet');
            }
            return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $type = Type::find($request->id);
            $type->name = $request->name;
            $type->observation = $request->observation;
            $type->save();
            Session::flash('success', 'Bien modifier');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas modifier cette objet');
            }
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        try{
            $type = Type::find($id);
            $type->delete();
            Session::flash('success', 'Bien supprimer');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas supprimer cette objet');
            }
            return redirect()->route('types.index');
    }
}
