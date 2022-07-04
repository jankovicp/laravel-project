<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AccommodationController extends Controller
{

    public function welcome(){
        $accomodoations = Accommodation::all();
        return view('welcome', ['accomodations'=>$accomodoations]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws AuthorizationException
     */


    public function index() {


        $accommodations = DB::table('accommodations')->where("users_id", Auth::user()->id)->paginate(10);
       return view('accommodation.index', ['accommodations' => $accommodations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws AuthorizationException
     */
    public function create()
    {
       $this->authorize('create', Accommodation::class);

        return view('accommodation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws AuthorizationException
     * @throws \Exception
     */
    public function store(Request $request)
    {

      // $path =  request()->file('thumbnail')->store('thumbnails');

     //   return 'Done: ' . $path;



       //dd( request()->file('thumbnail'));
//        dd(request('thumbnail'));



     $this->authorize('create', Accommodation::class);


        try {

            Validator::make($request->all(), [
                'name' => 'required',
                'number' => 'required',
                'address' => 'nullable' ,
                'thumbnail' => 'required|image'
            ]);
        }
        catch(\Exception $e){
            dd($e);
        }

//        $accommodation = new Accommodation();

        Accommodation::create([

            'users_id' => Auth::user()->id,
            'name' => request('name'),
            'number'=> request('number'),
            'address' => request('address'),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')

        ]);
        return redirect()->route('accommodations.index')->with('success','Accommodation created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Accommodation $accommodation
     * @return Response
     * @throws AuthorizationException
     */
    public function show(Accommodation $accommodation)
    {

        $this->authorize('view', $accommodation);

        return view('accommodation.show',compact('accommodation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Accommodation $accommodation
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Accommodation $accommodation)
    {
         $this->authorize('update', $accommodation);

        return view('accommodation.edit',compact('accommodation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accommodation $accommodation
     * @return Response
     * @throws AuthorizationException
     */
    public function update(Request $request , Accommodation $accommodation)
    {

      //  if ($request->user()->cannot('update', $accommodation)) {
      //      abort(403);

       // dd(request('thumbnail'));
           $this->authorize('update', $accommodation);



         $attributes =  request()->validate([
                 'name' => 'required',
                 'number' => 'required',
                 'address' => 'nullable',
                'thumbnail' => 'image'
            ]);
         if(isset($attributes['thumbnail']))
         {
             $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
         }

        $accommodation->update($attributes);

        return redirect()->route('accommodations.index')->with('success','Accommodation updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Accommodation $accommodation
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy(Accommodation $accommodation)
    {
       $this->authorize('delete', $accommodation);


        $accommodation->delete();

        return redirect()->route('accommodations.index')
            ->with('success','accommodation  deleted successfully');
    }
}

