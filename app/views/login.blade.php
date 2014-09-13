
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Critical Media CMS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:100,400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{url('css/normalize.css')}}">
        <link rel="stylesheet" href="{{url('css/login.css')}}">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="loginContainer">
            
            <div id="loginForm">
                <div id="loginHead">
                </div>
                {{ Form::open() }}
                {{ $errors->first('error') }}
                    {{ Form::email('email',null,['placeholder' => 'Email', 'class' => 'loginField']) }}
                    {{ Form::password('password',null,['class' => 'loginField']) }}
                    <p>Forgotten your password?, <a href="#">click here</a> for a reminder!</p>
                    <input type="submit" value="LOG IN" id="loginButton">
                {{ Form::close() }}
            </div>
        </div>

        <script>
            $(document).ready( function() {
                $('#loginButton').click( function(event) {
                    event.preventDefault();
                    $('.loginField').each( function() {
                        $(this).attr('placeholder',$(this).attr('placeholder') + ' incorrect').addClass('validationFail');
                    });
                });
            });
        </script>

    </body>
</html>
