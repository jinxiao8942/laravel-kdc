@extends('homepage.master')


@section('content')
<!--<script>
    $(document).ready( function() {
        fakeFileUpload();
        humanConfirmation();
        fakeCheck();
    });
</script>-->
<div id="candidateRegister">
    <div class="container">
        <div class="col-md-9 col-center-block ">
                <h1>Become a candidate</h1>
                <p>KDC can offer candidates a unique service experience. We deal with high-end technology sectors, offering both blue and white-collar opportunities. When you join KDC you will be assigned your very own designated consultant, have access to our world-class website resource and become a valued member of the KDC team. Remember - we're not satisfied until you are.</p>
            
            
            @if($errors->has())

                @foreach ($errors->all() as $error)
                    <div class="feedbackPop"><div class="close">X</div><div class="info">{{ $error }}</div></div>
                @endforeach

            @endif


            <div class="formContainer">
                {{Form::open(array('url'=>'become-a-candidate','role'=>'form','files'=>true))}}
                    <div class="col-md-6 form-group">
                        <label class="sr-only">Full Name</label>
                        <input type="text" class="form-control" name="name" id="" placeholder="Full Name *" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="sr-only">Email Address</label>
                        <input type="email" class="form-control" id="" name="email" placeholder="Email Address *" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="sr-only">Contact Number</label>
                        <input type="text" class="form-control" id="" name="phone" placeholder="Contact Number">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="sr-only">Current Position</label>
                        <input type="text" class="form-control" id="" name="current_position" placeholder="Current Position">
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="sr-only">Message</label>
                        <textarea name="candidate_message" placeholder="Message"></textarea>
                    </div>
                    <div class="formSpacer hidden-xs hidden-sm"></div>
                    <div class="col-md-6 form-group">
                        <label class="sr-only">Password</label>
                        <input type="password" class="form-control" id="" name="password" placeholder="Password *" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="sr-only">Confirm Password</label>
                        <input type="password" class="form-control" id="" name="password_confirmation" placeholder="Confirm Password *" required>
                    </div>
                    <div class="clearfix"></div>
                    <div class="cvUpload">
                        <div class="uploadElements hidden-xs hidden-sm">
                            <span class="title hidden-xs hidden-sm">Upload CV (optional) <span>| </span></span>
                            <span class="fakeBrowse hidden-xs hidden-sm"></span>
                            <input type="file" name="cv" class="realUpload hidden-xs hidden-sm">
                            <button class="btn hidden-xs hidden-sm">Choose file</button>
                        </div>
                        
                        <div class="humanConfirmation">
                            <p>Please confirm you are not a robot...</p>
                                <div class="fakeInput1"></div>
                                <span>+</span>
                                <div class="fakeInput2"></div>
                                <span>=</span>
                                <input type="text" class="input3" required>
                                <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--<label>Please send me job alerts</label>
                    <input type="checkbox" name="sendjobs" value="1">
                    <span class="fakeCheck"></span>-->
                    
                    <input class="btn" id="candidateRegisterSubmit" type="submit" value="Submit">
                {{Form::close()}}
            </div>  
        </div>
    </div>
</div>
@stop
