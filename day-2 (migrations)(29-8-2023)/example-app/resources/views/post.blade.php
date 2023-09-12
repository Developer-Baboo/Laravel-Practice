@extends('layouts.masterlayout');
@section('content')
<h1>post Page</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit libero quidem maiores corporis harum, ut consequuntur, iusto placeat itaque perferendis molestiae suscipit temporibus officia quasi quibusdam sequi labore, dolor eligendi.
</p>
@endsection

@section('sidebar')
@parent
{{-- this will be taken from master layout above parent   --}}
<p>This is append to the  master sidebar.</p>
@endsection

{{-- @section('title')
Post Page
@endsection --}}