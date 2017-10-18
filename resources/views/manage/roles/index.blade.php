@extends('manage.main')

@section('title', '| Roles')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-sm-10">
                 <h4><i class="fa fa-key"></i> Roles</h4>
            </div>
            <div class="col-sm-2">
                <a href="{{route('roles.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Role</a>
            </div>
        </div>
    </div>
    <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Operation</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $stt = 1 @endphp
                        @foreach ($roles as $role)

                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{ $role->name }}</td>

                            <td>{{  $role->permissions()->pluck('name')->implode(', ') }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                            <td>
                                 <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                                <form class="delete" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                    <button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form> 
                                {!! Form::close() !!}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
  
<script>
    
    function confirmDelete()
    {
        return confirm("Do you want to delete this menu?");
    }
    
    
</script>
@stop