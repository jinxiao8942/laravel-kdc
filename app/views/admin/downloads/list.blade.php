@extends('admin.master')

@section('content')
    @if($downloads->count() == 0)
        <i><strong>No Downloads registerd</strong></i>
    @else
        <table class="list">
            <tr>
                <th>id</th>
                <th>FileName</th>
                <th>Active</th>
                <th>Client Facing</th>
                <th>Candidate Facing</th>
                <th>Actions</th>
            </tr>

            @foreach($downloads as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->title}}</td>
                    <td>{{$d->active}}</td>
                    <td>{{$d->client_facing?'yes':'no'}}</td>
                    <td>{{$d->candidate_facing?'yes':'no'}}</td>
                    <td><span class="btn">Delete</span></td>
                </tr>
            @endforeach
        </table>
    @endif
@stop
