@extends('admin.master')


@section('content')

<h1>{{$candidate->name}}</h1>

<table class="list">
    @if(is_null($jobs))
	    <tr>
	    	<td>
	    		<h3>You currently have no saved jobs.</h3>
	    	</td>
	    </tr>    

        @else
            @foreach($jobs as $job)
            <?php $jobInfo = DB::select("EXEC spJobByID_Select @JobID = '$job->id'")[0]; ?>
            
            	<tr>
            		<td>{{ $jobInfo->JobTitle }}</td>
			        <td>{{ $jobInfo->JobType }}</td>
			        <td>{{ $jobInfo->Salary }}</td>
			        <td>{{ $jobInfo->Location }}</td>
			        <td>@if($job->applied)Applied @else Not Applied @endif</td>
            	</tr>
            @endforeach

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
</table>
@stop
