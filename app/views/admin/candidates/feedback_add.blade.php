@extends('admin.master')

@section('content')
    <h1>Add Feedback</h1>
    {{ Form::open() }}
        <div class="formElement">
            <label>
                Reference <span>Job reference number</span>
            </label>
            <input type="text" name="job_reference" value="">
        </div>

        <div class="formElement">
            <label>
                Feedback <span>The feedback content</span>
            </label>
            {{ Form::textarea('feedback') }}
        </div>

        
        <input type="submit" value="Save" class="upload">
        
    </form>
    
@stop
