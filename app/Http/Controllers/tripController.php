<?php

namespace App\Http\Controllers;

use App\Models\trip;
use App\Models\location;
use Illuminate\Http\Request;

class tripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = trip::all();

        return view('trip.trip', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stands = location::select('stand')->get();
        return view('trip.addTrip',compact('stands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',  
            'price' => 'required|numeric|min:20',
            'time' => 'required|numeric|min:1|max:24',
            'total' => 'required|numeric|min:0|max:36', 
            'date' => 'required',        
        ]);

        $from = $request->input('from');
        $to = $request->input('to');
        $price = $request->input('price');
        $time= $request->input('time');
        $total= $request->input('total');
        $date = $request->input('date');
        

        $trip = new trip;

        $trip->from = $from;
        $trip->to = $to;
        $trip->price = $price;
        $trip->time = $time;
        $trip->total_seat = $total;
        $trip->date = $date;

        $trip->save();

        return redirect('/trip')->with('msg','location add successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trip = trip::find($id);
        $stands = location::select('stand')->get();

        return view('trip.editTrip',compact('trip','stands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',  
            'price' => 'required|numeric|min:20',
            'time' => 'required|numeric|min:1|max:24',
            'total' => 'required|numeric|min:0|max:36', 
            'date' => 'required',        
        ]);

        $trip = trip::find($id);

        $trip->from = $request->input('from');
        $trip->to = $request->input('to');
        $trip->price = $request->input('price');
        $trip->time = $request->input('time');
        $trip->total_seat = $request->input('total');
        $trip->date = $request->input('date');

        $trip->save();

        return redirect('/trip')->with('msg','location update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trip = trip::find($id);
        $trip->delete();
        return redirect('/trip')->with('msg','location delete successfully.');
    }
}
