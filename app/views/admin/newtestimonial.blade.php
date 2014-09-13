@extends('admin.master')


@section('content')
<h1>Create a new testimonial</h1>

{{Form::open(array('url'=>'dashboard/testimonials/new'))}}    

<div class="formElement">
    <label>Testimonial <span>Large Testimonial Text</span></label>
    <textarea name="body"></textarea>
</div>

<div class="formElement" style="height:100px;">
    <div style="position:relative;float:left;width:50%;">
        <label>Name <span>Client/Candidate Name</span></label>
        <input type="text" name="title" style="width:300px;">
    </div>
    <div style="position:relative;float:right;">
        <label>Company <span>Company Name displayed with name</span></label>
        <input type="text" name="intro" style="width:300px;">
    </div>
</div>

<div class="formElement">
    <label>Testimonial Type <span>Where the Testimonial will be seen</span></label>
    <div >
        <input type="radio" value="candidate" name="client_facing" style="display:block;" /> Candidate Facing
    </div>
    <div>
        <input type="radio" value="client" name="client_facing" style="display:block;" /> Client Facing        
    </div>
    <div>
        <input type="radio" value="both" name="client_facing" style="display:block;" checked /> Both        
    </div>
</div>

<input type="submit" value="Save" class="btn" />
{{Form::close()}}

@stop
