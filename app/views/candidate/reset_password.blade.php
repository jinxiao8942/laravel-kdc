@extends('homepage.master')

@section('content')
<div class="purpleBar">
    
</div>
<section id="contact-us-home-slide" class="pane forgotPassword resetPassword">
	
    <h1 class="slide-title">
    	<span>
        	Password Reset
    	</span>
    </h1>
    
    	<div class="inner" data-stellar-background-ratio="0.5">
		
		<div class="col-md-9 center-col">
    
			<h2>Reset your password</h2>
			
			<p>Enter your new password</p>
				
				{{ Form::open() }}
				<fieldset>
					<div class="row">
						<div class="col-xs-9 center-col">
							<div class="col-md-6">
								<label for="password">Password:</label>
								{{ Form::password('password') }}
							</div>
						</div>
					
						<div class="col-xs-9 center-col">
							<div class="col-md-6">
								<label for="password_confirmation">Password (confirmed):</label>
								{{ Form::password('password_confirmation') }}
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-xs-9 center-col">
							{{ Form::submit('Submit') }}
						</div>
						
					</div>
				</fieldset>
				
				{{ Form::close() }}

		</div>
		
	</div>

</section>

@stop
