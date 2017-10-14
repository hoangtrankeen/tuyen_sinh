{{-- \resources\views\permissions\index.blade.php --}}
@extends('manage.main')

@section('title', '| Permissions')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10">
                <h4><i class="fa fa-key"></i>Available Permissions</h4>
            </div>
            <div class="col-xs-2">
               <a href="{{route('permissions.create')}}" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add Permission</a>
           </div>
       </div>

   </div>
   <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>

                        <form class="delete" action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
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