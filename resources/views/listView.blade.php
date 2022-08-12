@extends('layouts.master')
@section('title', 'Student list')

@section('content')

    <div class="container mt-3">
        <table class="table">
            <a href="{{ url('add') }}" class="btn btn-danger ">Add student</a>

            @if (session('success'))
                <div class="alert mt-3 alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('delete'))
                <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('delete') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Roll</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->class }}</td>
                        <td>{{ $item->roll }}</td>
                        <td>
                            <a href="{{ url('edit/' . $item->id) }}" class="btn btn-dark"> Edit</a>
                            <a href="{{ url('delete/' . $item->id) }}" onclick=" return confirm('want to delete?')"
                                class="btn btn-danger">delete</a>
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

@endsection
