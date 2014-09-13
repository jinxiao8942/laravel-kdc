{{ Form::open(['url' => 'dashboard/testimonials/save/'.$testemonial->id]) }}
<style type="text/css">
    .formElement {margin-left: 10px;}
    textarea {width:400px !important;}
    input [type="submit"] {margin: 10px !important;}
</style>

<?php 
    $location = null;
    if($testemonial->candidate_facing == 1  && $testemonial->client_facing == 1){
        $location = 'both';
     }
     elseif($testemonial->candidate_facing == 1  && $testemonial->client_facing == 0) {
        $location = 'candidate';
     } elseif($testemonial->candidate_facing == 0  && $testemonial->client_facing == 1) {
        $location = 'client';
     } ?>

<h1>Editing Testemonial by <b>{{$testemonial->title}}</b></h1>

<div class="formElement">
    <label>Testimonial <span>Large Testimonial Text</span></label>
    <textarea name="body">{{$testemonial->body}}</textarea>
</div>

<div class="formElement" style="height:100px;">
        <label>Name <span>Client/Candidate Name</span></label>
        <input type="text" name="title" style="width:300px;" value="{{$testemonial->title}}">
</div>
<div class="formElement" style="height:100px;">
        <label>Company <span>Company Name displayed with name</span></label>
        <input type="text" name="intro" style="width:300px;" value="{{$testemonial->intro}}">
</div>

<div class="formElement">
    <label>Testimonial Type <span>Where the Testimonial will be seen</span></label>
    <div >
        <input type="radio" value="candidate" name="client_facing" style="display:block;" @if($location == 'candidate') checked @endif /> Candidate Facing
    </div>
    <div>
        <input type="radio" value="client" name="client_facing" style="display:block;" @if($location == 'client') checked @endif /> Client Facing        
    </div>
    <div>
        <input type="radio" value="both" name="client_facing" style="display:block;" @if($location == 'both') checked @endif /> Both        
    </div>
</div>
<input type="submit" value="Save" class="btn" onclick="saveTestemonial({{$testemonial->id}})" />
{{ Form::close() }}
