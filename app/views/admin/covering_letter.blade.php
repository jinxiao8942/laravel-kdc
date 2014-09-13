@extends('admin.master')

@section('content')
	<h1>Edit Covering Letter</h1>
    {{Form::open()}}
        <div class="formElement">
            <label>
                Introduction <span>Body text visible on the news module</span>
            </label>
            <textarea name="intro" id="newsIntroEditor" rows="10" cols="80">
                {{ $content->intro }}
            </textarea>
        </div>
        <div class="formElement">
            <label>
                Main copy <span>Main story content</span>
            </label>
            <textarea name="body" id="newsMainEditor" rows="10" cols="80">
                {{ $content->body }}
            </textarea>
        </div>
        
        
        <input type="submit" value="Save" class="upload">
        
    </form>
@stop
