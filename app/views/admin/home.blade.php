@extends('admin.master')

<?php $i=1; ?>


@section('content')
    <h1>Home</h1>
    @if(count($messages)>0)
        <?php $i=1; ?>
        @foreach($messages as $m)
            @include('snippets.messagebox',array('message'=>$m,'position'=>$i))
            <?php $i++; ?>
        @endforeach
    @endif
    <hr id="masterSeparator" />
    <div class="formElement" >
        <label>New Message</label>
        <button class="btn" style="position:relative;float:right;top:-35px;" trigger="saveNewHomepageMessage">Save</button>
        <input type="text" id="newHomepageMessage" value="" placeholder="New message here">
    </div>
@stop
