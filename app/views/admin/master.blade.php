@include('admin.header')
@include('admin.top')

<div id="main">
    <div id="mainInner" class="inner">
        @include('admin.left')
    
        <div id="content">
            @foreach ($errors->all() as $message)
                {{$message}}
            @endforeach
            @yield('content')
        </div> <!-- end content -->
    </div>
</div>
</div>
@yield('extrajavascript')
@include('admin.footer')
