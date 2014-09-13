@extends('homepage.master')


@section('content')

{{-- @include('candidate.search') --}}
{{-- @include('candidate.nav') --}}


<div id="cvTips">
    <!-- <div class="container">
        {{ Form::open(['url'=>'candidate/cv-upload', 'files' => true]) }}
        <div class="cvUpload hidden-xs hidden-sm">
            <span class="title">Upload CV <span>|</span></span>
            <span class="fakeBrowse"></span>
            <input type="file" class="realUpload" name="cv">
                <button class="btn">Choose file</button>
                <input type="submit" name="submit" id="submitCv">
        </div>
        {{ Form::close() }}
    </div> -->
    <div id="tabContainer">
        <div class="container">
            <div class="tabTop">
                <span>HELP & TIPS</span>
            </div>
        </div>
        <div class="container">
            <div class="col-md-8 col-center-block ">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs responsive">
                  <li class="active"><a href="#coveringLetter" data-toggle="tab">HOW TO WRITE A COVERING LETTER</a></li>
                  <li><a href="#writeCV" data-toggle="tab">HOW TO WRITE A CV</a></li>
                  <!-- <li><a href="#cvTemplate" data-toggle="tab">CV TEMPLATE</a></li> -->
                  <li><a href="#interviewTips" data-toggle="tab">INTERVIEW TIPS</a></li>
                </ul>
                <hr class="full">
                <!-- Tab panes -->
                <div class="tab-content responsive">
                  <div class="tab-pane fade in" id="coveringLetter">
                    <h2>Just like a CV, a good cover letter is essential when looking for work, especially as most employers spend approximately half a minute casting an eye over each job application.</h2>
                    <p>With this in mind, you have to make sure that your cover letter makes enough of an impression in those 30 seconds to make the reader want to learn more about you. But what should it contain?</p>
                    <p>Building upon the information in your CV, a cover letter should state in no uncertain terms why this company should hire you. Everything it includes should encourage the recruiter to give your CV the attention it deserves.</p>
                    <p>Not sure where to start? Here's a step-by-step guide to help you write a compelling cover letter.</p>
                    <hr>
                    <h1>Research</h1>
                    <p>We can't stress this enough. Before you sit down to write your cover letter, do some research on the company and the job you're applying for. Things to know include what the company does, their competitors and where they're placed in the market.</p>
                    <p>Not only will carrying out this research give you the knowledge you require to tailor your cover letter and CV to the style of the company, it also demonstrates that you've a real interest in the role and the company itself.</p>
                    <h1>Addressing your cover letter</h1>
                    <p>It may sound obvious, but when writing a cover letter you should always try to address the letter to the person handling job applications. This is usually listed in the job advert. If you're unsure of the right contact, don't be afraid to call the company to ask for a name. After all, there's no harm in showing initiative.</p>
                    <p>If you know the person, Dear Mr Smith / Dear Ms Jones, and if you don't; Dear Sir / Madam will suffice.</p>
                    <h1>What to include in your cover letter</h1>
                    <h3>Opening the letter</h3>
                    <p>The opening paragraph should be short and to the point and explain why it is that you're writing.</p>
                    <h3>Example:</h3>
                    <p>'I would like to be considered for the position of 'IT Manager'.</p>
                    <p>It is also useful to include where you found the ad i.e. as advertised on reed.co.uk or, if someone referred you to the contact, mention their name in this section.</p>
                    <h3>Second paragraph</h3>
                    <p>Why are you suitable for the job? Briefly describe your professional and academic qualifications that are relevant to the role and ensure you refer to each of the skills listed in the job description.</p>
                    <h3>Third paragraph</h3>
                    <p>Here's your opportunity to emphasise what you can do for the company. Outline your career goal (make it relevant to the position you're applying for) and expand on pertinent points in your CV.</p>
                    <h3>Fourth paragraph</h3>
                    <p>Here's where you reiterate your interest in the role and why you would be the right fit for the role. It's also a good time to indicate you'd like to meet with the employer for an interview.</p>
                    
                    <h3>Closing the letter</h3>
                    <p>Sign off your cover letter with 'Yours sincerely' and your name.</p>
                    
                    <h1>How to present your cover letter</h1>
                    <p>Nothing's more frustrating for recruiters than attempting to read an illegible document. A typed document in an easy-to-read font will ensure the recruiter can scan your cover letter easily. Also, keep it brief. One side of A4 should be sufficient.</p>
                  </div>
                  <div class="tab-pane fade in" id="writeCV">profile content</div>
                  <div class="tab-pane fade in active" id="cvTemplate">
                    <h2>Ok, we all know a CV is pretty important when it comes to finding work, but sometimes, it's getting the time to sit down and put pen to paper that's the biggest hurdle. While it may seem ok to tweak the same CV you've had for years each time you start looking for a new job, you need to stop fooling yourself; it's not.</h2>
                    <p>If you're short on time, find yourself procrastinating over what font to use, or simply have no idea where to start, we've put together this helpful guide with CV writing tips, templates and examples to take the pain out of putting together your job application.</p>
                    <hr>
                    <h3>1. Check for typos</h3>
                    <p>We can't stress this enough. Poor spelling is a pet hate of most recruiters. Make sure you spell check each time you amend the documents and also ask a friend to proof the final version of your CV. Also, avoid Americanisms; you're not writing a resume, it's a CV.</p>
                    
                    <h3>2. Read the job description</h3>
                    <p>It's very easy to get blown away by an impressive sounding job title or an exciting salary and benefits package, but before you spend too much time on applying for 'that dream job,' make sure your know all the role's requirements. If you're happy it's suitable, use those requirements to mould your CV and show you're a good fit for the role.</p>
                    
                    <h3>3. Tailor your CV for the role</h3>
                    <p>Avoid falling into the one CV fits all category. Instead target the document for the role you're going for. Do some research so you understand what employers are looking for and apply this knowledge to make sure you get to interview.</p>
                    
                    <h3>4. Use specific keywords</h3>
                    <p>As more and more recruiters use job sites to search for candidates based on specific keywords, it's important to try and include the terms which describe you and relate to the kinds of position you're looking for in your CV.</p>
                    
                    <h3>5. Apply pro-active descriptions</h3>
                    <p>When describing previous experience and responsibilities, it's a good idea to use the STAR model as a useful way of communicating key points clearly and concisely within the job details section of your CV. Once you've identified the 'situation', 'task', 'action' and 'result', formulate this into a short key point, making sure to include how you achieved the result, and how your actions addressed the initial situation and task.</p>
                    
                    <div id="cvDownload">
                        <a href="#">
                            DOWNLOAD CV TEMPLATE
                        </a>
                    </div>
                  </div>
                  <div class="tab-pane fade in" id="interviewTips">settings cvontent</div>
                </div>
            </div>
        </div>
            
    </div>
