
// Ready.. Set.. GO!
$(document).ready(function(e) {
    init();
});

// Initialize funciton
function init() {
	$('#masthead').waypoint('sticky', {
		 offset: -144
	});
	
	$.localScroll({
	    offset: -75    
	});
	navRollover()
	loginToggle();
	sectorsToggle();
	headerSearchToggle();
	footerContact();
	//socialToggle();
	sectorDetails();
	sectorNav();
	liveChat();
	jobsSocial();
	jobsSidebarRefineToggle();
	homeDetails();
	candidateHomeFader();
	jobDetailsToggle();
	jobApplyFormToggle();
	newsSocial();
	newsDetailsToggle();
	//clientsFade();
	if(!jQuery.browser.mobile && !isiPad) {
		$.stellar();
		stickySidebar();
	}
	
	
	/* ASHLEY */
	fakeFileUpload();
        humanConfirmation();
	profilePic();
	showAlertCriteria();
        tags();
        fakeCheck();
	fancyDropDowns();
        fakewaffle.responsiveTabs(['xs']);
	referEmail();
	printNews();
	socialLinks();
	popup();
	referPop();
	burgerNav();
	jobTabAction();
	referTerms();
	checkOpenTabs();
	fakeCheckCheck();
	refineSearch();
	facebookSliderHack();
	noJobs();
	
	if($('#map').size() >=1 && $('#map2').size() >=1) {
	    gmaps();
	}
	
	if ($('.slider2').size() >= 1) {
	    latestVacancySlider2();
	}
	
}

function navRollover() {
	$('li.login-link a,li.register-link a, nav#mastnav li a').each(function() {
        $(this).append('<span class="rollover"></span>');
    });
	$('li.login-link a,li.register-link a, nav#mastnav li a').hover(function(e) {
        $(this).find('span').show();
    }, function() {
		$(this).find('span').hide();
	});
}

function loginToggle() {
	$('a.login-toggle').funcToggle('click', function(e) {
		e.preventDefault();
		$(this).text('Close');
		$('#header-login').slideDown('fast');
	}, function(e) {
		e.preventDefault();
		$('#header-login').slideUp('fast');
		$(this).text('Log in');
	})
}

function sectorsToggle() {
	$('a.sector-toggle').funcToggle('click', function(e) {
		e.preventDefault();
		$(this).text('Close');
		$('#sectors-dropdown').slideDown('fast');
	}, function(e) {
		e.preventDefault();
		$('#sectors-dropdown').slideUp('fast');
		$(this).text('Sectors');
	})
}
function headerSearchToggle() {
	$('li.scroll-search a').funcToggle('click', function(e) {
		e.preventDefault();
		$('#header-search').slideDown();
	}, function(e) {
		e.preventDefault();
		$('#header-search').slideUp();
	});
}

