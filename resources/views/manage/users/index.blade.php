{{-- \resources\views\users\index.blade.php --}}
@extends('manage.main')

@section('title', '| Users')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10">
                 <h4><i class="fa fa-users"></i> User Administration</h4>
            </div>
            <div class="col-xs-2">
                <a href="{{ route('users.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create User</a>
            </div>
            
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped ">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d F, Y') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(', ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                        <form class="delete" action="{{ route('users.destroy', $user->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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