@extends('admin.master')


@section('content')
    <h1>Add a new Download file</h1>
    {{Form::open(array('url'=>'dashboard/savedownload','files'=>true))}}
    <strong>File Title</strong> {{Form::text('name')}}
    <br /><br />
    {{Form::file('download_file')}}
    <br /><br />
    {{Form::submit('Upload',array('class'=>'btn'))}}
    {{Form::close()}}

@stop
