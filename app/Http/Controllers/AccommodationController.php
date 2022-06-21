<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AccommodationController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $accommodations = DB::table('accommodations')->paginate(10);
       return view('accommodation.index', ['accommodations' => $accommodations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accommodation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
            'name' => request('name'),
            'number'=> request('number'),
            'address' => request('address')

        ]);
        return redirect()->route('accommodations.index')->with('success','Accommodation created successfully.');


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function show(Accommodation $accommodation)
    {
        return view('accommodation.show',compact('accommodation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accommodation $accommodation)
    {
        return view('accommodation.edit',compact('accommodation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accommodation $accommodation)
    {
        $request->validate([
             'name' => 'required',
            'number' => 'required',
            'address' => 'nullable',
            ]);

        $accommodation->update($request->all());

        return redirect()->route('accommodations.index')->with('success','Accommodation updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();

        return redirect()->route('accommodations.index')
            ->with('success','accommodation  deleted successfully');
    }
}
