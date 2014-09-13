@extends('admin.master')


@section('content')
    <h1>Candidates <span>Last log in: <span>24th April 2014</span></h1>

    <p class="note">Filter candidates and select individuals for more details</p>
    <div class="alphabet">
        <ul>
            <li><a href="#">All</a> <span>|</span></li>
            <li><a href="#">A</a></li>
            <li><a href="#">B</a></li>
            <li><a href="#">C</a></li>
            <li><a href="#">D</a></li>
            <li><a href="#">E</a></li>
            <li><a href="#">F</a></li>
            <li><a href="#">G</a></li>
            <li><a href="#">H</a></li>
            <li><a href="#">I</a></li>
            <li><a href="#">J</a></li>
            <li><a href="#">K</a></li>
            <li><a href="#">L</a></li>
            <li><a href="#">M</a></li>
            <li><a href="#">N</a></li>
            <li><a href="#">O</a></li>
            <li><a href="#">P</a></li>
            <li><a href="#">Q</a></li>
            <li><a href="#">R</a></li>
            <li><a href="#">S</a></li>
            <li><a href="#">T</a></li>
            <li><a href="#">U</a></li>
            <li><a href="#">V</a></li>
            <li><a href="#">W</a></li>
            <li><a href="#">X</a></li>
            <li><a href="#">Y</a></li>
            <li><a href="#">Z</a></li>
        </ul>
    </div>
    @if($candidates->count() == 0)
        <i>No Candidates Registered</i>
    @else
        <table class="list">
        @foreach($candidates as $c)
            <tr>
                <td class="name"><a href="{{url('dashboard/candidates/view/'.$c->id)}}">{{$c->name}} {{$c->surname}}</a></td>
                <td class="joined"><span>Joined:</span> {{$c->created_at}}</td>
                <td class="view"><a href="{{url('dashboard/candidates/view/'.$c->id)}}" class="btn">View</a></td>
                <td class="delete">
                    <a href="#"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        @endforeach        
        </table>
    @endif
    
@stop
