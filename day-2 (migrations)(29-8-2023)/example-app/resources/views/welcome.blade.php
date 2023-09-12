@extends('layouts.masterlayout');

@section('content')
<h1>Home Page</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit libero quidem maiores corporis harum, ut consequuntur, iusto placeat itaque perferendis molestiae suscipit temporibus officia quasi quibusdam sequi labore, dolor eligendi.
</p>
@endsection

@section('title')
    Home
@endsection

@push('scripts') // mastelaout man stack ka name scripts han
    <script src="./jquery.js"></script>
    <script src="./bootstrap.js"></script>
    <script src="./example.js"></script>
@endpush

{{--
@push('scripts') // masterlayout man stack ka name scripts han
    <script src="./vue.js"></script>
@endpush --}}


{{-- we can insert push multiple times but seection man ese nhi hota ha yahi difference ha section aad push man --}}

@push('style')
<link rel="stylesheet" href="css/bootstrap.css">
@endpush


{{-- //upper style sa pehla neecha wali css add kraga apprend --}}
{{-- @prepend('style')
    <style>
        #wrapper{
            background: tan;
        }
    </style>
@endprepend --}}


{{-- //12 Tutorial --}}
{{-- <h1>Home Page</h1> --}}
