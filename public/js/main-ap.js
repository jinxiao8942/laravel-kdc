function noJobs() {
    var jobCount = $('#job-count').text().replace(' Jobs','');
    //alert(jobCount);
    if(jobCount == '0') {
        $('#noJobs').show();
    }
}

function facebookSliderHack() {

    var timer;
    $(window).bind('resize', function(){
        

        
        $('.slider2').children('.slide').each( function() {
            $(this).find('.fb-share-button').clone();
            $(this).find('.fb-share-button').remove();
        }); 
        
       timer && clearTimeout(timer);
       timer = setTimeout(onResizeStopped(), 1000);
       
    });
}

function onResizeStopped() {
    console.log('stopped')
    $('fb-share-button')
    $('.slider2').children('.slide').each( function() {
        var jobLink = $(this).find('a').attr('href');
        var fbLink = "<div class='fb-share-button' data-href="+jobLink+" data-type='link'></div>"
        $(this).find('.vacancyTabs').children('span').append(fbLink);
            
    });
}

function referTerms() {
    $('.referTerms a').click( function(event) {
        event.preventDefault();
        $('.referTermsPop').first().clone().appendTo('#mainstage').fadeIn();
        
        var popWidth = $('.referTermsPop').outerWidth();
        $('.referTermsPop').css({
            'marginLeft':'-'+popWidth/2+'px'
        });
        
        $('.referTermsPop .close').click( function() {
            $('.referTermsPop').fadeOut();
        });
    });
}

function jobTabAction() {
    var qs = (function(a) {
        if (a == "") return {};
        var b = {};
        for (var i = 0; i < a.length; ++i)
        {
            var p=a[i].split('=');
            if (p.length != 2) continue;
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
        }
        return b;
    })(window.location.search.substr(1).split('&'));
        
    if(qs["ref"] == "apply") {
        openApplyForm();
        $('.job-apply a, .details-apply a').trigger('click');
        $('.job-apply .inner').addClass('activeTab');
    }
    if(qs["ref"] == "details") {
        openDetails();
        $('.details-container a').trigger('click');
    }
    if(qs["ref"] == "refer") {
        openReferForm();
        $('.refer-container .inner').addClass('activeTab');
    }
    
    if((qs["ref"] == undefined || qs["ref"] == "") && $('.job-item').size() <= 1) {
        openDetails();
    }
    
}


function burgerNav() {
    $('a.burger').click( function() {
        $('.ddl').slideToggle();
    });
    
    $('a.burgerLogin').click( function() {
        $('ul.login').slideToggle();
    });
}
function latestVacancySlider2() {
            
    slider = $('.slider2').bxSlider({
        minSlides: 3,
        maxSlides: 3,
        slideWidth: 250,
        slideMargin: 50,
        pager: false
    });
    setTimeout( function() {
        slideAmount();
    }, 500);


    function slideAmount() {
        var windowWidth = $(window).width();
        if(windowWidth >= 992) {

            slider.reloadSlider({
                minSlides: 3,
                maxSlides: 3,
                slideWidth: 250,
                slideMargin: 50,
                pager: false
            });
            try{
        FB.XFBML.parse(); 
    }catch(ex){}
            
        }
        else if(windowWidth < 992 && windowWidth > 661) {

            slider.reloadSlider({
                minSlides: 2,
                maxSlides: 2,
                slideWidth: 250,
                slideMargin: 50,
                pager: false
            });
            try{
        FB.XFBML.parse(); 
    }catch(ex){}
        }
        else if(windowWidth <= 661) {

            slider.reloadSlider({
                minSlides: 1,
                maxSlides: 1,
                slideWidth: 250,
                slideMargin: 50,
                pager: false
            });
            try{
        FB.XFBML.parse(); 
    }catch(ex){}
        }
    }

    $(window).resize( function() {
        slideAmount();
    });
}

function openReferForm() {
    $('.refer-form').show();
}

