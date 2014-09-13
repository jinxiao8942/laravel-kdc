function searchBar() {
    $('#headerSearch i').click( function() {
        if($('#searchBar').hasClass('open') && $('#searchBar input').val() != "") {
            alert('Lets do a search!')
        }
        else if($('#searchBar').hasClass('open')) {
            $('#searchBar').removeClass('open').animate({
                width: '59px'    
            }); 
        }
        else {
            $('#searchBar').addClass('open').animate({
                width: '300px'    
            });  
        }  
    });
}
function datePicker() {
    $( ".datePicker" ).datepicker({
      showOn: "both",
      buttonImageOnly: true,
      buttonImage: url + '/img/calendar-icon.png'
    });
}
function croppicInit() {
        var croppicContainerEyecandyOptions = {
        uploadUrl:url + '/img_save_to_file.php',
        cropUrl:url + '/img_crop_to_file.php',
        imgEyecandy:true,
        imgEyecandyOpacity: 0,
        loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onAfterImgUpload: function() {
            $('.uploadText').hide();
           // $('.imageUpload_imgUploadForm').after().
           

        },
        onAfterImgCrop: function() {
            var croppedImgName = $('.croppedImg').attr('src');
           var croppedImgName = croppedImgName.substring(croppedImgName.lastIndexOf("/")).replace('/','');
           //alert(croppedImgName);
           
           $('.imageUpload_imgUploadForm').after('<input type="hidden" value="'+ croppedImgName +'" name="img">')
        }
    }
    var cropContainerEyecandy = new Croppic('imageUpload', croppicContainerEyecandyOptions);
               
}
function slideImageUpload() {
    $('.slider .fakeCheck').click( function() {
        $(this).closest('.slider').children('.slideContent').slideToggle(); 
    });
    
    var currentImageSrc = $('#currentImage').attr('src');
    console.log(currentImageSrc);
    
    if(currentImageSrc == "http://www.kdcplc.co.uk") {
        console.log('no image here')
    }
    else {
        console.log('theres an image in here');
        $('.slider .fakeCheck').trigger('click');
    }
}
function fakeCheck() {
    $('.fakeCheck').click( function() {
        $(this).toggleClass('checked').prev('input').prop('checked');    
    });
}
function leftNav() {
    $('#navLeft .hasSub').each( function() {
        if($(this).hasClass('open')) {
            $(this).find('ul').slideDown(0);
        }    
    });
    $('#navLeft .hasSub').click( function() {
        that = $(this);
        that.toggleClass('open');
        that.find('ul').slideToggle();    
    });
}
function ckeditor() {
    CKEDITOR.replace('newsIntroEditor');
    CKEDITOR.replace('newsMainEditor');
}


function doCreateUser () {
    $.post(url + '/adminDispatch/docreateuser',
            {
                email:$('#newUserEmail').val(),
                password:$('#newUserPassword').val(),
                name:$('#newUserName').val()
            },
            function(data){
            if(data.result == 1) {
                window.location.href = window.location.href;
            } else {
                alert(data.error);
            }
        },'json');
}

function doUpdateUser () {
    $.post(url + '/adminDispatch/doupdateuser',
            {
                email:$('#newUserEmail').val(),
                password:$('#newUserPassword').val(),
                name:$('#newUserName').val(),
                id:$('#userid').val()
            },
            function(data){
            if(data.result == 1) {
                window.location.href = window.location.href;
            } else {
                alert(data.error);
            }
        },'json');
}

function doRemoveUser () {
    $.post(url + '/adminDispatch/doremoveuser',
            {
                id:$('#userid').val()
            },
            function(data){
            if(data.result == 1) {
                window.location.href = window.location.href;
            } else {
                alert(data.error);
            }
        },'json');
}

$().ready(function () {
    $('#content').delegate('[trigger="deleteHomepageMessage"]','click',function(){
        if(confirm('Are you sure you want to delete this message')) {
            $.post(url + '/adminDispatch/deletehomepagemessage',{id:$(this).attr('relId')},function(data){
                if(data.result == 1) {
                    $('#msg'+data.id).remove();
                }else{
                    alert(data.error);
                }
            },'json');
        }
    });

    $('#content').delegate('[trigger="saveNewHomepageMessage"]','click',function(){
        if($('#newHomepageMessage').val().length < 5){
            alert('New HomePage Message must be at least 5 chars long.');
        }else{
            $.post(url + '/adminDispatch/savenewhomepagemessage',{text:$('#newHomepageMessage').val()},function(data){
                if(data.result == 1) {
                    $('#newHomepageMessage').val('');
                    $('#masterSeparator').before(data.content);
                }else{
                    alert(data.error);
                }
            },'json');
        }
    });

    $('#content').delegate('[trigger="saveHomepageMessage"]','click',function(){
        if($('#message_'+$(this).attr('relId')).val().length < 5){
            alert('HomePage Messages must be at least 5 chars long.');
        }else{
            $.post(url + '/adminDispatch/updatehomepagemessage',{text:$('#message_'+$(this).attr('relId')).val(),id:$(this).attr('relId')},function(data){
                if(data.result == 1) {
                    alert('Message has been updated');
                }else{
                    alert(data.error);
                }
            },'json');
        }
    });

    $('[trigger="removeUser"]').on('click',function(){
        $.post(url + '/adminDispatch/removeuser',{id:$(this).attr('userid')},function(data){
            if(data.result == 1) {
                if($('#messagePlaceHolder').length > 0) {
                    $('#messagePlaceHolder').remove();
                }
                $('body').append('<div id="messagePlaceHolder"></div>');
                $('#messagePlaceHolder').html(data.content);
                $('#messagePlaceHolder').dialog({width:'600px'});
            } else {
                alert(data.error);
            }
        },'json');
    });
    $('[trigger="editUser"]').on('click',function(){
        $.post(url + '/adminDispatch/edituser',{id:$(this).attr('userid')},function(data){
            if(data.result == 1) {
                if($('#messagePlaceHolder').length > 0) {
                    $('#messagePlaceHolder').remove();
                }
                $('body').append('<div id="messagePlaceHolder"></div>');
                $('#messagePlaceHolder').html(data.content);
                $('#messagePlaceHolder').dialog({width:'600px'});
            } else {
                alert(data.error);
            }
        },'json');
    });
    $('[trigger="createUser"]').on('click',function(){
        $.post(url + '/adminDispatch/createuser',{id:$(this).attr('userid')},function(data){
            if(data.result == 1) {
                if($('#messagePlaceHolder').length > 0) {
                    $('#messagePlaceHolder').remove();
                }
                $('body').append('<div id="messagePlaceHolder"></div>');
                $('#messagePlaceHolder').html(data.content);
                $('#messagePlaceHolder').dialog({width:'600px'});
            } else {
                alert(data.error);
            }
        },'json');
    });
    $('[trigger="toggleActive"]').on('click',function () {
        $.post(url + '/adminDispatch/toggleuser',{id:$(this).attr('user')},function(data){
            if(data.result == 1) {
                window.location.href = window.location.href;
            } else {
                alert(data.error);
            }
        },'json');
    });

});