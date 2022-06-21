
@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch</h2>

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('accommodations.create') }}"> Create New Accommodation</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <tbody>
        @foreach ($accommodations as $accommodation)
            <tr>
                <td>{{ $accommodation->name }}</td>
                <td>{{ $accommodation->number }}</td>
                <td>{{ $accommodation->address }}</td>
                <td class="text-center">
                    <div x-data="{show: false}">
                        <button @click="show = ! show" class="py-2 pl-3 text-sm font-semibold">Dropdown menu</button>
                        <div x-show="show" class="py-2">
                    <a class="block text-left px-3 text-sm leading-6 hover:bg-gray-300" href="{{ route('accommodations.show',$accommodation->id) }}">Show</a>
                    <a class="block text-left px-3 text-sm leading-6 hover:bg-gray-300" href="{{ route('accommodations.edit',$accommodation->id) }}">Edit</a>

                    <form action="{{ route('accommodations.destroy',$accommodation->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div>
  @endsection
