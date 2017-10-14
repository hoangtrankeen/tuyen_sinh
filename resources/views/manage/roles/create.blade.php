@extends('manage.main')

@section('title', '| Add Role')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10">
                <h4><i class='fa fa-key'></i>Add Role</h4>
            </div>
            <div class="col-xs-2">
                <a href="{{route('roles.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
    </div>
    <div class='panel-body'>
        {{-- @include ('errors.list') --}}

        {!! Form::open(array('route' => 'roles.store')) !!}

        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class='form-group'>
            <label>Assign Permissions:</label><br>
            @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

            @endforeach
        </div>

        {{ Form::button('<i class="fa fa-check"></i> Save',['type' => 'submit', 'class' => 'btn btn-success'] )  }}

        {{ Form::close() }}

    </div>
</div>


@endsection