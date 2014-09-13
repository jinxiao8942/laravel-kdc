<div class="userForm">
    <h1>Edit User #{{$user->id}} ({{$user->email}})</h1>
    <div class="formElement">
        <label>
            E-Mail <span>Will be used as username, required</span>
        </label>
        <input type="text" name="email" id="newUserEmail" value="{{$user->email}}">
    </div>
    <div class="formElement">
        <label>
            Password <span>six chars minimum, leave empty to keep the same pass</span>
        </label>
        <input type="password" name="password" id="newUserPassword">
    </div>
    <div class="formElement">
        <label>
            Name<span>To be identified on the network, minimun three chars, required</span>
        </label>
        <input type="text" name="name" id="newUserName" value="{{$user->name}}">
    </div>
    <input type="hidden" name="userid" id="userid" value="{{$user->id}}">
    <span class="btn" onClick="doUpdateUser()">Update</span>
</div>
