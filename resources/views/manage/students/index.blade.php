@extends('manage/main')


@section('content')

<!-- /.box -->
<div class="panel panel-default">
  <div class="panel-heading ">
   <div class="row">
    <div class="col-xs-10">
      <h4>Students</h4>
    </div>
    <div class="col-xs-2">
      <a href="{{route('students.create')}}" type="button" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New Student</a>
    </div>
  </div>

</div>
<!-- /.box-header -->
<div class="panel-body">
  <table class="table table-striped">
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Email</th>
      <th></th>
      <th>Actions</th>
    </tr>
    @foreach ($students as $student)
    <tr>
      <td>{{$student->id}}</td>
      <td>{{$student->name}}</td>
      <td>{{$student->email}}</td>
      <td>{{-- {{$student->created_at->toFormatedDateString()}} --}}</td>
      <td>

        <a class="btn btn-info btn-sm " href="{{route('students.edit',$student->id)}}"><i class="fa fa-edit"></i> Edit</a>

        <form class="delete" action="{{ route('students.destroy', $student->id) }}" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          {{ csrf_field() }}
          <button type="submit" id="delete" class="btn btn-danger btn-sm"  onclick="return confirmDelete()"><i class="fa fa-trash-o" aria-hidden="true" ></i> Delete</button>
        </form>                    
      </td>
    </tr>

    @endforeach
  </table>
</div>
<!-- /.box-body -->

</div>
<!-- /.box -->
<div class="text-center">{{ $students->links()}}</div>

@stop      


@section('scripts')

<script>
  function confirmDelete()
  {
    return confirm("Do you want to delete this menu?");
  }
  
</script>
@stop