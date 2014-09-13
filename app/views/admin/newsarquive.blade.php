@extends('admin.master')

<?php $i=1; ?>


@section('content')

<h1>Edit News Story</h1>
<div class="newsFilter">
    <form method="get">
    <p>Filter the archive to find the story you require.</p>
    {{ Form::selectMonth('month') }}
    {{ Form::selectRange('year', 2012, date('Y')) }}
    <span>|</span>
    <input type="submit" value="Find" />
    <hr>
    </form>
</div>
@foreach($messages as $m)
<div class="newsArchiveStory">
    <img src="{{ URL::to($m->image) }}" width="150" style="float:left; padding-right: 15px;" />
    <h2>{{$m->title}}</h2>
    <h3>{{date('d-M-Y',strtotime($m->date))}}</h3>
    <a href="{{ URL::to('dashboard/news/edit/'.$m->id) }}" class="btn" style="position:relative;float:right;top:-40px;">edit</a>
    <a href="{{ URL::to('dashboard/news/delete/'.$m->id) }}" class="btn" style="position:relative;float:right;margin-right:5px;top:-40px;" onclick="return confirm('Are you sure?');">remove</a>
    <p>{{$m->intro}}</p>
    
</div>
@endforeach

<div class="editNewsContainer">
    <form>
        <div class="formElement">
            <label>
                Title <span>Main title for the news story</span>
            </label>
            <input type="text">
        </div>
        <div class="formElement">
            <label>
                Introduction <span>Body text visible on the news module</span>
            </label>
            <textarea name="newsIntroEditor" id="newsIntroEditor" rows="10" cols="80">
            </textarea>
        </div>
        <div class="formElement">
            <label>
                Main copy <span>Main story content</span>
            </label>
            <textarea name="newsMainEditor" id="newsMainEditor" rows="10" cols="80">
            </textarea>
        </div>
        
        <div class="formElement slider">
            <p>
                <label>
                    <input type="checkbox">
                    <span class="fakeCheck"></span>
                    Upload Image <span>Optional</span>
                </label>
            </p>
            <div class="slideContent">
                <div class="formElement">
                    <div id="imageUpload">
                    </div>
                    <div class="uploadText">
                        <p>Click the upload icon<br />
                            then choose your image
                        </p>
                    </div>
                </div>
                <div class="formElement">
                    <label>
                        Image title <span>Name the image</span>
                    </label>
                    <input type="text">
                </div>
                <div class="formElement">
                    <label>
                        Image alternative text <span>Describe the image</span>
                    </label>
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="formElement small">
            <label>
                Choose Date <span>Date to be displayed on the news module</span>
            </label>
            <input type="text" class="datePicker">
        </div>
        
        <div class="formElement">
            <label>
                URL <span>Not sure what this is for</span>
            </label>
            <input type="text">
        </div>
        
        <input type="submit" value="UPLOAD" class="upload">
        
    </form>
</div>
@stop
