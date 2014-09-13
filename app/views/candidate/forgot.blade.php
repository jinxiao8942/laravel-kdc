@extends('homepage.master')

@section('content')
<div class="purpleBar">
    
</div>
<section id="contact-us-home-slide" class="pane forgotPassword">
	
    <h1 class="slide-title">
    	<span>
        	Password Reset
    	</span>
    </h1>

	<div class="inner" data-stellar-background-ratio="0.5">
		
		<div class="col-md-9 center-col">
    
			<h2>Reset your password</h2>
			
			<p>Enter your email address and we will send you password reset instructions</p>
			
			@if($errors->has())
				
				@foreach ($errors->all() as $error)
				
				<div class="feedbackPop"><div class="close">X</div><div class="info">{{ $error }}</div></div>
				
				@endforeach
				
				@endif
				
				{{ Form::open() }}
					<fieldset>
						<div class="row">
						    <div class="col-xs-9 center-col">
							<label for="email">Email:</label>
							{{ Form::email('email') }}
							{{ Form::submit('Submit') }}
						    </div>
						    
						</div>
					</fieldset>
				
				{{ Form::close() }}
			
		</div>
	</div>
</section>


@stop
