<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\location;

class locationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = location::all();

       return view('location.location', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {      

        return view('location.addLocation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stand' => 'required|max:255',             
        ]);

        $stand = $request->input('stand');        

        $location = new location;

        $location->stand = $stand;

        $location->save();

        return redirect('/location')->with('msg','location add successfully.');

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
        $location = location::find($id);

        return view('location.editLocation',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = location::find($id);

        $location->stand = $request->input('stand');

        $location->save();

        return redirect('/location')->with('msg','location update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $location = location::find($id);
        $location->delete();
        return redirect('/location')->with('msg','location delete successfully.');
    }
}