function socialToggle() {

	$('#user-tools ul li.social .open').funcToggle('click', function(e) {

		e.preventDefault();
		$('#user-tools ul li.phone').animate({
			width:'42px'
		});
		$(this).closest('#user-tools ul li.social').animate({
			width:'170px'
		});
	}, function(e) {
		e.preventDefault();
		$(this).closest('#user-tools ul li.social').animate({
			width:'42px'
		});
	});
}
function footerContact() {
	$('#footer-phone-toggle').funcToggle('click', function(e) {
		e.preventDefault();
		$('#footer-phone').slideDown();
	}, function(e){ 
		e.preventDefault();	
		$('#footer-phone').slideUp();
	});
}
function homeDetails() {
	$('.pane .more-details a').funcToggle('click', function(e) {
		e.preventDefault();
		$(this).parent('.more-details').find('.intro').slideUp();
		$(this).parent('.more-details').find('.details').delay(500).slideDown();
		$(this).text('Register').attr('href', 'become-a-client.php');
	}, function(){ 

	});
}
function sectorDetails() {
	$('.sector a').funcToggle('click', function(e) {
		e.preventDefault();
		
		$(this)
			.addClass('active')
			.parents('.sector').find('.details p').slideDown();
	}, function(e){ 
		e.preventDefault();	
		$(this)
			.removeClass('active')
			.parents('.sector').find('.details p').slideUp();
	});
}
function sectorNav() {
	$('#aerospace').waypoint(function(direction) {
		$('#sectors-nav a').removeClass('active');
	  	$('#aerospace-link').addClass('active');
	}, { offset: 50 });
	$('#automotive').waypoint(function(direction) {
		$('#sectors-nav a').removeClass('active');
	  	$('#automotive-link').addClass('active');
	}, { offset: 50 });
	$('#defense').waypoint(function(direction) {
		$('#sectors-nav a').removeClass('active');
	  	$('#defense-link').addClass('active');
	}, { offset: 50 });
	$('#marine').waypoint(function(direction) {
		$('#sectors-nav a').removeClass('active');
	  	$('#marine-link').addClass('active');
	}, { offset: 50 });
	$('#oil-gas').waypoint(function(direction) {
		$('#sectors-nav a').removeClass('active');
	  	$('#oil-gas-link').addClass('active');
	}, { offset: 50 });
	$('#space').waypoint(function(direction) {
		$('#sectors-nav a').removeClass('active');
	  	$('#space-link').addClass('active');
	}, { offset: 50 });
	$('#power').waypoint(function(direction) {
		$('#sectors-nav a').removeClass('active');
	  	$('#power-link').addClass('active');
	}, { offset: 50 });
	$('#it').waypoint(function(direction) {
		$('#sectors-nav a').removeClass('active');
	  	$('#it-link').addClass('active');
	}, { offset: 50 });
}
function liveChat() {
	
	$('#mastfooter').waypoint(function(direction) {
		if (direction === 'down') {
			$("#livechat-container").css({
				position: 'relative',
				bottom: '150px',
				left:'20px',
				zIndex: '400',
				background: 'none'
			});
			$("#livechat").css({
				position: 'absolute',
				bottom: '150px',
				left:'-10px',
				zIndex: '401'
			});
			
		}
		else {
			$("#livechat-container").css({
				position: 'fixed',
				top: '0px',
				left:'20px',
				zIndex: '400',
				background: 'rgba(0,0,0,.12)'
			});
			$("#livechat").css({
				position: 'fixed',
				bottom: '20%',
				left:'5px',
				zIndex: '401'
			});
	
		}
	}, { offset: 500 });
	$('#livechat').hover(function(e) {
        $(this).find('.normal').fadeOut();
		$(this).find('.hover').fadeIn();
    }, function() {
		$(this).find('.hover').fadeOut();
		$(this).find('.normal').fadeIn();
	});	
	
}
function jobsSidebarRefineToggle() {
	$('#refine-search a').funcToggle('click', function(e) {
		e.preventDefault();
		$(this).siblings('.toggle').slideDown('fast');
		$(this).parent('li').find('.arrow').css({
			background: 'url(/img/icon-sidebar-arrow-up.png) no-repeat center center'
		});
	}, function(e) {
		e.preventDefault();
		$(this).siblings('.toggle').slideUp('fast');
		$(this).parent('li').find('.arrow').css({
			background: 'url(/img/icon-sidebar-arrow-down.png) no-repeat center center'
		});
	});
}
function jobsSocial() {
	$('.job-social .inner').mouseenter(function() {
		$(this).stop().animate({
			height:'70px'
		}, 'fast');
		$(this).children('a').stop().animate({
			height:'70px'
		}, 'fast');
		
	});
	$('.job-social .inner').mouseleave(function() {
		$(this).stop().animate({
			height:'35px'
		}, 'fast');
		$(this).children('a').stop().animate({
			height:'35px'
		}, 'fast');
		
	});
}
function candidateHomeFader() {
	$("#home-slideshow > div:gt(0)").hide();	
	setInterval(function() { 
		$('#home-slideshow > div:first')
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#home-slideshow');
	},  3000);
}

function openApplyForm() {
    $('.apply-form').slideUp();
    $('.job-item').find('.apply-form').slideDown();
    
    $('.job-apply .inner').addClass('activeTab');
}

function checkOpenTabs() {
    //show excerpt
    //job-details
    //apply-form
    //refer-form
    
    $('.job-item').each( function() {
	var detailsForm = $(this).find('.job-details');
	var applyForm = $(this).find('.apply-form');
	var referForm = $(this).find('.refer-form');
	
	if (detailsForm.css('display') == "none" && applyForm.css('display') == "none" && referForm.css('display') == "none" ) {
	    $(this).find('.job-excerpt').slideDown();
	}
	//hide excerpt
	else {
	    $(this).find('.job-excerpt').slideUp();
	}
		
    });

    
}

function jobApplyFormToggle() {
	$('.apply-form').hide();
	$('.job-apply a, .details-apply a, .applyJobNew').funcToggle('click', function(e) {
		e.preventDefault();
		// need refernece to this
		$(this).parents('.job-item').find('.job-details').slideUp();
		$(this).parents('.job-item').find('.apply-form').slideDown( function() {
		    checkOpenTabs();    
		});
		$(this).parents('.job-item').find('.refer-form').slideUp();
		
		//remove active from other tabs
		$('.inner.activeTab').removeClass('activeTab');
		$(this).parent('.inner').addClass('activeTab');

		
		
	}, function(e) {
		e.preventDefault();
		$(this).parents('.job-item').find('.apply-form').slideUp( function() {
		    checkOpenTabs();    
		});
		// need refernece to this
		$(this).parent('.inner').removeClass('activeTab');
		
		
	});
}

