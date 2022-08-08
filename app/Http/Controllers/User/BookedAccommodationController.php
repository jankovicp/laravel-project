<?php


namespace App\Http\Controllers\User;


use App\Models\Accommodation;
use App\Models\BookedApartments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookedAccommodationController
{
    public function index()
    {
        $accommodoations = Accommodation::all();
        return view('bookedaccommodation.index', ['accommodations'=>$accommodoations]);
    }


    public function create(Accommodation $accommodation)
    {
     return view('bookedaccommodation.create', compact('accommodation'));
    }

    public function store(Request $request)
    {

     //   Validator::make($request->all(), [

      //      'name' => 'required',

     //       ]);


      //  dd($request->all());

     $bookedapartments = BookedApartments::create([

            'user_id' => Auth::user()->id,
            'accommodation_id' => request('accommodation_id'),
            'name' => request('name')

        ]);
     $bookedapartments -> save();
        return redirect()->route('bookedaccommodations.index')->with('success','Accommodation created successfully.');

/*

        return redirect()->route('accommodations.index')->with('success','Accommodation created successfully.');
*/
    }





}
