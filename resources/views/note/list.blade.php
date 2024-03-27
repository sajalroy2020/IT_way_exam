@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="my-4 d-flex justify-content-between align-items-center">
            <h3>All Notes</h3>
            <a class="text-black btn btn-warning" href="{{route('note.add')}}">Add Note</a>
        </div>
        <table class="table mt-4 border-top border">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Created Date</th>
                <th scope="col">Updated Date</th>
                <th scope="col">Action</th>
            </tr>

            @forelse($allNotes as $key => $notes)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$notes->title}}</td>
                    <td>{{substr($notes->description, 0,  30) }}</td>
                    <td>{{$notes->created_at->format('d/m/Y')}}</td>
                    <td>{{$notes->updated_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{route('note.view', encrypt($notes->id))}}" class="border-0 bg-white" title="View">
                            <img src="{{asset('icon/eye.svg')}}" alt="view" style="width: 22px;">
                        </a>
                        <a href="{{route('note.edit', encrypt($notes->id))}}" class="border-0 bg-white px-2" title="Edit">
                            <img src="{{asset("icon/edit.svg")}}" alt="edit" style="width: 20px;">
                        </a>
                        <a href="{{route('note.delete', encrypt($notes->id))}}" class="border-0 bg-white" title="Delete">
                            <img src="{{asset('icon/delete.svg')}}" alt="delete" style="width: 18px;">
                        </a>
                    </td>
                </tr>
                @empty
                    <tr class="text-center"><td colspan="6">{{ __('No data found') }}</td></tr>
                @endforelse
        </table>
    </div>
@endsection
