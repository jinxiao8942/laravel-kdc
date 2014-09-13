        <script src="{{url('js/vendor/modernizr-2.6.2.min.js')}}"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="{{url('js/plugins.js')}}"></script>
        <script src="{{url('js/ckeditor.js')}}"></script>
        <script src="{{url('js/croppic.min.js')}}"></script>
        <script src="{{url('js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js')}}"></script>
        <script src="{{url('js/main.js')}}"></script>

        <script>
            var url = "{{url('/')}}";
            $(document).ready( function() {
                leftNav();
                ckeditor();
                fakeCheck();
                slideImageUpload();
                croppicInit();
                datePicker();
            });
        </script>
    </body>
</html>
