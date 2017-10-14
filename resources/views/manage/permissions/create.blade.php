{{-- \resources\views\permissions\create.blade.php --}}
@extends('manage.main')

@section('title', '| Create Permission')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10">
                <h4><i class='fa fa-key'></i>Add Permission</h4>
            </div>
            <div class="col-xs-2">
                <a href="{{route('permissions.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
    </div>
    <div class='panel-body'>
        {!! Form::open(array('route' => 'permissions.store')) !!}
        <div class="form-group">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>
        @if(!$roles->isEmpty()) {{-- //If no roles exist yet --}}
        <label>Assign Permission to Roles:</label><br>

        @foreach ($roles as $role) 
        {{ Form::checkbox('roles[]',  $role->id ) }}
        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
        @endif
        <br>
         {{ Form::button('<i class="fa fa-check"></i> Save',['type' => 'submit', 'class' => 'btn btn-success'] )  }}

        {{ Form::close() }}

    </div>
</div>


@endsection