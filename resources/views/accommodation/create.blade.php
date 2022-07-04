
@extends('layouts.app')
@section('content')




    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Accommodation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accommodations.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('accommodations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <label>
                        <input type="text" name="name" class="form-control" placeholder="name">
                    </label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number:</strong>
                    <textarea class="form-control" style="height:150px" name="number" placeholder="Number"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="Address"></textarea>
                </div>
            </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Thumbnail:</strong>
            <input class="form-control" type="file" style="height:150px" name="thumbnail" placeholder="Thumbnail"></input>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


@endsection
