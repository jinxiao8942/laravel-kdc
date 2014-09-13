@extends('admin.master')


@section('content')

<h1>About</h1>

<div class="formElement">
    <label>Introduction</label>
    <button class="btn" onclick="doSaveAbout()" relid="9" style="position:relative;float:right;top:-35px;">Save</button>
    <textarea name="intro"  rows="5" cols="80">{{$content->intro}}</textarea>
</div>

<div class="formElement">
    <label>Main Copy</label>
    <button class="btn" onclick="doSaveAbout()" relid="9" style="position:relative;float:right;top:-35px;">Save</button>
    <textarea name="body"  rows="10" cols="80">{{$content->body}}</textarea>
</div>
<h1>History</h1>
<div class="formElement">
    <label>Introduction</label>
    <button class="btn" onclick="doSaveAbout()" relid="9" style="position:relative;float:right;top:-35px;">Save</button>
    <textarea name="history_intro"  rows="5" cols="80">{{$history->intro}}</textarea>
</div>

<div class="formElement">
    <label>Main Copy</label>
    <button class="btn" onclick="doSaveAbout()" relid="9" style="position:relative;float:right;top:-35px;">Save</button>
    <textarea name="history_body"  rows="10" cols="80">{{$history->body}}</textarea>
</div>


<h1>Sidebar Downloads</h1>
<table style="width:90%;">
    <tr>
        <td style="width:50%">
            {{ Form::open(['url' => 'dashboard/about/upload', 'files' => true]) }}
                <h2>Download file 1</h2>
                <div class="formElement">
                    <label>Title <span>Title shown in navigation</span></label>
                    {{ Form::text('download_1','',array('style' => 'width:250px;')) }}
                    <br />
                    <b>File Uploaded:</b> <br />
                    <b>File Name:</b> <br />
                    <b>File Type:</b> <br />
                    <br /><br />
                    {{ Form::file('download_1_file', array('style' => 'width:250px;')) }}
                    
                    <br /><br />
                    <input type="submit" class="btn" value="Upload File" style="width:250px;"/>
                </div>
        </td>
        <td style="width:50%">
                <h2>Download file 2</h2>
                <div class="formElement">
                    <label>Title <span>Title shown in navigation</span></label>
                    {{Form::text('download_2','',array('style'=>'width:250px;)'))}}
                    <br />
                    <b>File Uploaded:</b> <br />
                    <b>File Name:</b> <br />
                    <b>File Type:</b> <br />
                    <br /><br />
                    {{ Form::file('download_2_file', array('style' => 'width:250px;')) }}
                    <br><br>
                    <input type="submit" class="btn" value="Upload File" style="width:250px;"/>
                </div>
            {{ Form::close() }}
        </td>
    </tr>
</table>
@stop

@section('extrajavascript')
    <script type="text/javascript">
    function doSaveAbout () {
        var intro = $('[name="intro"]').val();
        var body = $('[name="body"]').val();
        var history_intro = $('[name="history_intro"]').val();
        var history_body = $('[name="history_body"]').val();
        $.post(
            url + '/adminDispatch/saveabout',
            {intro:intro,body:body,history_body:history_body,history_intro:history_intro},
            function(data){
                if(data.result == 1) {
                    window.location.href = window.location.href;
                } else {
                    alert(data.error);
                }
            },
        'json');
    }
    </script>
@stop
