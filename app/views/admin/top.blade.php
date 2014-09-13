<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="container">
    <div id="header">
        <div id="headerInner" class="inner">
            <div id="navTabs">
                <ul>
                    <!--<li class="active">
                        <a href="{{url('admin')}}"><i class="fa fa-home"></i></a>
                    </li>-->
                    @if(!Auth::guest())
                    <li class="active">
                        <a href="#">RESOURCE</a>
                    </li>
                    @endif
                </ul>
                <h1>KDC Global Content Management</h1>
            </div>
        </div> <!-- end header inner -->
        <div id="navMisc">
            <div class="inner">
                <ul>
                    <li>
                        <a href="{{url('cmsadmin')}}">CMS Admin</a> |
                    </li>
                    @if(!Auth::guest())
                    <li>
                        <a href="#">Analytics</a> |
                    </li>
                    <li>
                        <a href="#">{{Auth::user()->name}}</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div> <!-- end navmisc -->
    </div> <!-- end header -->
