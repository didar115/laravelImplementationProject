@extends('layouts.master')

@section('title', Session::get('info') ? 'Edit Student' : 'Add Student')

@section('content')


    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action=" {{ !empty(Session::get('info')) ? url('update/' . Session::get('info.id')) : url('store') }}"
                    method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name"
                            value="{{ Session::get('info.name') ? Session::get('info.name') : '' }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Class</label>
                        <input type="text" value="{{ Session::get('info.class') ? Session::get('info.class') : '' }}""
                            name="class" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Roll</label>
                        <input type="number" value="{{ Session::get('info.roll') ? Session::get('info.roll') : '' }}"
                            name="roll" class="form-control">
                    </div>

                    <button type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        data-bs-title="Tooltip on bottom"
                        class="btn btn-primary">{{ Session::get('info') ? 'update' : 'Submit' }}</button>
                    <a href="{{ route('list') }}" class="btn btn-dark">
                        <-Go Back</a>
                </form>
            </div>

        </div>
    </div>


@endsection
