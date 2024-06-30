@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-3">
                <h2 class="card-header text-center">Add Multipole Category & Show</h2>
                <div class="card-body">
                    <form action="{{route('add-category')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" class="hidden_id">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"> Category</label>
                            <div class="col-md-6 pb-3">
                                <select class="form-select" aria-label="Default select example" id="selectCat" name="parent_id">
                                    <option value="">Select Category</option>
                                    @foreach ($all_categories as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control name-input @error('name') is-invalid @enderror" name="name" required autocomplete="name">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            <h1>Categories</h1>
            @if ($categories->count())
                <ul>
                    @foreach ($categories as $category)
                        @include('categories-list', ['category' => $category])
                    @endforeach
                </ul>
            @else
                <p>No categories found.</p>
            @endif
        </div>
    </div>
</div>

<script>
    $('.name').on('click', function (e) {
        var name = $(this).data('name');
        var id = $(this).data('id');
        var parentId = $(this).data('parentid');

        var options = $('#selectCat option');
        $.map(options ,function(option) {
            if (option.value == parentId) {
                $('#selectCat option[value="'+ parentId +'"]').attr('selected', true)
            }
        });

        $('.name-input').val(name);
        $('.hidden_id').val(id);
    });
</script>
@endsection


