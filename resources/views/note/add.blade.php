@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-4 d-flex justify-content-between align-items-center">
                    <h3>Add Notes</h3>
                    <a class="text-black btn btn-info px-4" href="{{route('note.list')}}">Back</a>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('note.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Title') }}</label>
                                <div class="col-md-9">
                                    <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus placeholder="Note title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-md-3 col-form-label text-md-end">{{ __('Description') }}</label>
                                <div class="col-md-9">
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus cols="20" rows="5" placeholder="Write description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-warning px-4">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
