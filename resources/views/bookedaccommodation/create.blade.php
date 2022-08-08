@extends('layouts.app')
@section('content')

    <form action="{{ route('bookedaccommodations.store' , $accommodation->id ) }}" method="POST" enctype="multipart/form-data">
    @csrf

        <input type="hidden" name="accommodation_id" id="post_id" value="{{ $accommodation->id }}" />


        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <label>
                            <input type="text" name="name" class="form-control" placeholder="name">
                        </label>
                    </div>
                </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>


            </div>

            </div>
        </form>

    @endsection





