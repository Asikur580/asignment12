<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\SeatAllocation;
use Illuminate\Http\Request;
use App\Models\trip;

class customerController extends Controller
{
    public function index()
    {
        return view('searchTrip');
    }

    public function searchTrip(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $date = $request->input('date');

        $trips = trip::orWhere('from', '=', $from)->orWhere('to', '=', $to)->orWhere('date', '=', $date)->get();
        $tripCount = $trips->count();

        if($tripCount>0){
            return view('seatPlan', compact('trips'));
        }else{
            return redirect('customer')->with('msg','Trips are not found');
        }

        
    }

    public function seatPlan($id)
    {
        $trip = trip::find($id);

        return view('buySeat', compact('trip'));
    }

    public function buySeat(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'seat_no' => 'required|max:255'
        ]);
        $tripId = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $seat_no = $request->input('seat_no');

        $customer =customer::updateOrCreate(['email'=>$email],['name'=>$name,'email'=>$email]);

        $dueSeat = trip::select('due_seat')->where('id', $tripId)->first();
        $oldDueSeat = $dueSeat->due_seat;

        if ($oldDueSeat > 0) {

            $newDueSeat = $oldDueSeat - $seat_no;

            if ($newDueSeat >= 0) {

                $trip = trip::find($tripId);
                $trip->due_seat = $newDueSeat;
              
                $dueUpdate = $trip->save();               
                $customerSave = $customer->save();

                if ($dueUpdate && $customerSave) {
                    $customerId = $customer->id;

                    $seatAllocation = new SeatAllocation;

                    $seatAllocation->trip_id = $tripId;
                    $seatAllocation->customer_id = $customerId;
                    $seatAllocation->seat_number = $seat_no;
                    $seatAllocation->save();

                    return redirect('customer')->with('msg', 'Seat buy successfully.');
                }
            }
        }
    }
}