function openDetails() {
    $('.apply-form').hide();
    $('.job-item').find('.job-details').slideDown();
}
function jobDetailsToggle() {
	$('.details-container a').funcToggle('click', function(e) {
		e.preventDefault();
		$('.apply-form').hide();
		$(this).parents('.job-item').find('.job-details').slideDown( function() {
		    checkOpenTabs();    
		});
		$(this).parents('.job-item').find('.refer-form').slideUp();
		
		//remove active from other tabs
		$('.inner.activeTab').removeClass('activeTab');
		$(this).parent('.inner').addClass('activeTab');
		
		
		
		
	}, function(e){
		e.preventDefault();
		$(this).parents('.job-item').find('.job-details').slideUp( function() {
		    checkOpenTabs();    
		});
		$(this).parent('.inner').removeClass('activeTab');
		
		
	});
}

function newsSocial() {
    
	$('.news-social .inner').mouseenter(function() {
		$(this).stop().animate({
			height:'70px'
		}, 'fast', function() {
		    
		    setTimeout( function() {
			$('.shareTwitter, .shareLinked').css({
			    display: 'inline-block'
			}); 
		    }, 300);
		       
		});
		
		
	});
	$('.news-social .inner').mouseleave(function() {
		$(this).stop().animate({
			height:'35px'
		}, 'fast', function() {
		    $('.shareTwitter, .shareLinked').css({
			display: 'none'
		    });    
		});
		
	});
}
function newsDetailsToggle() {
    
    if($('.news-item').size() <= 1) {
	$('#news-container .details-container a').trigger('click');
    }
    
	$('#news-container .details-container a').funcToggle('click', function(e) {
		e.preventDefault();
		$(this).parents('.news-item').find('.details-content').slideDown();
		
		$(this).parent('.inner').addClass('activeTab');
	}, function(e){
		e.preventDefault();
		$(this).parents('.news-item').find('.details-content').slideUp();
		
	});
}

function stickySidebar() {
	//$('.slide-pane-nav .inner').stickySidebar({
	//	//sidebarTopMargin: 120,
	//});
	$('#mastfooter').waypoint(function(direction) {
		if (direction === 'down') {
			$('.slide-pane-nav .inner').css({
				position:'relative',
				top: 0
			})
			
		}
		else {
			$('.slide-pane-nav .inner').css({
				position:'fixed',
				top: 150
			})
			
		}
	}, { offset: 500 });
	
	$('#about-company-slide').waypoint(function(direction) {
		if (direction === 'up') {
			$('.slide-pane-nav .inner').css({
				position:'relative',
				top: 0
			})
			
		} else {
	
			$('.slide-pane-nav .inner').css({
				position:'fixed',
				top: 150
			})
		}
	}, { offset: 0 });
	
//	$('.slide-pane-nav .inner a').click(function(e) {
//        $('.slide-pane-nav .inner li').removeClass('active');
//		$(this).parent('li').addClass('active');
//    });
	
	
    //adding active class to the nav when you've scrolled to that section
    $('#about-company-slide').waypoint(function() {
	//alert('about section');
	$('.slide-pane-nav ul li').removeClass('active');
	$('.slide-pane-nav ul li a').each( function() {
	    var theAnchor = $(this).attr('href');
	    if(theAnchor == '#about-company-slide') {
		$(this).parent('li').addClass('active');
	    }
	});
    }, { offset: 170 });
    $('#about-history-slide').waypoint(function() {
	//alert('history section');
	$('.slide-pane-nav ul li').removeClass('active');
	$('.slide-pane-nav ul li a').each( function() {
	    var theAnchor = $(this).attr('href');
	    if(theAnchor == '#about-history-slide') {
		$(this).parent('li').addClass('active');
	    }
	});
    }, { offset: 170 });
    $('#about-clients-slide').waypoint(function() {
	//alert('clients section');
	$('.slide-pane-nav ul li').removeClass('active');
	$('.slide-pane-nav ul li a').each( function() {
	    var theAnchor = $(this).attr('href');
	    if(theAnchor == '#about-clients-slide') {
		$(this).parent('li').addClass('active');
	    }
	});
    }, { offset: 170 });
    $('#about-accredidations-slide').waypoint(function() {
	//alert('accred section');
	$('.slide-pane-nav ul li').removeClass('active');
	$('.slide-pane-nav ul li a').each( function() {
	    var theAnchor = $(this).attr('href');
	    if(theAnchor == '#about-accredidations-slide') {
		$(this).parent('li').addClass('active');
	    }
	});
    }, { offset: 170 });
    $('#about-career-opportunities-slide').waypoint(function() {
	//alert('career section');
	$('.slide-pane-nav ul li').removeClass('active');
	$('.slide-pane-nav ul li a').each( function() {
	    var theAnchor = $(this).attr('href');
	    if(theAnchor == '#about-career-opportunities-slide') {
		$(this).parent('li').addClass('active');
	    }
	});
    }, { offset: 170 });
    
    $('.testimonial-slide').waypoint( function() {
	$('.slide-pane-nav ul li').removeClass('active');
    }, { offset: 170 });

}

function clientsFade() {
	$('#clients-container .client img').css('opacity','0');

	$('#clients-container .row').waypoint(function(){
		$(this).find('.client').each(function(i) {
			$(this).find('img').delay((i++) * 50).fadeTo(50, 1);
		});
	}, { offset: '50%' });
	
}