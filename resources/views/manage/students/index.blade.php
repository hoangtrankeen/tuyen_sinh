@extends('manage/main')

@section('title','| Manage Students')


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
  <table class="table table-striped table-bordered">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Created At</th>
      <th>Modifed At</th>
      <th>Actions</th>
    </tr>
    @php $stt=1 @endphp
    @foreach ($students as $student)
    <tr>
      <td>{{$stt++}}</td>
      <td><a href="{{route('students.edit',$student->id)}}">{{$student->name}}</a></td>
      <td>{{$student->email}}</td>
      <td>{{$student->created_at->format('j/m/Y ') }}<br>{{ $student->created_at->format('H:i a ') }}</td>
      <td>{{$student->updated_at->format('j/m/Y ') }}<br>{{ $student->updated_at->format('H:i a ') }}</td>
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
    return confirm("Do you want to delete this student?");
  }
  
</script>
@stop