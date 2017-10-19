@extends('manage/main')

@section('title','| Manage Certificate')
@section('content')

<!-- /.box -->
<div class="panel panel-default">
  <div class="panel-heading ">
    <div class="row">
      <div class="col-xs-10">
        <h4>Certificate</h4>
      </div>

      <div class="col-xs-2">
        <a class="btn btn-primary pull-right" href="{{route('certificates.create')}}" ><i class="fa fa-plus" aria-hidden="true"></i> Create New Certificate</a>
      </div>

    </div>
    
  </div> 
  <!-- /.box-header -->
  <div class="panel-body">
    <table class="table table-striped table-bordered">
      <tr>
        <th>id</th>
        <th>Student</th>
        <th>Course</th>
        <th>Created At</th>
        <th>Modifed At</th>
        <th>Actions</th>
      </tr>
      @php $stt = 1 @endphp
      @foreach ($certificates as $certificate)
      <tr>

        <td>{{$stt++}}</td>
        <td><a href="{{route('certificates.edit',$certificate->id)}}">{{$certificate->student->name}}</a></td>
        <td>{{$certificate->course->name}}</td>
        <td>{{$certificate->created_at->format('j/m/Y ') }}<br>{{ $certificate->created_at->format('H:i a ') }}</td>
        <td>{{$certificate->updated_at->format('j/m/Y ') }}<br>{{ $certificate->updated_at->format('H:i a ') }}</td>
       
        <td>
          <a class="btn btn-info btn-sm " href="{{route('certificates.edit',$certificate->id)}}"><i class="fa fa-edit"></i> Edit</a>

          <form class="delete" action="{{ route('certificates.destroy', $certificate->id) }}" method="POST">
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
<div class="text-center">{{ $certificates->links()}}</div>

@stop      

@section('scripts')
  
<script>
    function confirmDelete()
  {
    return confirm("Do you want to delete this certificate?");
  }
</script>
@stop