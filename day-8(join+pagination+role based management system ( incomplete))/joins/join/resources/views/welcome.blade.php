<h1>Students Data</h1>



@foreach ($students as $value )
    <h1>{{$value->s_id}} || {{$value->student_name}} || {{$value->email}} || {{$value->age}} || {{$value->city_name}}</h1>
@endforeach
