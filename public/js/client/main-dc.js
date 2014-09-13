
// Ready.. Set.. GO!
$(document).ready(function(e) {
    init()
});



// Initialize funciton
function init() {
	$('#masthead').waypoint('sticky', {
		 offset: -144
	});
	$.localScroll();
	navRollover()
	loginToggle();
	footerContact();
	sectorDetails();
	sectorNav();
	liveChat();
	homeDetails();
	newsSocial();
	responsiveNav();
	//clientsFade();
	newsDetailsToggle()
	if(!jQuery.browser.mobile && !isiPad) {
		$.stellar();
		socialToggle();
		phoneToggle();
	}
	
	/* ASHLEY */
	referEmail();
	socialLinks();
	printNews();
	humanConfirmation();
	burgerNav();
	newHeader();
	popup();
	
	if($('#map').size() >= 1) {
	gmaps();	    
	}

}
function popup() {

setTimeout( function() {
    
    $('.feedbackPop').each( function() {
        if($(this).children('.info').html() != '') {
            var popWidth = $(this).outerWidth();
            $(this).css({
                'marginLeft':'-'+popWidth/2+'px'
                }).fadeIn();
        }
        else {
            $(this).hide();
        }
    });
    
        
        
    }, 500);

    $('.feedbackPop .close').click( function() {
        $(this).parent('.feedbackPop').fadeOut(); 
    });
}

function newHeader() {
    $(window).scroll( function() {
	var scrolled = $(window).scrollTop();
	if (scrolled >= 307 && !$('#headerMain').hasClass('downPos')) {
	    $('#headerMain').addClass('downPos').css({
		position: 'fixed',
		top: '-145px'
	    });
	    
	    setTimeout( function() {
		$('#headerMain').animate({
		    top: 0
		});
	    }, 300);
	}
	else if(scrolled <= 10) {
	    $('#headerMain').removeClass('downPos').css({
		position: 'absolute',
		top: 0
	    });
	}
    });
}

