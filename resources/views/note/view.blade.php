@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-4 d-flex justify-content-between align-items-center">
                    <h3>Notes Details</h3>
                    <a class="text-black btn btn-info px-4" href="{{URL::previous()}}">Back</a>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <h3>{{$note->title}}</h3>
                        <small>Updated by: <i class="text-success">{{$note->updated_at->format('d/m/Y')}}</i></small>
                        <p class="pt-3">{{$note->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
