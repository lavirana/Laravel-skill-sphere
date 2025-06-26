
@extends('adminlte::page')
@section('title', 'All Users')
@section('content_header')
    <h1>All Users</h1>
@stop
@section('content')


<style>
    svg {
        width: 1.25rem !important; /* 20px */
        height: 1.25rem !important;
    }

    .pagination svg {
        width: 1.25rem !important;
        height: 1.25rem !important;
    }
</style>

<div class="row" >
    <div class="col-md-6">
    <h4 style="margin-top: 8px !important;" >Users</h4>
    </div>
    <div class="col-md-6">
    <a href="#"><button style="    float: right;
    margin-bottom: 8px;
    border-radius: 0px;" class="btn btn-primary" >Add New User</button> </a>  
    </div>
</div>


    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($users))
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id; }}</td>
                    <td>{{ ucfirst($user->name); }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>{{ optional($user->created_at)->format('Y-m-d') }}</td>
                    <td>
                    <a href={{"user/edit/$user->id"}}><button class="btn btn-sm btn-primary">Edit</button></a>
                        <button class="btn btn-sm btn-danger">Delete</button>
                        <a href=""><button class="btn btn-sm btn-info">View</button></a>
        
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No User found.</td>
                </tr>
                @endisset
        </tbody>
    </table>






@stop


