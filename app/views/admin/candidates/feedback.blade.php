@extends('admin.master')


@section('content')

<h1>{{$candidate->name}}</h1>

{{ link_to('dashboard/candidates/view/'.$candidate->id.'/feedback/add', 'Add Feedback') }}
<table class="list">
    @if($feedback->isEmpty())
	    <tr>
	    	<td>
	    		<h3>There is currently no saved feedback. {{ link_to('dashboard/candidates/view/'.$candidate->id.'/feedback/add', 'Add Some') }}</h3>
	    	</td>
	    </tr>    

        @else
            @foreach($feedback as $f)
            	<tr>
            		<td>{{ $f->job_reference }}</td>
			        <td>{{ $f->feedback }}</td>
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
