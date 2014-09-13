<div class="formElement" id="msg{{$message->id}}">
    
    @if($position == 5) 
    <hr />
    @endif

    <label>Message {{$position}}</label>
    <button class="btn" style="position:relative;float:right;top:-35px;" relId="{{$message->id}}" trigger="saveHomepageMessage">Save</button>
    @if($position > 4)
    <button class="btn" style="position:relative;float:right;top:-35px;margin-right:5px;" relId="{{$message->id}}" trigger="deleteHomepageMessage">Delete</button>
    @endif
    <input type="text" id="message_{{$message->id}}" value="{{$message->body}}">
</div>
