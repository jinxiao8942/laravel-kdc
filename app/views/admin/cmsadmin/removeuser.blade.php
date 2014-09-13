<div class="userForm">
    <h1>Delete User</h1>
    <h2>Are you sure you want to delete the user {{$user->name}} ({{$user->email}})</h2>
    <input type="hidden" id="userid" value="{{$user->id}}">
    <span class="btn" onClick="doRemoveUser()">Remove</span>
</div>
