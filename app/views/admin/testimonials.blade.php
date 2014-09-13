@extends('admin.master')


@section('content')

<h1>Current Testimonials</h1>
{{--
<div>
    Filter what testemonials you would like to see 
    <input type="radio" name="filter" onchange="updateFilter('client')" /> Client Facing
    <input type="radio" name="filter" onchange="updateFilter('candidate')" /> Candidate Facing
    <input type="radio" name="filter" onchange="updateFilter('both')" /> Both
</div>
--}}
@if($testimonials->count() == 0)
    <i>No testimonials </i>
@else
     @foreach($testimonials as $t)
     <?php if($t->candidate_facing == 1  && $t->client_facing == 1){
        $location = 'Both';
     }
     elseif($t->candidate_facing == 1  && $t->client_facing == 0) {
        $location = 'Candidate';
     } elseif($t->candidate_facing == 0  && $t->client_facing == 1) {
        $location = 'Client';
     } ?>
        <div class="formElement">
            <h2>{{$t->body}}</h2>
            <label>Name <span>{{$t->title}}</span></label>
            <label>Company <span>{{$t->intro}}</span></label>
            <label>Location <span>{{ $location }}</span></label>
            <div style="position:relative;float:right;top:-30px;">
                <span class="btn" onclick="deleteTestemonial({{$t->id}})" >Remove</span>
                <span class="btn" onclick="editTestemonial({{$t->id}})" >Edit</span>
            </div>
        </div>
     @endforeach
@endif
@stop

@section('extrajavascript')
    <script type="text/javascript">
    function editTestemonial (id) {
        $.post(url + '/adminDispatch/edittestemonial',{id:id},function(data){
            if(data.result == 1) {
                if($('#messagePlaceHolder').length > 0) {
                    $('#messagePlaceHolder').remove();
                }
                $('body').append('<div id="messagePlaceHolder"></div>');
                $('#messagePlaceHolder').html(data.content);
                $('#messagePlaceHolder').dialog({width:'600px'});
            } else {
                alert(data.error);
            }
        },'json');
    }
    function deleteTestemonial (id) {
        if(confirm('Are you sure you want to delete this Testimonial?')){
                $.post(url + '/adminDispatch/deletetestemocial',{id:id},function(data){
                    if(data.result == 1) {
                        window.location.href = window.location.href;
                    } else {
                        alert(data.error);
                    }
                },'json');
            }
    }
    function saveTestemonial (id) {
        $.post(url + '/adminDispatch/savetestemonial',
            {
                id:id,
                body:$('[name="body"]').val(),
                title:$('[name="title"]').val(),
                intro:$('[name="intro"]').val(),
                client_facing:$('[name="client_facing"]').val()
            },
            function(data){
            if(data.result == 1) {
                window.location.href = window.location.href;
            } else {
                alert(data.error);
            }
        },'json');
    }
    function updateFilter (e) {
        var nURL = "{{url('dashboard/testimonials')}}";
        if(e == 'client') {
            nURL = nURL + '?filter=client';
        }
        if(e == 'candidate') {
            nURL = nURL + '?filter=candidate';
        }
        window.location.href = nURL;
    }
    </script>
@stop
