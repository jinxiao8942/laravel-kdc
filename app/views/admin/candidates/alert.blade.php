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
	
	<a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id) }}" class="btn">
            Candidate Details
        </a>
        <a href="{{ URL::to('dashboard/candidates/view/'.$candidate->id.'/alert') }}" class="btn active">
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
    
    <h2>Alert 1</h2>
    <div class="col-3 col np-l">
        <label>Keywords</label>
        <p>keyword 1, keyword 2</p>
        
        <label>Sector</label>
        <p>Aerospace</p>
    </div>
    <div class="col-3 col np-r">
        <label>Location</label>
        <p>South West</p>
        
        <label>Job Type</label>
        <p>Contract</p>
    </div>
    <hr class="divider">
	
	
    <h2>Alert 2</h2>
    <div class="col-3 col np-l">
        <label>Keywords</label>
        <p>keyword 1, keyword 2</p>
        
        <label>Sector</label>
        <p>Aerospace</p>
    </div>
    <div class="col-3 col np-r">
        <label>Location</label>
        <p>South West</p>
        
        <label>Job Type</label>
        <p>Contract</p>
    </div>
    <hr class="divider">
	
	
    <h2>Alert 3</h2>
    <div class="col-3 col np-l">
        <label>Keywords</label>
        <p>keyword 1, keyword 2</p>
        
        <label>Sector</label>
        <p>Aerospace</p>
    </div>
    <div class="col-3 col np-r">
        <label>Location</label>
        <p>South West</p>
        
        <label>Job Type</label>
        <p>Contract</p>
    </div>
    <hr class="divider">
    
</div>

<!--<table class="list">
    @if(is_null($jobAlert))
	    <tr>
	    	<td>
	    		<h3>You currently have no saved jobs.</h3>
	    	</td>
	    </tr>    

        @else
        <tr>
            <td><strong>Candidate Id</strong></td>
            <td><strong>Job Type</strong></td>
            <td><strong>Sector</strong></td>
            <td><strong>Location</strong></td>
            <td><strong>Salary</strong></td>
            <td><strong>Keywords</strong></td>
            <td><strong>Skill Keywords</strong></td>
            <td><strong>Active</strong></td>
        </tr>
    	<tr>
    		<td>{{ $jobAlert->candidate_id }}</td>
	        <td>{{ $jobAlert->job_type }}</td>
	        <td>{{ $jobAlert->sector_id }}</td>
	        <td>{{ $jobAlert->location_id }}</td>
            <td>{{ $jobAlert->salary_expectations }}</td>
            <td>{{ $jobAlert->keywords }}</td>
            <td>{{ $jobAlert->skill_keywords }}</td>
	        <td>@if($jobAlert->active)Active @else Not Active @endif</td>
    	</tr>

    @endif
</table>
<table class="list">
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
