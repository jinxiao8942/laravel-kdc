@extends('admin.master')

<?php $i=1; ?>


@section('content')
    <h1>Edit News Story</h1>
                        {{Form::open(array('files' => true))}}
                            <div class="formElement">
                                <label>
                                    Title <span>Main title for the news story</span>
                                </label>
                                {{ Form::text('title') }}
                            </div>
                            <div class="formElement">
                                <label>
                                    Introduction <span>Body text visible on the news module</span>
                                </label>
                                {{ Form::textarea('intro',null, ['id' => 'newsIntroEditor', 'rows' => '10', 'cols' => '80']) }}
                            </div>
                            <div class="formElement">
                                <label>
                                    Main copy <span>Main story content</span>
                                </label>
                                {{ Form::textarea('body',null, ['id' => 'newsMainEditor', 'rows' => '30', 'cols' => '80']) }}
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
                                    <!-- <div class="formElement">
                                        <label>
                                            Image file
                                        </label>
                                        <input type="file" name="img">
                                    </div> -->
                                    <div class="formElement">
                                        <label>
                                            Image title <span>Name the image</span>
                                        </label>
                                        <input type="text" name="img_title">
                                    </div>
                                    <div class="formElement">
                                        <label>
                                            Image alternative text <span>Describe the image</span>
                                        </label>
                                        <input type="text" name="img_alt">
                                    </div>
                                </div>
                            </div>
                            <div class="formElement small">
                                <label>
                                    Choose Date <span>Date to be displayed on the news module</span>
                                </label>
                                <input type="text" class="datePicker" name="datetime">
                            </div>

                            @if(Input::get('type') == 'job')
                                <input type="hidden" name="type" value="job"/>
                            @endif
                            
                            <input type="submit" value="UPLOAD" class="upload">
                            
                        </form>
    
@stop
