<div class="userForm">
    <h1>Create User</h1>
    <div class="formElement">
        <label>
            E-Mail <span>Will be used as username, required</span>
        </label>
        <input type="text" name="email" id="newUserEmail">
    </div>
    <div class="formElement">
        <label>
            Password <span>six chars minimum, required</span>
        </label>
        <input type="password" name="password" id="newUserPassword">
    </div>
    <div class="formElement">
        <label>
            Name<span>To be identified on the network, minimun three chars, required</span>
        </label>
        <input type="text" name="name" id="newUserName">
    </div>
    <span class="btn" onClick="doCreateUser()">Create</span>
</div>
