<div id="navLeft">
    <ul>
        @if(!Auth::guest())
        <li>
            <a href="#"><i class="fa fa-th-list"></i>Dashboard</a>
        </li>
        <li>
            <a href="{{url('dashboard/home')}}"><i class="fa fa-home"></i>Homepage</a>
        </li>
        <li class="hasSub">
            <a href="#"><i class="fa"><img src="{{url('img/nav-news-icon.png')}}" /></i>News</a>
            <ul>
                <li>
                    <a href="{{url('dashboard/news')}}">Add News<i class="fa fa-circle"></i></a>
                </li>
                <li>
                    <a href="{{url('dashboard/news/arquive')}}">News Archive<i class="fa fa-circle"></i></a>
                </li>
            </ul>
        </li>
        
        <li class="hasSub">
            <a href="#"><i class="fa"><img src="{{url('img/nav-news-icon.png')}}" /></i>Career Resources</a>
            <ul>
                <li>
                    <a href="{{url('dashboard/career_management')}}">Career Management<i class="fa fa-circle"></i></a>
                </li>
                <li>
                    <a href="{{url('dashboard/covering_letter')}}">Covering Letter<i class="fa fa-circle"></i></a>
                </li>
                <li>
                    <a href="{{url('dashboard/how_to_write_a_cv')}}">How to write a CV<i class="fa fa-circle"></i></a>
                </li>
                <li>
                    <a href="{{url('dashboard/interview_tips')}}">Interview Tips<i class="fa fa-circle"></i></a>
                </li>
            </ul>
        </li>


        <li>
            <a href="{{url('dashboard/about')}}"><i class="fa"><img src="{{url('img/nav-about-icon.png')}}" /></i>About Us</a>
        </li>
        <li class="hasSub">
            <a href="#"><i class="fa fa-comment"></i>Testimonials</a>
            <ul>
                <li>
                    <a href="{{url('dashboard/testimonials')}}">List<i class="fa fa-circle"></i></a>
                </li>
                <li>
                    <a href="{{url('dashboard/testimonials/new')}}">Create<i class="fa fa-circle"></i></a>
                </li>
            </ul>
        </li>
        <li class="hasSub">
            <a href="#"><i class="fa fa-user"></i>Candidate</a>
            <ul>
                <li><a href="{{url('dashboard/candidates')}}">View Candidates<i class="fa fa-circle"></i></a></li>
                <li><a href="{{url('dashboard/cv_tips')}}">CV and Tips<i class="fa fa-circle"></i></a></li>
                <li><a href="{{url('dashboard/candidate_messages')}}">Static Messages<i class="fa fa-circle"></i></a></li>
            </ul>
        </li>
        <li class="hasSub">
            <a href="#"><i class="fa fa-user"></i>Downloads</a>
            <ul>
                <li>
                    <a href="{{url('dashboard/downloads')}}">List Candidate Downloads<i class="fa fa-circle"></i></a>
                </li>
                <li>
                    <a href="{{url('dashboard/newdownload')}}">Add Download<i class="fa fa-circle"></i></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{url('admin/calltoaction')}}"><i class="fa"><img src="{{url('img/nav-about-icon.png')}}" /></i>Call to Action</a>
        </li>
        <li>
            <a href="{{url('admin/clientportal')}}"><i class="fa"><img src="{{url('img/nav-about-icon.png')}}" /></i>Client Portal</a>
        </li>
        <li><a href="{{url('logout')}}"><i class="fa"><img src="{{url('img/nav-about-icon.png')}}" /></i>Logout</a></li>
        @endif
    </ul>
</div>
