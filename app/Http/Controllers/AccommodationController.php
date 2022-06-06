<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccommodationController extends Controller
{


    public function store(Request $request)
    {
//        dd($request->al);
            try {

                Validator::make($request->all(), [
                    'name' => 'required',
                    'number' => 'required',
                    'address' => 'nullable'
                ]);
            }
            catch(\Exception $e){
                dd($e);
            }

        $accommodation = new Accommodation();

        $accommodation->create([

           'users_id' => Auth::user()->id,
           'name'=>request('name'),
           'number'=> request('number'),
           'address'=>request('address')

       ]);



    }



}
