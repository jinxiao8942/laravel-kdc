@extends('homepage.master')


@section('content')

<div>
    <div id="cvTips">
    <div id="tabContainer">
        <div class="container">
            <div class="tabTop">
                <span>CAREER RESOURCES</span>
            </div>
        </div>
        <div class="container">
            <div class="col-md-8 col-center-block ">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs responsive">
                <li class="active"><a href="#careerManagement" data-toggle="tab">CAREER MANAGEMENT</a></li>
                  <li><a href="#coveringLetter" data-toggle="tab">HOW TO WRITE A COVERING LETTER</a></li>
                  <li><a href="#cvTemplate" data-toggle="tab">HOW TO WRITE A CV</a></li>
                  <li><a href="#interviewTips" data-toggle="tab">INTERVIEW TIPS</a></li>
                </ul>
                <hr class="full">
                <!-- Tab panes -->
                <div class="tab-content responsive">
                  <div class="tab-pane fade in" id="coveringLetter">
                    {{ $covering->intro }}
                    <hr>
                    {{ $covering->body }}
                  </div>
                  <div class="tab-pane fade in active" id="careerManagement">
                    
                    <h1>CAREER MANAGEMENT</h1>
                    {{ $career->intro }}
                    <hr>
                    {{ $career->body }}
                  </div>
                  <div class="tab-pane fade in" id="cvTemplate">
                    {{ $cv->intro }}
                    <hr>
                    {{ $cv->body }}
                  </div>
                  <div class="tab-pane fade in" id="interviewTips">
                    {{ $interview->intro }}
                    <hr>
                    {{ $interview->body }}
                  </div>
                </div>
            </div>
        </div>
            
    </div>
</div> <!-- end cv tips tabs -->
</div>

@stop
