{{-- \resources\views\users\edit.blade.php --}}

@extends('manage.main')

@section('title', '| Edit User')

@section('content')

<div class='panel panel-default'>
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10">
                <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit {{$user->name}}</h4>
            </div>
            <div class="col-xs-2">
                 <a href="{{route('users.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, array('class' => 'form-control')) }}
        </div>

        

        <div class='form-group'>
            <label>Give Role:</label><br>
            @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{ Form::label('password', 'Confirm Password:') }}
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

        </div>

        {{ Form::button('<i class="fa fa-check"></i> Update',['type' => 'submit', 'class' => 'btn btn-success'] )  }}

        {{ Form::close() }}
    </div>

</div>

@endsection