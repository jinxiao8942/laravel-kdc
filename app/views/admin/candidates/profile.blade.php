@extends('admin.master')


@section('content')

<h1 class="profileHead">{{$candidate->name}} {{$candidate->surname}}
    <a class="btn" href="{{ url('dashboard/candidates/view/'.$candidate->id.'/edit') }}">
        edit
    </a>
    
    <span>
        Candidate ID: {{$candidate->id}}
        <span>
            Last log in:
            <span>24th April 2014</span>
        </span>
    </span>
</h1>

<div id="candDetails">
    <div class="col-3 col np-l nav">
        <label>Profile Image</label>
        @if($candidate->image)
            <div class="profileImage">
                <img src="http://upload.wikimedia.org/wikipedia/commons/8/8d/President_Barack_Obama.jpg" />
                <a class="removeImage btn" href="#">remove</a>
            </div>
        @else
            <div class="profileImage">
                <img src="{{ URL::asset('/img/default-profile-pic.png') }}" />
            </div>
        @endif
        <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id) }}" class="btn active">
            Candidate Details
        </a>
        <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id.'/alert') }}" class="btn">
            Alert Preferences
        </a>
        <a href="#" class="btn">
            Candidate CV
        </a>
        <a href="#" class="btn">
            Download
        </a>
        <hr>
        <a href="{{url('dashboard/candidates')}}" class="btn back">
            <i class="fa fa-caret-left"></i>
            Back to Candidate List
        </a>
    </div>
    <div class="col-3 col np-l">
        <label>First Name</label>
        <p>{{$candidate->name}}</p>
        
        <label>Current Position</label>
        <p>{{$candidate->current_position}}</p>
    </div>
    <div class="col-3 col np-r">
        <label>Last Name</label>
        <p>{{$candidate->surname}}</p>
        
        <label>Contact Number</label>
        <p>{{$candidate->phone}}</p>
    </div>
    
<!--    <div class="col-3 col nav np-l">
        <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id) }}" class="btn active">
            Candidate Details
        </a>
        <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id.'/alert') }}" class="btn">
            Alert Preferences
        </a>
        <a href="#" class="btn">
            Candidate CV
        </a>
        <a href="#" class="btn">
            Download
        </a>
        <hr>
        <a href="{{url('dashboard/candidates')}}" class="btn back">
            <i class="fa fa-caret-left"></i>
            Back to Candidate List
        </a>
    </div>-->
    
    <div class="col-6 col np-l np-r">
        <label>Email Address</label>
        <p>{{$candidate->email}}</p>
        
        <label>Address</label>
        <p>
            47 holdenhurst Road THIS IS NOT CURRENTLY DYNAMIC<br />
            jkrenfkjnrfr <br />
            elrkjflker<br />
            elrkjflker<br />
            bh6 5hq
        </p>
    </div>
</div>

<table class="list hidden">
    <tr>
        <td>
            <h2>Profile Image</h2>
            @if($candidate->image)
                <span>Remove</span>
            @else
                <i>no image</i>
            @endif
        </td>
        <td style="text-align:left;">
            <h2>First Name</h2>
            {{$candidate->name}}
            <h2>Current Position</h2>
            {{$candidate->current_position}}
        </td>
        <td style="text-align:left;">
            <h2>Surname</h2>
            {{$candidate->surname}}
            <h2>Contact Number</h2>
            {{$candidate->phone}}
            <h2>Last Login</h2>
            {{ $candidate->last_login }}
        </td>
    </tr>
    <tr>
        <td>
            <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id) }}"><span class="btn">Candidate Details</span></a><br /><br />
            <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id.'/activity') }}"><span class="btn">Candidate Activity</span></a><br /><br />
            <a href="{{ URL::to($candidate->cv) }}" target="_blank"><span class="btn">Candidate CV</span></a><br /><br />
            <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id.'/alert') }}"><span class="btn">Alert Preferences</span><br /><br /></a>
            <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id.'/feedback') }}"><span class="btn">Client Feedback</span><br /><br /></a>
            <hr />
            <a class="btn" href="{{url('dashboard/candidates')}}">Back to Candidate List</a>
        </td>
        <td colspan="2" style="text-align:left;">
            <h2>E-Mail Address</h2>
            {{$candidate->email}}
            <br />
            <h2>Address</h2>
            {{$candidate->address}}
            <br />
            <h2>KDC Candidate Notes</h2>
            <textarea style="width:400px;height:150px;" id="candidateNotes">{{$candidate->notes}}</textarea>
            
            <span class="btn" onclick="saveNotes({{$candidate->id}})">Save</span>
        </td>
    </tr>
</table>
@stop

@section('extrajavascript')
    <script type="text/javascript">
    function saveNotes (id) {
        $.post(url + '/adminDispatch/savecandidatenotes',
            {
                id:id,
                notes:$('#candidateNotes').val()
            },
            function (data) {
                if(data.result == 1) {
                    alert('Notes saved successfully');
                } else {
                    alert(data.error);
                }
        },'json');
    }
    </script>
@stop
