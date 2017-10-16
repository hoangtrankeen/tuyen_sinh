@extends('manage/main')

@section('title','| Manage Courses')
@section('content')

<!-- /.box -->
<div class="panel panel-default">
  <div class="panel-heading ">
    <div class="row">
      <div class="col-xs-10">
        <h4>Courses</h4>
      </div>

      <div class="col-xs-2">
        <a class="btn btn-primary pull-right" href="{{route('courses.create')}}" ><i class="fa fa-plus" aria-hidden="true"></i> Create New Course</a>
      </div>

    </div>
    
  </div>
  <!-- /.box-header -->
  <div class="panel-body">
    <table class="table table-striped">
      <tr>
        <th>id</th>
        <th>Course Name</th>
        <th>Year Course</th>
        <th>Exam Date</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
      @php $stt = 1 @endphp
      @foreach ($courses as $course)
      <tr>
        <td>{{$stt++}}</td>
        <td>{{$course->name}}</td>
        <td>{{$course->year}}</td>
        <td>{{date('d F, Y', strtotime($course->exam_date))}}</td>
        <td>{{$course->created_at->format('d F, Y')}}</td>
        <td>
          <a class="btn btn-info btn-sm " href="{{route('courses.edit',$course->id)}}"><i class="fa fa-edit"></i> Edit</a>

          <form class="delete" action="{{ route('courses.destroy', $course->id) }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <button type="submit" onclick="return confirmDelete()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          </form>  

        </td>
      </tr>

      @endforeach
    </table>
  </div>
  <!-- /.box-body -->

</div>
<!-- /.box -->
<div class="text-center">{{ $courses->links()}}</div>

@stop      

@section('scripts')
  
<script>
    function confirmDelete()
  {
    return confirm("Do you want to delete this menu?");
  }
</script>
@stop