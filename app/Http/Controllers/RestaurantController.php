<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('restaurants')->paginate(10);
        return view('restaurants.index')->with('list', $list);
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
            $restaurant = new Restaurant();
            $restaurant->localisation_id = $request->post('localisation_id'); 
            $restaurant->type_id = $request->post('type_id'); 
            $restaurant->user_id = $request->post('user_id'); 
            $restaurant->name = $request->name;
            $restaurant->email = $request->email;
            $restaurant->addresse = $request->addresse;
            $restaurant->telephonque = $request->telephonque;
            $restaurant->description = $request->description;
            $restaurant->save();
    
            Session::flash('success', 'Bien enregister');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas ajouter cette objet');
            }
            return redirect()->route('restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $restaurant = Restaurant::find($request->id);
            $restaurant->localisation_id = $request->post('localisation_id');
            $restaurant->type_id = $request->post('type_id');
            $restaurant->user_id = $request->post('user_id'); 
            $restaurant->name = $request->name;
            $restaurant->email = $request->email;
            $restaurant->addresse = $request->addresse;
            $restaurant->telephonque = $request->telephonque;
            $restaurant->description = $request->description;
            $restaurant->save();
            Session::flash('success', 'Bien modifier');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas modifier cette objet');
            }
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        try{
            // On supprime l'objet avec son id
            //we delete the object using the id
            $restaurant = Restaurant::find($id);
            $restaurant->delete();
            Session::flash('success', 'Bien supprimer');
            }catch(Throwable $e){
                Session::flash('failed', 'Vous ne pouvez pas supprimer cette objet');
            }
            return redirect()->route('restaurants.index');
    }
}