</div> <!-- end cv tips tabs -->
<!-- latest vacancies -->
<section id="vacancies-slide" class="pane dark">

<div class="container">
        <div class="tabTop inverse">
            <span>RECOMMENDED VACANCIES</span>
        </div>
    </div>

    <div class="container">
    
        <div class="row">
            <ul class="bxslider">
                <li class="vacancy">
                    <h2>
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            <strong>Example Job Title</strong>  
                    </h2>
                    
                    <div class="vacancy-details row">
                
                    <div class="col-md-3">
                        <span>
                            <img src="{{ URL::asset('/img/icon-type.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Example job title</strong>                
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-location.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Bournemouth, Dorset</strong>                
                    
                    </div>
                    
                    <div class="col-md-3">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>£23000.00</strong>
                    
                    </div>
                
                </div>
                
                <p><a href="#">Details</a></p>
                
                </li>
                <li class="vacancy">
                    <h2>
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            <strong>Example Job Title</strong>  
                    </h2>
                    
                    <div class="vacancy-details row">
                
                    <div class="col-md-3">
                        <span>
                            <img src="{{ URL::asset('/img/icon-type.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Example job title</strong>                
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-location.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Bournemouth, Dorset</strong>                
                    
                    </div>
                    
                    <div class="col-md-3">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>£23000.00</strong>
                    
                    </div>
                
                </div>
                
                <p><a href="#">Details</a></p>
                
                </li>
                <li class="vacancy">
                    <h2>
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            <strong>Example Job Title</strong>  
                    </h2>
                    
                    <div class="vacancy-details row">
                
                    <div class="col-md-3">
                        <span>
                            <img src="{{ URL::asset('/img/icon-type.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Example job title</strong>                
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-location.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Bournemouth, Dorset</strong>                
                    
                    </div>
                    
                    <div class="col-md-3">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>£23000.00</strong>
                    
                    </div>
                
                </div>
                
                <p><a href="#">Details</a></p>
                
                </li>
                <li class="vacancy">
                    <h2>
                            <img src="{{ URL::asset('/img/icon-job-item-aerospace.png') }}" alt="aerospace icon" />
                            <strong>Example Job Title</strong>  
                    </h2>
                    
                    <div class="vacancy-details row">
                
                    <div class="col-md-3">
                        <span>
                            <img src="{{ URL::asset('/img/icon-type.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Example job title</strong>                
                    
                    </div>
                    
                    <div class="col-md-6">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-location.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>Bournemouth, Dorset</strong>                
                    
                    </div>
                    
                    <div class="col-md-3">
                    
                        <span>
                            <img src="{{ URL::asset('/img/icon-salary.png') }}" alt="type icon" />
                        </span>
                    
                        <strong>£23000.00</strong>
                    
                    </div>
                
                </div>
                
                <p><a href="#">Details</a></p>
                
                </li>
                
                
                
            </ul>
            
            <div id="vacancy-scroller" class="col-md-2">
                <div id="fakeScroller">
                    <a href="#" class="prev">
                        <img src="{{ URL::asset('/img/icon-index-vacancy-scroller-dark.png') }}" alt="vacancy scroller button" />
                    </a>
                    <br />
                    Scroll<br/>
                    Through<br/>
                    <a href="#" class="next">
                        <img src="{{ URL::asset('/img/icon-index-vacancy-scroller-down-dark.png') }}" alt="vacancy scroller button" />
                    </a>
                </div>
            </div>
        
        </div>
    <!--/#vacancies-slide .container-->
    
</section> <!-- end latest vacancies -->


<!-- start testimonails -->
<section id="home-testimonials-slide" class="pane">

    
    <h1 class="slide-title">
        <span>      
            What our candidates say about us
        </span>
    </h1>
    
    <div class="inner">
    
        <h2>
            <strong>A really nice and large quote</strong><br/>
            a client saying how amazing and<br/>
            <strong>brilliant KDC are!</strong> 
        </h2>
        
        <span class="author">
        
            firstname surname <strong>from company</strong>
        
        </span>
    
    </div>
    
</section>
@stop
