<div id="candidateNav">
        <div class="container">
            <div class="tabTop">
                <span>CANDIDATE</span>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-center-block">
                    <div class="col-md-3 col-md-offset-3 detailsContainer">                        
                        {{ Form::open(['url' => 'candidate/imageUpload', 'files' => true]) }}
                        {{-- Form::file('profileimage', ['id' => 'profileimage']) --}}
                        <div class="profilePlaceholder">
                            <div id="profilePicUpload"></div>
                        </div>
                        {{ Form::submit('Save') }}
                        {{ Form::close() }}
                    </div>
                    <div class="col-md-6">
                        <div class="candidateDetails">
                            <p class="candidateName">{{ $candidate->name }}</p>
                            <p class="candidateJobTitle">{{ $candidate->current_position }}</p>
                            <p class="candidateEmail">{{ $candidate->email }}</p>
                        </div>
                    </div>   
                    
                </div>
            </div>
            <div class="row iconContainer">
                <div class="col-md-8 col-center-block">
                    <hr>
                        <div class="col-md-3 navSection navSectionProfile {{HTML::activeState('candidate')}}">
                            <a href="{{ URL::to('candidate') }}">
                                <div class="inner">
                                </div>
                                <span>PROFILE</span>
                            </a>
                        </div>
                        <div class="col-md-3 navSection navSectionSavedJobs {{HTML::activeState('candidate/saved-jobs')}}">
                            <a href="{{ URL::to('candidate/saved-jobs') }}">
                                <div class="inner">
                                </div>
                                <span>SAVED JOBS</span>
                            </a>
                        </div>
                        <div class="col-md-3 navSection navSectionApplications {{HTML::activeState('candidate/applications')}}">
                            <a href="{{ URL::to('candidate/applications') }}">
                                <div class="inner">
                                    <div class="notification right">
                                        14
                                    </div>
                                </div>
                                <span>APPLICATIONS</span>
                            </a>
                        </div>  
                        <div class="col-md-3 navSection navSectionJobAlerts {{HTML::activeState('candidate/job-alerts')}}">
                            <a href="{{ URL::to('candidate/job-alerts') }}">
                                <div class="inner">
                                </div>
                                <span>JOB ALERTS</span>
                            </a>
                        </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
            </div> <!-- icon container -->
        </div><!-- /container -->
    </div>
