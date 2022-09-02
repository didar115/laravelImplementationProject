@extends('layouts.master')

@section('title', Session::get('info') ? 'Edit Student' : 'Add Student')

@section('content')


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="needs-validation"
                    action=" {{ !empty(Session::get('info')) ? url('update/' . Session::get('info.id')) : url('store') }}"
                    method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name"
                            value="{{ Session::get('info.name') ? Session::get('info.name') : old('name') }}"
                            class="form-control">

                        @error('name')
                            <div class="alert-danger px-2 mt-2 rounded-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" placeholder="xyz@gmail.com"
                            value="{{ Session::get('info.email') ? Session::get('info.email') : old('email') }}"
                            name="email" class="form-control">
                        @error('email')
                            <div class="alert-danger px-2 mt-2 rounded-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Class</label>
                        <input type="text"
                            value="{{ Session::get('info.class') ? Session::get('info.class') : old('class') }}""
                            name="class" class="form-control">
                        @error('class')
                            <div class="alert-danger px-2 mt-2 rounded-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Roll</label>
                        <input type="number"
                            value="{{ Session::get('info.roll') ? Session::get('info.roll') : old('roll') }}" name="roll"
                            class="form-control">
                        @error('roll')
                            <div class="alert-danger px-2 mt-2 rounded-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">All About yourself</label>
                        <textarea value="{{ Session::get('info.description') ? Session::get('info.description') : old('description') }}"
                            name="description" class="form-control" rows="3">{{ Session::get('info.description') ? Session::get('info.description') : old('description') }}</textarea>

                        @error('description')
                            <div class="alert-danger px-2 mt-2 rounded-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Interest</label>
                        {{-- @if (Session::get('info.interest'))
                            @foreach (explode(',', Session::get('info.interest')) as $a)
                                <select class="form-control" value="{{ old('interest[]') }}" id="multipleSelect"
                                    name="interest[]" multiple="multiple">

                                    @foreach (explode(',', Session::get('info.interest')) as $a)
                                        <option value="1" {{ 1 == $a ? 'selected' : 'hidden' }}>Reading</option>
                                        <option value="2" {{ 2 == $a ? 'selected' : 'hidden' }}>Drawing</option>
                                        <option value="3" {{ 3 == $a ? 'selected' : 'hidden' }}>Travelling</option>
                                        <option value="4" {{ 4 == $a ? 'selected' : 'hidden' }}>writing</option>
                                        <option value="5" {{ 5 == $a ? 'selected' : 'hidden' }}>Coding</option>
                                        <option value="6" {{ 6 == $a ? 'selected' : 'hidden' }}>Playing</option>
                                        <option value="7" {{ 7 == $a ? 'selected' : 'hidden' }}>Machanics</option>
                                    @endforeach
                                </select>
                            @endforeach
                        @elseif(empty(Session::get('info.interest')))
                            <select class="form-control" value="{{ old('interest[]') }}" id="multipleSelect"
                                name="interest[]" multiple="multiple">
                                <option value="1">Reading</option>
                                <option value="2">Drawing</option>
                                <option value="3">Travelling</option>
                                <option value="4">writing</option>
                                <option value="5">Coding</option>
                                <option value="6">Playing</option>
                                <option value="7">Machanics</option>
                            </select>
                        @endif --}}

                        {{-- @php
                            $dataAll = Session::get('interestAll');
                            $dataEdit = Session::get('interestEdit');
                            $dt = Session::get('flag');
                            foreach ($dataEdit as $key => $interest) {
                                $interest[$key];
                            }
                            dd(count($dataEdit[0]), $dataEdit, $interest[0]=='Cycling');
                        @endphp --}}


                        <select class="form-control" value="{{ old('interest[]') }}" id="multipleSelect" name="interest[]"
                            multiple="multiple">
                            @php
                                $dataAll = Session::get('interestAll');
                                $dataEdit = Session::get('interestEdit');
                                
                                $create = Session::get('flag');
                            @endphp

                            @if (isset($create))
                                @foreach ($dataAll as $key => $interest)
                                    {{ $interest[$key] = $interest['fields'] }}
                                    <option value="{{ $interest[$key] }}">{{ $interest['fields'] }}</option>
                                @endforeach
                            @else
                                @foreach ($dataEdit[0] as $key => $edit)
                                    <option value="{{ $dataEdit[0][$key] }}" selected>{{ $dataEdit[0][$key] }}
                                    </option>
                                @endforeach

                                @foreach ($dataEdit[0] as $keys => $edit)
                                    @foreach ($dataAll as $key => $interest)
                                        @if ($dataEdit[0][$keys] != $interest['fields'])
                                            <option value="{{ $interest[$key] }}">{{ $interest['fields'] }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                                {{-- <option value="{{ $key }}" >{{ $interest['fields'] }}</option> --}}
                            @endif
                        </select>


                        @error('interest')
                            <div class="alert-danger px-2 mt-2 rounded-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        data-bs-title="Tooltip on bottom"
                        class="btn btn-primary">{{ Session::get('info') ? 'update' : 'Submit' }}</button>
                    <a href="{{ route('list') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i>
                        Go Back</a>
                </form>
            </div>

        </div>
    </div>


@endsection



@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#multipleSelect').select2();
            multiple: true
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
