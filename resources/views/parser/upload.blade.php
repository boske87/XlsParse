@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Upload form</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(['route' => 'parse.upload', 'files' => true]) !!}

        <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" name="fileUpload" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        {!! Form::close() !!}

    </div>
@stop