{{-- \resources\views\users\create.blade.php --}}
@extends('manage.main')

@section('title', '| Add User')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10">
                <h4><i class='fa fa-user-plus'></i>Add User</h4>
            </div>
            <div class="col-xs-2">
                <a href="{{route('users.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
    </div>
    <div class='panel-body'>
        {!! Form::open(array('route' => 'users.store')) !!}

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', '', array('class' => 'form-control')) }}
        </div>

        <div class='form-group'>
            <label>Give Role:</label><br>
            @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:') }}<br>
            {{ Form::password('password', array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{ Form::label('password', 'Confirm Password:') }}<br>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

        </div>

        {{ Form::button('<i class="fa fa-check"></i> Save',['type' => 'submit', 'class' => 'btn btn-success'] )  }}


        {{ Form::close() }}

    </div>
</div>


@endsection