@extends('admin.master')

<?php $i=1; ?>


@section('content')
    <h1>Edit News Story</h1>
                        {{Form::open(array('files' => true))}}
                            <div class="formElement">
                                <label>
                                    Title <span>Main title for the news story</span>
                                </label>
                                <input type="text" name="title" value="{{ $news->title }}">
                            </div>
                            <div class="formElement">
                                <label>
                                    Introduction <span>Body text visible on the news module</span>
                                </label>
                                <textarea name="intro" id="newsIntroEditor" rows="10" cols="80">
                                    {{ $news->intro }}
                                </textarea>
                            </div>
                            <div class="formElement">
                                <label>
                                    Main copy <span>Main story content</span>
                                </label>
                                <textarea name="body" id="newsMainEditor" rows="10" cols="80">
                                    {{ $news->body }}
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
                                        <img src="{{ URL::to($news->image) }}" id="currentImage" />
                                        <span>Current Image</span>
                                    </div>

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
                                        <input type="text" name="img_title" value="">
                                    </div>
                                    <div class="formElement">
                                        <label>
                                            Image alternative text <span>Describe the image</span>
                                        </label>
                                        <input type="text" name="img_alt" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="formElement small">
                                <label>
                                    Choose Date <span>Date to be displayed on the news module</span>
                                </label>
                                <input type="text" class="datePicker" name="datetime" value="{{ $news->datetime }}">
                            </div>
                            
                            <div class="formElement">
                                <label>
                                    URL <span>Not sure what this is for</span>
                                </label>
                                <input type="text" name="url" value="{{ $news->url }}">
                            </div>
                            
                            <input type="submit" value="UPLOAD" class="upload">
                            
                        </form>
    
@stop
