@include('client.common.header')

<div id="news-container">

	<div class="container">
	
        <div class="row">
        
            <aside id="sidebar" class="col-md-3 hidden-xs hidden-sm">
                
                <h3>Recent Posts</h3>
                
                <ul>
                    @foreach($recent as $post)
                        <li>
                            <span class="date">
                                <span class="month">{{date('M',strtotime($post->date))}}</span>
                                <span class="day">{{date('d',strtotime($post->date))}}</span>
                            </span>
                            <a href="{{ URL::to('news/'.$post->id.'-'.Str::slug($post->title)) }}">{{$post->title}}</a>
                        </li>
                    @endforeach                
                </ul>
            
            </aside>
            
            <section id="news" class="col-md-9">
                @foreach($content as $post)
                <div class="news-item">
                
                     <h2><a href="{{ URL::to('news/'.$post->id.'-'.Str::slug($post->title)) }}">{{$post->title}}</a></h2>
                    
                    <div class="featured-image">
                    
                    	@if($post->image)
                            <img src="{{ URL::to($post->image) }}"  />
                        @endif
                    
                    </div>
                    
                    <div class="row">
                    
                        <div class="col-xs-2">
                        	<span class="date">
                                <span class="month">{{date('M',strtotime($post->date))}}</span>
                                <span class="day">{{date('d',strtotime($post->date))}}</span>
                            </span>
                        </div>
                        <!--/.date-->
                        
                        <div class="excerpt col-xs-10">
                            
                            <p>{{$post->intro}}</p>
                        
                        </div>
                        <!--/.excerpt-->
			<div class="clearfix"></div>
			<div class="details-content col-md-12" id="details-content-{{ $post->id }}" style="display:none;">                            
                            <p>{{$post->body}}</p>
                        </div>
                        
                        <footer class="news-tools">
                    	
                            <div class="row">
                            
                                <div class="news-spacer col-xs-5">
                                    
                                    &nbsp;
                                    
                                </div>
                                <!--/.news-apply-->
                                    
                                <div class="news-social-container col-xs-7">
                                    <!-- bring these tabs out in reverse order so we can float right-->
                                    <div class="news-social">
                                        <span class="social-container">
                                            <div class="inner">
                                                <p>Share</p>
                                                <div class="fb-share-button socialLink" data-href="#" data-type="link">
                                                </div>
                                                <!--<a href="#" class="socialLink shareFacebook">
                                                    <img src="img/icon-tools-facebook.png" alt="facebook icon" />
                                                </a>-->
                                                <a href="#" class="socialLink shareTwitter">
                                                    <img src="{{ URL::asset('img/icon-tools-twitter.png')}}" alt="twitter icon" />
                                                </a>
                                                <a href="#" class="socialLink shareLinked">
                                                    <img src="{{ URL::asset('img/icon-tools-linkedin.png')}}" alt="linkedin icon" />
                                                </a>
                                            </div>
                                        </span>
                                        <span class="refer-container">
                                            <div class="inner">
                                                <p>Refer</p>
                                                <!-- dynamically created in javascript -->
                                                <a class="emailRefer" href="#">
                                                    <img src="{{ URL::asset('img/icon-tools-email.png')}}" alt="email icon" />
                                                </a>
                                                <a class="newsPrint" href="#">
                                                    <img src="{{ URL::asset('img/icon-tools-print.png')}}" alt="print icon" />
                                                </a>
                                            </div>
                                        </span>
                                        <span class="details-container">
                                            <div class="inner">
                                                <a href="#" class="details" id="{{ $post->id }}">More</a>
                                            </div>
                                            
                                        </span>
                                        <!--details-container-->
                                            
                                    </div>
                                    <!--/.news-social-->                                
                                </div>
                                <!--/.news-social-container-->
                                
                            </div>
                                                        
                        </footer>
                        <!-- /.news-tools-->
                        
                    </div>
                    <!--/.row-->
                                 
                </div>
                <!-- ./news-item-->
                @endforeach
                {{ $content->links() }}
            </section>
          <!--   
            <div id="more-posts-container">
            
                <a href="#"><span>Load</span> More posts</a>
            
            </div> -->
        
        </div>
	</div>  
</div>
<!--/#news-->

@include('client.common.footer')
