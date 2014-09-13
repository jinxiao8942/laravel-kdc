@extends('admin.master')

<?php $i=1; ?>


@section('content')
    <h1>Add news</h1>
    @if(count($messages)>0)
        <?php $i=1; ?>
        @foreach($messages as $m)
            @include('snippets.sectorbox',array('message'=>$m,'position'=>$i))
            <?php $i++; ?>
        @endforeach
    @else
    <i>No News created</i>
    @endif
@stop
