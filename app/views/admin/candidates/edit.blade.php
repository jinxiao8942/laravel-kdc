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
    {{Form::open(array('role'=>'form'))}}
    <div class="col-3 col np-l">
        <label>Full Name</label>
        <input type="text" class="form-control" name="name" id="" placeholder="Full Name *" autofocus required value="{{ $candidate->name }} {{ $candidate->surname }}">
        
        <label>Current Position</label>
        <input type="text" class="form-control" id="" name="current_position" placeholder="Current Position" value="{{ $candidate->current_position }}">
    </div>
    <div class="col-3 col np-r">
        <label>Contact Number</label>
        <input type="text" class="form-control" id="" name="phone" placeholder="Contact Number *" required value="{{ $candidate->phone }}">
        
        <label>Email Address</label>
        <input type="email" class="form-control" id="" name="email" placeholder="Email Address" value="{{ $candidate->email }}">
    </div>
    <button class="btn" id="candidateRegisterSubmit">Update</button>
    </form>
</div>
<!--
{{Form::open(array('role'=>'form'))}}
    <div class="col-md-6 form-group">
        <label class="sr-only">Full Name</label>
        <input type="text" class="form-control" name="name" id="" placeholder="Full Name *" required value="{{ $candidate->name }} {{ $candidate->surname }}">
    </div>
    <div class="col-md-6 form-group">
        <label class="sr-only">Current Position</label>
        <input type="text" class="form-control" id="" name="current_position" placeholder="Current Position" value="{{ $candidate->current_position }}">
    </div>
    <div class="col-md-6 form-group">
        <label class="sr-only">Contact Number</label>
        <input type="text" class="form-control" id="" name="phone" placeholder="Contact Number *" required value="{{ $candidate->phone }}">
    </div>
    <div class="col-md-6 form-group">
        <label class="sr-only">Email Address</label>
        <input type="email" class="form-control" id="" name="email" placeholder="Email Address" value="{{ $candidate->email }}">
    </div>
</form>-->
    
    


<!--<table class="list">
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
</table>-->
@stop
