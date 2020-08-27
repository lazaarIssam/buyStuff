<?php

namespace App\Http\Controllers;

use App\Typeproduit;
use Illuminate\Http\Request;

class TypeproduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('typeproduits')->paginate(10);
        return view('typeproduits.index')->with('list', $list);
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
            $typeproduit = new Typeproduit();
            $typeproduit->name = $request->name;
            $typeproduit->observation = $request->observation;
            $typeproduit->save();
    
            Session::flash('success', 'Bien enregister');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas ajouter cette objet');
            }
            return redirect()->route('typeproduits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Typeproduit  $typeproduit
     * @return \Illuminate\Http\Response
     */
    public function show(Typeproduit $typeproduit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typeproduit  $typeproduit
     * @return \Illuminate\Http\Response
     */
    public function edit(Typeproduit $typeproduit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typeproduit  $typeproduit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $typeproduit = Typeproduit::find($request->id);
            $typeproduit->name = $request->name;
            $typeproduit->observation = $request->observation;
            $typeproduit->save();
            Session::flash('success', 'Bien modifier');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas modifier cette objet');
            }
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typeproduit  $typeproduit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typeproduit $typeproduit)
    {
        try{
            $typeproduit = Typeproduit::find($id);
            $typeproduit->delete();
            Session::flash('success', 'Bien supprimer');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas supprimer cette objet');
            }
            return redirect()->route('typeproduits.index');
    }
}
