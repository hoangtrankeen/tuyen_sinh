@extends('manage.main')

@section('title', '| Edit Permission')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10">
                <h4><i class='fa fa-key'></i> Edit {{$permission->name}}</h4>
            </div>
            <div class="col-xs-2">
                <a href="{{route('permissions.index')}}" type="button" class="btn btn-default pull-right"><i class="fa fa-caret-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
    </div>
    <div class='panel-body'>
        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

        <div class="form-group">
            {{ Form::label('name', 'Permission Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        {{ Form::button('<i class="fa fa-check"></i> Update',['type' => 'submit', 'class' => 'btn btn-success'] )  }}

        {{ Form::close() }}

    </div>
</div>



@endsection