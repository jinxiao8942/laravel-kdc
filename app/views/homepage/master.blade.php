<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>KDC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700|Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-theme.min.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('/css/animation-dc.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ URL::asset('/css/main-dc.css') }}" type="text/css">

    <!-- ashleys -->
    <link rel="stylesheet" href="{{ URL::asset('/css/main-ap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/croppic.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/jquery.bxslider.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/jquery.tagsinput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.inline-responsive.css') }}">
    
    <!-- LESS 
    <link rel="stylesheet" href="{{ URL::asset('/css/main-dc.less.css') }}" type="text/less">
    
    
    <script src="{{ URL::asset('/js/vendor/less-1.7.0.min.js') }}"></script>
    <script type="text/javascript">
         less.env = "development";
         less.watch();
    </script>
    -->

    
    <script src="{{ URL::asset('/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    
</head>

<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=322057804625626&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

@include('homepage.head')

@yield('content')


<!--    <div id="livechat-container">
        <a href="#livechat-container" id="livechat">
            <button class='purechat-button-expand' style="visibility: hidden;">
            <span class="normal">
                <img src="{{ URL::asset('/img/icon-live-chat.png') }}" alt="live chat icon"><br/>
                Live<br/>Chat
            </span>
            <span class="hover">
                <img src="{{ URL::asset('/img/icon-live-chat-rollover.png') }}" alt="live chat icon"><br/>
                Have a question<br/><small>Our expert advisors<br/>are here to help.</small>
            </span>
        </button>
        </a>
    </div>-->
</main>
<!--/#mainstage-->

<footer id="mastfooter">

    <div class="container">
     
        <a class="to-top" href="#top-anchor">Back to top <img src="{{ URL::asset('/img/icon-arrow-up.png') }}" /></a>
        
        <div class="row">
            
            <div id="footer-branding" class="col-md-12">
                
                <a href="#"><img src="{{ URL::asset('/img/logo-kdc-footer.png') }}" alt="KDC Resources" /></a>
            
            </div>
            <!--/#footer-branding-->
            
            <div id="footer-contact" class="col-md-5 footerCol">
            
                <h4>Contact Us</h4>
                
                
                <div class="row">
                
                    <div class="col-sm-6">
                    
                        <ul class="no-border">
                            <li><strong>Bournemouth Office</strong></li>
                            <li>Building 307,</li>
                            <li>Aviation Park West,</li>
                            <li>Bournemouth Airport, </li>
                            <li>Dorset BH23 6NW</li>                        
                        
                        </ul>
                    
                    </div>
                    
                    <div class="col-sm-6">
                    
                        <ul>
                            <li><strong>Bristol Office</strong></li>
                            <li>12 Beaufort Office Park, </li>
                            <li>Woodlands,</li>
                            <li>Almondsbury, </li>
                            <li>Bristol BS32 4NE</li>                        
                        </ul>
                    
                    </div>
                
                </div>
                <p><img src="{{ URL::asset('/img/icon-footer-phone.png') }}" /> +44 (0) 1202 596 092</p>
                <p><img src="{{ URL::asset('/img/icon-footer-email.png') }}" /> <a href="mailto:solutions@kdcresource.com">solutions@kdcresource.com</a></p>
                
                
            </div>
             <!--/#footer-contact-->
            
            <div class="col-md-5 footerCol">
                <div class="col-sm-6 footerCol">
            
                    <h4>KDC Resource</h4>
                    
                    <ul>
                    
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/news') }}">News</a></li>
                        <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                        <li><a href="http://www.kdcplc.co.uk/">Candidate</a></li>
                        <li><a href="http://www.kdcplc.co.uk/client">Client</a></li>
                    </ul>
                
                </div>
            
                <div class="col-sm-6 col-md-nb">
                
                    <h4>KDC GROUP</h4>
                    
                    <ul>
                    
                        <li><a href="http://www.kdcprojects.com/">KDC Projects</a></li>
                        <li><a href="http://www.kdc-group.co.uk/">KDC Group</a></li>
                        <li class="hidden"><a href="#">KDC Brochure</a></li>
                        <li><a href="{{ url('/legal#privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('/legal#terms') }}">Terms of Use</a></li>
                        <li><a href="{{ url('/legal#disclaimer') }}">Disclaimer</a></li>
                    
                    </ul>
                </div>
                
            </div>
            
            <div id="footer-social" class="col-md-2">
            
                <h4>Social</h4>
                
                <ul class="no-border">
                
                    <li><a target="_blank" href="https://www.facebook.com/kdcresource"><img src="{{ URL::asset('/img/icon-footer-facebook.png') }}" /></a></li>
                    <li><a target="_blank" href="https://twitter.com/kdcresource"><img src="{{ URL::asset('/img/icon-footer-twitter.png') }}" /></a></li>
                    <li><a target="_blank" href="http://www.linkedin.com/company/kdc-resource"><img src="{{ URL::asset('/img/icon-footer-linked-in.png') }}" /></a></li>
                
                </ul>
                
                
            
            </div>
            
            <!--<div class="col-md-12">
                <p><img src="{{ URL::asset('/img/icon-footer-phone.png') }}" /> +44(0)845 200 4972</p>
                <p><img src="{{ URL::asset('/img/icon-footer-email.png') }}" /> <a href="mailto:solutions@kdcresource.com">solutions@kdcresource.com</a></p>
            
            </div>-->
            
            <div id="copyright" class="col-md-12">
            
                &copy; <?php echo date('Y')?> <img src="{{ URL::asset('/img/logo-footer-sml.png') }}" alt="KDC Resources" /> All rights reserved.
                <!-- McAfee Secure Trustmark for 188.39.40.246 -->
                <a target="_blank" href="https://www.mcafeesecure.com/verify?host=188.39.40.246"><img style="margin-left: 30px; width: 70px;" class="mfes-trustmark" border="0" src="//cdn.ywxi.net/meter/188.39.40.246/101.gif" title="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" alt="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams" oncontextmenu="alert('Copying Prohibited by Law - McAfee Secure is a Trademark of McAfee, Inc.'); return false;"></a>
                <!-- End McAfee Secure Trustmark -->
            
            </div>
        
        </div>
    
    </div>

</footer>
<!--/#mastfooter-->

<!-- pure chat widegt -->
<script type='text/javascript'>(function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://widget.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: '9263f33f-0407-4548-b82d-d0270a04eeb0', f: true }); done = true; } }; })();</script>




    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ URL::asset('/js/vendor/jquery-1.11.0.min.js') }}"><\/script>')
    </script>

    <script src="{{ URL::asset('/js/vendor/bootstrap.min.js') }}"></script>
    
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/gmaps.js') }}"></script>
    <script src="{{ URL::asset('/js/plugins-dc.js') }}"></script>
    <script src="{{ URL::asset('/js/main-dc.js') }}"></script>
    
    <!-- ashleys -->
    <script src="{{ URL::asset('/js/croppic.min.js') }}"></script>
    <script src="{{ URL::asset('/js/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ URL::asset('/js/bootstrap-select.js') }}"></script>
    <script src="{{ URL::asset('/js/responsive-tabs.js') }}"></script>
    <script src="{{ URL::asset('/js/jquery.bxslider.js') }}"></script>
    <script src="{{ URL::asset('/js/main-ap.js') }}"></script>
    <!-- including css here to overwrite chat styles -->
    <link href="{{ URL::asset('/css/purechat.css') }}" rel="stylesheet">
<script type="text/javascript">
    var hidden = false;

    $(document).on("click", ".details", function() {

        var id = this.id;
        if (hidden) {
            $("#details-content-"+id).slideUp();
        }
        else {
            $("#details-content-"+id).slideDown();
        }
        hidden = !hidden;
    });
</script>
</body>

</html>
