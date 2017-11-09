@foreach($students as $student)
<label><input type="checkbox" value="{{$student->email}}"> {{$student->name}} </label><br>
@endforeach		