@extends('admin.master')

<?php $i=1; ?>


@section('content')
    <h1>Users</h1>
    <span class="btn" trigger="createUser">Create new</span>
    <hr />
    @if(count($users)>0)
        <table class="list">
            <tr>
                <th>id</th>
                <th>Email</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        @foreach($users as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->name}}</td>
                <td>
                    @if($u->active)
                    <b>Active</b>&nbsp;
                    <span class="btn" user="{{$u->id}}" trigger="toggleActive">Deactivate</span>
                    @else
                    <b>Inactive</b>&nbsp;
                    <span class="btn" user="{{$u->id}}" trigger="toggleActive">Activate</span>
                    @endif
                </td>
                <td>
                    <span class="btn" trigger="editUser" userid="{{$u->id}}">Edit</span>
                    <span class="btn" trigger="removeUser" userid="{{$u->id}}">Remove</span>
                </td>
            </tr>
        @endforeach
        </table>
    @else
    <i>No Users created</i>
    @endif
@stop