function burgerNav() {
    $('a.burger').click( function() {
        $('.ddl').slideToggle();
    });
    
    $('a.burgerLogin').click( function() {
        $('ul.login').slideToggle();
    });
}
function gmaps() {

    map = new GMaps({
    el: '#map',
    lat: 50.7838925,
    lng: -1.8519599,
    zoom: 15
  });
    map.drawOverlay({
      lat: map.getCenter().lat(),
      lng: map.getCenter().lng(),
      layer: 'overlayLayer',
      content: '<div class="mapMarker"></div>',
      verticalAlign: 'top',
      horizontalAlign: 'center'
    });
    var styles = [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#5f94ff"},{"lightness":26},{"gamma":5.86}]},{},{"featureType":"road.highway","stylers":[{"weight":0.6},{"saturation":-85},{"lightness":61}]},{"featureType":"road"},{},{"featureType":"landscape","stylers":[{"hue":"#0066ff"},{"saturation":74},{"lightness":100}]}]

    map.addStyle({
        styles: styles,
        mapTypeId: "map_style"  
    });
    map.setStyle("map_style");
    
    map.setOptions({
        'scrollwheel': false
    });
    
    map2 = new GMaps({
    el: '#map2',
    lat: 51.546727,
    lng: -2.5538767,
    zoom: 15
  });
    map2.drawOverlay({
      lat: map2.getCenter().lat(),
      lng: map2.getCenter().lng(),
      layer: 'overlayLayer',
      content: '<div class="mapMarker"></div>',
      verticalAlign: 'top',
      horizontalAlign: 'center'
    });
    var styles = [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#5f94ff"},{"lightness":26},{"gamma":5.86}]},{},{"featureType":"road.highway","stylers":[{"weight":0.6},{"saturation":-85},{"lightness":61}]},{"featureType":"road"},{},{"featureType":"landscape","stylers":[{"hue":"#0066ff"},{"saturation":74},{"lightness":100}]}]

    map2.addStyle({
        styles: styles,
        mapTypeId: "map_style"  
    });
    map2.setStyle("map_style");
    
    map2.setOptions({
        'scrollwheel': false
    });
    
    setTimeout( function() {
        $('#bristolInfo').hide();
    }, 300);
    
    // toggle maps
    $('.bournemouthMap').click( function() {
        $('#bournemouthInfo').show();
        $('#bristolInfo').hide();
    });
    $('.bristolMap').click( function() {
        $('#bournemouthInfo').hide();
        $('#bristolInfo').show();
    });
    

}
function humanConfirmation() {
    var firstNumber = Math.floor((Math.random()*5)+1);
    var secondNumber = Math.floor((Math.random()*5)+1);
    
    var correctAnswer = firstNumber + secondNumber;
    
    //console.log(firstNumber)
    //console.log(secondNumber)
    //console.log(correctAnswer);
    
    $('.fakeInput1').html(firstNumber);
    $('.fakeInput2').html(secondNumber);
    
    $('#candidateRegisterSubmit, .submit-container input').click( function() {
        var userMath = $('.input3').val();
        if(userMath != correctAnswer) {
           // alert("You're not a human, you're a robot!");
           $('.input3').css('border','1px solid red');
           return false;
        }
        else {
           // alert('Yay, youre not a robot. Lets login!');
            $('.input3').css('border','1px solid green');
        }
    });
}
function newsDetailsToggle() {
	$('#news-container .details-container a').funcToggle('click', function(e) {
		e.preventDefault();
		$(this).parents('.news-item').find('.details-content').slideDown();
		$(this).parent('.inner').addClass('activeTab');
	}, function(e){
		e.preventDefault();
		$(this).parents('.news-item').find('.details-content').slideUp();
		$(this).parent('.inner').removeClass('activeTab');
	});
}
function socialLinks() {
    
    
    
    $('.shareTwitter').each( function() {
        var newsTitle = $(this).closest('.news-item').children('h2').text();
        var newsLink = document.URL;
        
        var tweet = "https://twitter.com/home?status=" + newsTitle + " " + newsLink + " " + "via @kdcresource";
        
        $(this).attr('href',tweet);

    });
    
    $('.shareTwitter').click(function(event) {
        //event.preventDefault();
    var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        url    = this.href,
        opts   = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;
    
    window.open(url, 'shareTwitter', opts);
 
    return false;
    });
    

    
    //https://www.linkedin.com/shareArticle?mini=true&url=newsLink&title=newsTitle&summary=first%20chars&source=KDC
    $('.shareLinked').each( function() {
        var newsTitle = $(this).closest('.news-item').children('h2').text();
        var newsLink = document.URL;
        var newsSummary = $(this).closest('.news-item').find('.excerpt').text()
        
        var linkedLink = "https://www.linkedin.com/shareArticle?mini=true&url=" + newsLink + "&title=" + newsTitle + "&summary=" + newsSummary + "&source=KDC%20RESOURCE";
        
        $(this).attr('href',linkedLink);
    });
    
     $('.shareLinked').click(function(event) {
        //event.preventDefault();
    var width  = 575,
        height = 400,
        left   = ($(window).width()  - width)  / 2,
        top    = ($(window).height() - height) / 2,
        url    = this.href,
        opts   = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;
    
    window.open(url, 'shareLinked', opts);
 
    return false;
  });
    
    $('.fb-share-button').each( function() {
        var newsLink = document.URL;
        
        $(this).attr('data-href',newsLink);
        
    });
}

function printNews() {
    $('.newsPrint').click( function(event) {
        event.preventDefault();
        
        var printContents = $(this).closest('.news-item').html();
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        
    });
}
function referEmail() {
    //mailto:?subject=Your mate might be interested&body=thisisalink
    $('.emailRefer').each( function() {
        var newsTitle = $(this).closest('.news-item').children('h2').text();
        var newsLink = $(this).closest('.news-item').children('h2').children('a').attr('href');
        
        var mailToLink = "mailto:?subject="+newsTitle+"&body="+newsLink;
        
        $(this).attr('href',mailToLink);
    });
}
function responsiveNav() {
	$('#masthead').append('<a href="#" class="box-shadow-menu"></a>');
	$('.box-shadow-menu').funcToggle('click', function() {
		$('#masthead #responsive-nav-container').slideDown();
	}, function() {
		$('#masthead #responsive-nav-container').slideUp();
	});
}
function navRollover() {
	$('nav#user-login li a, nav#mastnav li a').each(function() {
        $(this).append('<span class="rollover"></span>');
    });
	$('nav#user-login li a, nav#mastnav li a').hover(function(e) {
        $(this).find('span').show();
    }, function() {
		$(this).find('span').hide();
	});
}

function loginToggle() {
	$('a.login-toggle').funcToggle('click', function(e) {
		e.preventDefault();
		$(this).text('CLOSE');
		$('#header-login').slideDown('fast');
	}, function(e) {
		e.preventDefault();
		$('#header-login').slideUp('fast');
		$(this).text('LOG IN');
	})
}
function socialToggle() {
	$('#social ul li.social .open').funcToggle('click', function(e) {
		e.preventDefault();
		$('#social ul li.phone').animate({
			width:'42px'
		});
		$(this).closest('#social ul li.social').animate({
			width:'175px'
		});
	}, function(e) {
		e.preventDefault();
		$(this).closest('#social ul li.social').animate({
			width:'42px'
		});
	});
}
function phoneToggle() {
	$('#social ul li.phone').funcToggle('click', function(e) {
		e.preventDefault();
		$('#social ul li.social').animate({
			width:'42px'
		});
		$(this).animate({
			width:'165px'
		});
	}, function(e) {
		e.preventDefault();
		$(this).animate({
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
		$(this).text('Register').attr('href', 'client/become-a-client');
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
	    if(direction =="down") {
		$('#sectors-nav a').removeClass('active');
	  	$('#aerospace-link').addClass('active');
	    }
	}, {
	    offset: 50
	}).waypoint( function(direction){
	    if(direction =="up") {
		$('#sectors-nav a').removeClass('active');
	  	$('#aerospace-link').addClass('active');
	    }
	}, {
	    offset: '-'+($('.pane.sector').first().height()/2)
	});
	
	$('#automotive').waypoint(function(direction) {
	    if(direction =="down") {
		$('#sectors-nav a').removeClass('active');
	  	$('#automotive-link').addClass('active');
	    }
	}, {
	    offset: 50
	}).waypoint( function(direction){
	    if(direction =="up") {
		$('#sectors-nav a').removeClass('active');
	  	$('#automotive-link').addClass('active');
	    }
	}, {
	    offset: '-'+($('.pane.sector').first().height()/2)
	});
	
	
	$('#defense').waypoint(function(direction) {
	    if(direction =="down") {
		$('#sectors-nav a').removeClass('active');
	  	$('#defense-link').addClass('active');
	    }
	}, {
	    offset: 50
	}).waypoint( function(direction){
	    if(direction =="up") {
		$('#sectors-nav a').removeClass('active');
	  	$('#defense-link').addClass('active');
	    }
	}, {
	    offset: '-'+($('.pane.sector').first().height()/2)
	});

	$('#marine').waypoint(function(direction) {
	    if(direction =="down") {
		$('#sectors-nav a').removeClass('active');
	  	$('#marine-link').addClass('active');
	    }
	}, {
	    offset: 50
	}).waypoint( function(direction){
	    if(direction =="up") {
		$('#sectors-nav a').removeClass('active');
	  	$('#marine-link').addClass('active');
	    }
	}, {
	    offset: '-'+($('.pane.sector').first().height()/2)
	});
	
	$('#oil-gas').waypoint(function(direction) {
	    if(direction =="down") {
		$('#sectors-nav a').removeClass('active');
	  	$('#oil-gas-link').addClass('active');
	    }
	}, {
	    offset: 50
	}).waypoint( function(direction){
	    if(direction =="up") {
		$('#sectors-nav a').removeClass('active');
	  	$('#oil-gas-link').addClass('active');
	    }
	}, {
	    offset: '-'+($('.pane.sector').first().height()/2)
	});
	
	
	
	$('#space').waypoint(function(direction) {
	    if(direction =="down") {
		$('#sectors-nav a').removeClass('active');
	  	$('#space-link').addClass('active');
	    }
	}, {
	    offset: 50
	}).waypoint( function(direction){
	    if(direction =="up") {
		$('#sectors-nav a').removeClass('active');
	  	$('#space-link').addClass('active');
	    }
	}, {
	    offset: '-'+($('.pane.sector').first().height()/2)
	});
	
	
	$('#power').waypoint(function(direction) {
	    if(direction =="down") {
		$('#sectors-nav a').removeClass('active');
	  	$('#power-link').addClass('active');
	    }
	}, {
	    offset: 50
	}).waypoint( function(direction){
	    if(direction =="up") {
		$('#sectors-nav a').removeClass('active');
	  	$('#power-link').addClass('active');
	    }
	}, {
	    offset: '-'+($('.pane.sector').first().height()/2)  
	});
	
	$('#it').waypoint(function(direction) {
	    if(direction =="down") {
		$('#sectors-nav a').removeClass('active');
	  	$('#it-link').addClass('active');
	    } 
	}, {
	    offset: 50
	}).waypoint( function(direction){
	    if(direction =="up") {
		$('#sectors-nav a').removeClass('active');
	  	$('#it-link').addClass('active');
	    }
	}, {
	    offset: '-'+($('.pane.sector').first().height()/2)
	});

}
function liveChat() {
	var chat = $("#livechat");
	
	$('#mastfooter').waypoint(function(direction) {
		chat.css({
			position: 'absolute',
			bottom: '150px',
			zIndex: '5001'
		});
	}, { offset: 500 });
	
	
	$('#livechat').hover(function(e) {
        $(this).find('.normal').fadeOut();
		$(this).find('.hover').fadeIn();
    }, function() {
		$(this).find('.hover').fadeOut();
		$(this).find('.normal').fadeIn();
	});	
}
function newsSocial() {
	$('.news-social .inner').mouseenter(function() {
		$(this).stop().animate({
			height:'70px'
		}, 'fast');
	});
	$('.news-social .inner').mouseleave(function() {
		$(this).stop().animate({
			height:'35px'
		}, 'fast');
	});
}
function clientsFade() {
	$('#clients-container .client img').css('opacity','0');

	$('#clients-container .row').waypoint(function(){
		$(this).find('.client').each(function(i) {
			$(this).find('img').delay((i++) * 50).fadeTo(50, 1);
		});
	}, { offset: '40%' });
	
}