function referPop() {
    
    $('.job-item .emailRefer').click( function(event) {
        event.preventDefault();
        
        $(this).closest('.job-item').find('.job-details').slideUp();
        $(this).closest('.job-item').find('.apply-form').slideUp();
        
        $(this).closest('.job-item').find('.refer-form').slideToggle( function() {
            checkOpenTabs();    
        });
        
        $('.inner.activeTab').removeClass('activeTab');
        
        if($(this).closest('.job-item').find('.refer-form').css('display') == 'block') {
            $(this).parent('.inner').addClass('activeTab');
        }
        else {
            $(this).parent('.inner').removeClass('activeTab');
        }
        
	
        
    });
    
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

function socialLinks() {
    $('.shareTwitter').each( function() {
        //see if we're on a news page or job page
        
        //job
        if($('.job-item').size() >= 1) {
            var newsTitle = $(this).closest('.job-item').children('h2').text();
            var newsLink = $(this).closest('.job-item').find('h2').children('a').attr('href');
        }
        //else news
        else {
            var newsTitle = $(this).closest('.news-item').children('h2').text();
            var newsLink = $(this).closest('.news-item').find('h2').children('a').attr('href');
        }
        
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
    
    //module twitter links
    $('.shareTwitterModule').each( function() {

        var jobTitle = $(this).closest('.slide').children('.vacancyUpper').find('p').text().replace('&','');
        var jobLink = $(this).closest('.slide').find('.applyButton').attr('href');
        
        var tweet = "https://twitter.com/home?status=" + jobTitle + " " + jobLink + " " + "via @kdcresource";
        
        $(this).attr('href',tweet);
    });
    
    $('.shareTwitterModule').click(function(event) {
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
    
    //module linked links
    $('.linkedModule').each( function() {

        var jobTitle = $(this).closest('.slide').children('.vacancyUpper').find('p').text().replace('&','');
        var jobLink = $(this).closest('.slide').find('.applyButton').attr('href');
        
        var linkedLink = "https://www.linkedin.com/shareArticle?mini=true&url=" + jobLink + "&title=" + jobTitle + "&source=KDC%20RESOURCE";
        
        $(this).attr('href',linkedLink);
    });
    
    $('.linkedModule').click(function(event) {
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
    
    window.open(url, 'linkedModule', opts);
 
    return false;
  });
    
    //https://www.linkedin.com/shareArticle?mini=true&url=newsLink&title=newsTitle&summary=first%20chars&source=KDC
    $('.shareLinked').each( function() {
        
        
        //job
        if($('.job-item').size() >= 1) {
            var newsTitle = $(this).closest('.job-item').children('h2').text();
            var newsLink = $(this).closest('.job-item').find('h2').children('a').attr('href');
            var newsSummary = $(this).closest('.job-item').find('.job-excerpt').text();
        }
        else {
            var newsTitle = $(this).closest('.news-item').children('h2').text();
            var newsLink = $(this).closest('.news-item').find('h2').children('a').attr('href');
            var newsSummary = $(this).closest('.news-item').find('.excerpt').text()
        }
        
        
        
        var linkedLink = "https://www.linkedin.com/shareArticle?mini=true&url=" + newsLink + "&title=" + newsTitle + "&summary=" + newsSummary + "&source=KDC%20RESOURCE";
        
        $(this).attr('href',linkedLink);
    });
    
        $('.shareLinked').click(function(event) {
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
    
    $('.fb-share-button.socialLink').each( function() {
        if($('.job-item').size() >= 1) {
            var newsLink = $(this).closest('.job-item').find('h2').children('a').attr('href');
        }
        else {
            var newsLink = $(this).closest('.news-item').find('h2').children('a').attr('href');
        }
        
        
        $(this).attr('data-href',newsLink);
        
    });
    setTimeout( function() {
        $('.pluginShareButtonLink').css({
            height: '30px',
            zIndex: '9999',
            position: 'absolute',
            width: '20px'
        });
    }, 300);
}

function printNews() {
    $('.newsPrint').click( function(event) {
        event.preventDefault();
        
        
        if ($('.news-item').size() >= 1 && $(this).closest('.news-item').find('.details-content').css('display') == 'none') {
            var printContents = $(this).closest('.news-item').html() + $(this).closest('.news-item').find('.details-content').html();
        }
        else if($('.news-item').size() >= 1) {
            var printContents = $(this).closest('.news-item').html();
        }
        else {
            var printContents = $(this).closest('.job-item').find('.job-header').html() + $(this).closest('.job-item').find('.job-body').html() + $(this).closest('.job-item').find('.details-content').html();
        }
        
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;
        window.print();
        
        setTimeout( function() {
            document.location.reload(true);
        }, 600);
        
        document.body.innerHTML = originalContents;
        document.location.reload(true);
    });
}
function referEmail() {
    //mailto:?subject=Your mate might be interested&body=thisisalink
    $('.news-item .emailRefer').each( function() {
        var newsTitle = $(this).closest('.news-item').children('h2').text();
        var newsLink = $(this).closest('.news-item').children('h2').children('a').attr('href');
        
        var mailToLink = "mailto:?subject="+newsTitle+"&body="+newsLink;
        
        $(this).attr('href',mailToLink);
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


//function latestVacanciesSlider() {
//    var slider = $('.bxslider').bxSlider({
//                    mode:'vertical',
//                    infiniteLoop: false,
//                    useCSS: false,
//                    controls: false,
//                    pager: false,
//                    touchEnabled: false
//                });
//    
//    
//    //$(window).resize( function() {
//    //    if ($(window).width() < 768) {
//    //        slider.destroySlider();
//    //    }
//    //    else {
//    //        slider.reloadSlider();
//    //    }
//    //});
//    
//    var animAmnt = (Math.ceil($('li.vacancy').size() / 2)) - 1;
//    var animOrig = animAmnt;
//    
//    $('.next').click( function(event) {
//        event.preventDefault();
//        var slideHeight = $('li.vacancy').outerHeight() +40;
//        var currentTop = $('.bxslider').css('top').replace('px','');
//    
//        
//        animAmnt--;
//        
//        if (animAmnt >= 0) {
//            $('.bxslider').animate({
//                top: currentTop - slideHeight+'px'
//            }, function() {
//                console.log(animAmnt);
//                if(animAmnt == 0) {
//                    $('.next').css('visibility','hidden');
//                }
//                if(animAmnt < animOrig) {
//                    $('.prev').css('visibility','visible');
//                }
//            });
//        }
//    });
//    
//    
//    $('.prev').click( function(event) {
//        event.preventDefault();
//        var slideHeight = $('li.vacancy').outerHeight() + 40;
//        var currentTop = $('.bxslider').css('top').replace('px','');
//        
//        
//        
//        animAmnt++;
//        
//        if (animAmnt >= 0) {
//            $('.bxslider').animate({
//                top: parseInt(currentTop) + parseInt(slideHeight)+'px'
//            }, function() {
//                console.log(animAmnt);
//                if(animAmnt > 0) {
//                    $('.next').css('visibility','visible');
//                }
//                if(animAmnt == animOrig) {
//                    $('.prev').css('visibility','hidden');
//                }
//            });
//        }
//    });
//    
//
//    
//}

function portalDropdown() {
    $('.portalTab').click( function() {
        $(this).toggleClass('open');
        $('#clientPortalDrop').slideToggle();
    });   
}
function activeAccordion() {
    $('.panel-collapse.collapse.in').prev('.panel-heading').find('a').addClass('open');
       
    $('#myConsultant .panel-title>a').click( function() {
        if($(this).hasClass('open')) {
            $('#myConsultant .panel-title>a').removeClass('open');
        }
        else {
            $('#myConsultant .panel-title>a').removeClass('open');
            $(this).addClass('open');  
        }
          
    });
}

function renderGraphs() {
    //report1CvRecieved
var chart = new Highcharts.Chart({
            exporting: {
                enabled: false,
                type: 'application/pdf'
            },
            chart: {
                plotBorderWidth: 2,
                plotBorderColor: 'white',
                renderTo: 'report1CvRecieved'
            },
            title: {
                text: '',
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                min: 0,
                title: {
                    style: {
                        color: '#95c3e6',
                        fontSize: '17px'
                    },
                    text: '<span style="font-family: Roboto">MONTH</span>',
                    offset: 70
                },
                categories: ['FEB 14', 'MAR 14', 'APR 14', 'MAY 14', 'JUN 14', 'JUL 14'],
                
                labels: {
                    useHTML: true,
                    style: {
                        color: '#1f6588',
                        fontSize: '15px'
                    },
                    align: 'left'
                },
                gridLineWidth: 1,
                gridLineDashStyle: 'longdash',
                gridLineColor: '#1f6588',
                tickLength: 0,
                tickInterval: 1,
                tickmarkPlacement: 'on',
                minorTickLength: 0
            },
            yAxis: {
                min: 0,
                max: 35,
                title: {
                    style: {
                    color: '#95c3e6',
                    fontSize: '17px'
                    },
                    text: '<span style="font-family: Roboto">NUMBER OF CVs RECIEVED</span>',
                    offset: 70
                },
                plotLines: [{
                    value: 0,
                    width: 0,
                    color: '#1f6588'
                }],
                labels: {
                    useHTML: true,
                    style: {
                        color: '#1f6588',
                        fontSize: '15px'
                    },
                    step: 1
                },
                gridLineWidth: 1,
                gridLineDashStyle: 'longdash',
                gridLineColor: '#1f6588',
                tickPixelInterval: 120,
                tickmarkPlacement: 'on',
                minorTickLength: 0
            },
            tooltip: {
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'CVs recieved',
                data: [13, 22, 14, 3, 5, 18],
                type: 'area',
                color: '#a0d0f5'
            }],
            plotOptions: {
                area: {
                    stacking: 'normal',
                    lineColor: '#1f6588'
                },
                series: {
                    marker: {
                        fillColor: '#1f6588',
                        lineWidth: 1,
                        lineColor: '#1f6588'
                    },
                    enabled: false
                }
            }
        });

       
    $('.reportActions a.download').click( function(event) {
        event.preventDefault();
        chart.exportChart();
    });
    $('.reportActions a.print').click( function(event) {
        event.preventDefault();
        chart.print();
    });
    canvg(document.getElementById('canvas'), chart.getSVG())
    
    var canvas = document.getElementById("canvas");
    var img = canvas.toDataURL("image/png");

    //$('body').append('<img src="'+img+'"/>');
    
    $('.reportActions a.email').attr('href','mailto:?body=We have to use serverside stuffs to get the png generated from the SVG onto the server and then email a link to that image? Or use a form instead of mailto: so we can generate a nice HTML email with the img embedded in it. The image is appended to the body in the previous line of code but Ive commented it out. The img variable holds the base64 string. Give me a shout if you want to go through this.');
 
}

function leaveFeedbackSlide() {
    $('.leaveFeedback').click( function(event) {
        event.preventDefault();
        if($(this).hasClass('open')) {
            $('.feedbackSubmit').fadeOut();
            $(this).removeClass('open').siblings('.interviewFeedbackContainer').slideUp();
        }
        else {
            $(this).addClass('open').siblings('.interviewFeedbackContainer').slideDown( function() {
                $('.feedbackSubmit').fadeIn();
            });
        }
    });
    
    $('.interviewFeedbackContainer .feedbackSubmit').click( function() {
        //slide up, add feedbackleft class
        $(this).fadeOut().parent('.interviewFeedbackContainer').slideUp();
        $(this).parent().siblings('.leaveFeedback').removeClass('open').addClass('feedbackLeft').html('FEEDBACK NOTES LEFT');
    });
}

function dynamicTabs() {
    $('.nav-tabs').each( function() {
        var tabGroupID = $(this).attr('id');
        $(this).children('li').each( function() {
            var currentHref = $(this).children('a').attr('href').replace('#','');
            var newHref = '#'+tabGroupID+currentHref;
            $(this).children('a').attr('href',newHref);
        });
        
        $(this).next('.tab-content').children('.tab-pane').each( function() {
            var currentID = $(this).attr('id');
            var newID = tabGroupID+currentID;
            $(this).attr('id',newID);
        });
    });
}

function applicationAction() {
    $('body').on('click', '.selectAction .dropdown-menu>li>a', function() {
        $(this).closest('.dropdown-menu.open').prev('.btn').addClass('choiceMade');
        var action = $(this).text();
        if (action =="INTERVIEW") {
            $(this).closest('.applicant').children('.scheduleInterviewContainer').slideDown();
            $(this).closest('.applicant').children('.feedbackContainer').slideUp();
        }
        else {
            $(this).closest('.applicant').children('.scheduleInterviewContainer').slideUp();
            $(this).addClass('open').closest('.applicant').children('.feedbackContainer').slideDown( function() {
                $('.feedbackSubmit').fadeIn();
            });
        }
    });
    
    $('.feedbackSubmit').click( function() {
        $(this).fadeOut();
        $(this).parent('.feedbackContainer').slideUp()
    });
}
function viewInterviews() {
    $('.currentInterview a').click( function(event) {
        event.preventDefault();

        tabID = $(this).closest('.applicationsJob').find('.nav-tabs').attr('id');
        $(this).closest('.applicationsJob').find('.nav-tabs a[href="#' + tabID + 'interview"]').tab('show');
    });
}

function submitInterviewSchedule() {
    $('.submitInterviewSchedule').click( function() {
        //submit the form, on response...
        $(this).siblings('p').fadeIn();
    });
}
function reverseAccordion() {
    $('.panel-group.responsive.visible-xs').each( function() {
        var list = $(this);
        var listItems = list.children('.panel');
        list.append(listItems.get().reverse());
    });
}
function reinitDateSelect() {
    $('.selectpicker').data('selectpicker', null);
    $('.bootstrap-select').remove();
    $('.selectpicker').selectpicker();
    
    $('.datepicker').datepicker('destroy');
    $('.datepicker').datepicker();
}
function reverseAccordion2() {
    //as the elemts are floated right, we need to reverse the order when they are collapsed
    if($('.panel-group.responsive.visible-xs').is(":visible") ) {
        var list = $('.panel-group.responsive.visible-xs');
        var listItems = list.children('.panel');
        list.append(listItems.get().reverse());
        
        //var firstItem = $('.tabContainer .panel-title').first().text();
        //if(firstItem.indexOf("RECIEVED") > -1) {
        //    list.addClass('reversed')
        //}
        //reinitl cloned selectpicker between tabs and accordion
        $('.selectpicker').data('selectpicker', null);
        $('.bootstrap-select').remove();
        $('.selectpicker').selectpicker();
        
        $('.datepicker').datepicker('destroy');
        $('.datepicker').datepicker();
    }
    else {
        $('.selectpicker').data('selectpicker', null);
        $('.bootstrap-select').remove();
        $('.selectpicker').selectpicker();
        
        $('.datepicker').datepicker('destroy');
        $('.datepicker').datepicker();
    }
}

function percentageIndicator() {
    $('.percentageIndicator').each( function() {
        var number1 = $(this).children('.amntFilled').text();
        var number2 = $(this).children('.amntTotal').text();
        
        var percent = (number1 / number2) * 100;
        
        console.log(number1 + ' ' +number2 + ' = '+percent);
        
        if(percent > 0 && percent < 25) {
            //do nothing
        }
        else if (percent >= 25 && percent < 50) {
            $(this).children('.fillIcon').addClass('twentyFive');
        }
        else if (percent >= 50 && percent < 75) {
            $(this).children('.fillIcon').addClass('fifty');
        }
        else if (percent >= 75 && percent < 100) {
            $(this).children('.fillIcon').addClass('seventyFive');
        }
        else if(percent == 100) {
            $(this).children('.fillIcon').addClass('oneHundred');
        }
        
        
    });
}

function datePicker() {
    $('.datepicker').datepicker().on('changeDate', function() {
        $('.datepicker.dropdown-menu').hide();
    });
}

function submitVacancy() {
    $('#submitVacancy #newVacancySlide').click( function() {
        $('#submitVacancyForm').slideToggle();
        $(this).toggleClass('open');
        if($(this).hasClass('open')) {
            $(this).html('Close Form');
        }
        else {
            $(this).html('<span>SUBMIT</span> NEW VACANCY');
        }
    });
    
    $('#submitVacancyForm .btn.submitVacancy').click( function(event) {
        event.preventDefault();
        //submit the form, on success...
        
        $(this).text('Submitted');
        $('#submitVacancyForm .thankyouMessage').fadeIn();
    });
}

function clientPortalTutorial() {
    $('.toggleTut').click( function() {
        $('.toggleTut').toggleClass('open');
        $('#clientPortal .tutorialClientLinks').slideToggle();
    });
    
    $('#clientPortal .portalLink').click( function(event) {
        event.preventDefault();
        $('.tutorialClientLinks .toggleTut').fadeOut();
        
        var sectionChosen = $(this).attr('class').split(' ').pop();
        var infoSection = $('#'+sectionChosen+'Info');
        
        
        $('.tutorialClientLinks .row .col-center-block').fadeOut( 500, function() {
            $('#clientPortal .tutorialClientLinks .row').css('margin-top','0px');
            infoSection.fadeIn();    
        });
        
    });
    
    $('.slideBack').click( function() {
        $(this).parent().fadeOut(500, function() {
            $('#clientPortal .tutorialClientLinks .row').css('margin-top','86px');
            $('.tutorialClientLinks .toggleTut').fadeIn();
            $('.tutorialClientLinks .row .col-center-block').fadeIn();
        });
    });
}
function humanConfirmation() {
    $('form .humanConfirmation').each( function() {
        
        var firstNumber = Math.floor((Math.random()*5)+1);
        var secondNumber = Math.floor((Math.random()*5)+1);
        
        var correctAnswer = firstNumber + secondNumber;
        
        $(this).find('.fakeInput1').html(firstNumber);
        $(this).find('.fakeInput2').html(secondNumber);
        
       
        
        $(this).closest('form').find('input:submit').click( function(event) {
            
            
             var userMath = $(this).closest('form').find('.input3').val();
            
            if(userMath != correctAnswer) {
                // alert("You're not a human, you're a robot!");
                $(this).closest('form').find('.input3').css('border','1px solid red');
                return false;
             }
             else {
                // alert('Yay, youre not a robot. Lets login!');
                 $(this).closest('form').find('.input3').css('border','1px solid green');
             }    
        });
        
    });
}


function fakeFileUpload() {
    
    jQuery.fn.animateAuto = function(prop, speed, callback){
    var elem, height, width;
    return this.each(function(i, el){
        el = jQuery(el), elem = el.clone().css({"height":"auto","width":"auto"}).appendTo("body");
        height = elem.css("height"),
        width = elem.css("width"),
        elem.remove();
        
        if(prop === "height")
            el.animate({"height":height}, speed, callback);
        else if(prop === "width")
            el.animate({"width":width}, speed, callback);  
        else if(prop === "both")
            el.animate({"width":width,"height":height}, speed, callback);
    });  
}

    $('.fakeBrowse').hide();
    $('.realUpload').change( function() {
        fileName = $(this).val();
        fileName = fileName.replace("C:\\fakepath\\", "");
        $(this).prev('.fakeBrowse').addClass('uploaded').text(fileName).fadeIn().animateAuto('width',1000, function() {
            //alert('callback');
            $('.cvUpload .btn').hide();
            $('#submitCv').show();
            //$('.realUpload').remove();
        });
    });
}

function fakeCheckCheck() {
    $('.fakeCheck').each( function() {
        if($(this).prev('input').prop('checked') == true) {
            $(this).addClass('checked');
            
            $(this).closest('.toggle').css('display','block');
        } 
    });
}

function refineSearch() {
    $('.fakeCheck').click( function() {
        $(this).closest('form').submit();    
    });
}

function fakeCheck() {
    $('.fakeCheck').click( function() {
        
        //$(this).prev('input').trigger('click');
        
        if($(this).hasClass('checked')) {
            $(this).removeClass('checked').prev('input').prop('checked', false);
            
            //for refine search
            $(this).parent('label').removeClass('imChecked');
        }
        else {
            $(this).toggleClass('checked').prev('input').prop('checked', true);
            
            //for refine search
            $(this).parent('label').addClass('imChecked');
        }  
    });
}

function tags() {
    $('.tagsInput').tagsInput({
        height: '46px',
        width: '100%'
    });
}
function fancyDropDowns() {
    $('.selectpicker').selectpicker();
    
    //set icon on load
    $('.bootstrap-select.withIcons').each( function() {
        var currentSelected = $(this).find('.filter-option').text().replace(' & ','and').replace('.','').toLowerCase();
        setIconClass(currentSelected);
    });
    
    $('.bootstrap-select.btn-group.withIcons .dropdown-menu li').click( function() {
        var currentSelected = $(this).find('.text').text().replace(' & ','and').replace('.','').toLowerCase();
        setIconClass(currentSelected);
    });
    
    function setIconClass(currentSelected) {
        //remove any current icon* class so it doesn't get confused
        $el = $('.withIcons .btn.dropdown-toggle.selectpicker');
        var prefix = 'icon';
        var classes = $el.attr("class").split(" ").filter(function(c) {
            return c.lastIndexOf(prefix, 0) !== 0;
        });
        $el.attr("class", classes.join(" "));
        
        //add newly selected icon class
        $el.addClass('icon'+currentSelected);
    }
}

function showAlertCriteria() {
    $('.showCriteria').click( function() {
        $('.showCriteria').toggleClass('open');
        $('.showCriteria .caret').toggleClass('caret-reversed');
        
        if($('.showCriteria').hasClass('open')) {
            $('.jobAlertsIntro').slideToggle( function() {
                $('.criteriaContainer').slideToggle();    
            });
        }
        else {
            
            $('.criteriaContainer').slideToggle( function() {
                $('.jobAlertsIntro').slideToggle();    
            });
        }

    });
}

function profilePic() {
        var croppicContainerEyecandyOptions = {
        uploadUrl:'img_save_to_file.php',
        cropUrl:'img_crop_to_file.php',
        imgEyecandy:true,
        imgEyecandyOpacity: 0,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onAfterImgCrop: function() {
            $('#profilePicUpload .cropControlUpload').text('CHANGE');
        },
        onAfterImgUpload: function() {
            $('.cropControlReset').on('click', function() {
                $('#profilePicUpload .cropControlUpload').text('CHANGE');
                $('.cropControlsUpload i.cropControlUpload').show();
            });
        },
        onBeforeImgUpload: function() {
            $('.cropControlsUpload i.cropControlUpload').show();
        }
    }
    var cropContainerEyecandy = new Croppic('profilePicUpload', croppicContainerEyecandyOptions);

    $('#profilePicUpload .cropControlUpload').text('CHANGE');
    $('.cropControlsUpload i.cropControlUpload').show();
}
