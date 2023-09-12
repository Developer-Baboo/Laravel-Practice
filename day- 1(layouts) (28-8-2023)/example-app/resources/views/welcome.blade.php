{{-- <h1>Home First Page</h1> --}}


{{-- <a href="/post">Post Page</a>
<a href="/about">About Page</a>
<a href="/firstpost">First post Page</a> --}}




{{-- <a href="/about">About</a> --}}
{{-- <a href="{{ route ('mypost')}}">Post</a> --}}







{{-- Blade Template 1 vidoe number 8 --}}

{{-- {{5+5}} --}}

{{-- <br> <1br> --}}

{{-- this is comment --}}

{{-- {{"Hello World"}} --}}

{{-- {{"<h1>Hello World</h1>"}} --}} 
{{-- upper wala as it is print hoga --}}

{{-- {!!"<h1>Hello World</h1>"!!} --}}

{{-- {!!"<script>alert('babo kumar')</script>"!!}--}}

{{-- @php
        $user = "baboo";
    @endphp 
--}}
{{-- upper ki trh nhi likhega qn ka view man sare values dynmaically ate han routes sa ya controler sa --}}
{{-- {{$user}} --}}



{{-- @php
    $names = ["Salman Khan", "John Abraham", "Shahid Kapoor"]
    $user = "baboo";
    @endphp

<ul>
    @foreach ($names as $n)
        <li>{{$n}}</li>
    @endforeach
</ul> --}}

{{-- @{{$user}} as it print hoga --}}



{{-- Blade LOOp Variable for @ Each  --}}

{{-- @php
    $names = ["Salman Khan", "John Abraham", "Shahid Kapoor"]
    // $user = "baboo";
@endphp

<ul>
    @foreach ($names as $n)
        <li>{{$loop->index}}-{{$n}}</li>
        <li>{{$loop->count}}-{{$n}}</li>
    @endforeach
</ul> --}}


{{-- @php
    $names = ["Salman Khan", "John Abraham", "Shahid Kapoor"]
    // $user = "baboo";
@endphp

<ul>
    @foreach ($names as $n)
    @if ($loop->first)
        <li style="color:red" >{{$n}}</li>
    @elseif ($loop->last)
        <li style="color:green" >{{$n}}</li>
    @endif
    @endforeach
</ul> --}}





{{-- tutorial 9 Blade Template --}}


@php
    // $fruits = ["Apple", "Banana", "Orange", "Grapes"];
    // $fruits = ["one"=>"Apple", "two"=> "Banana", "three"=> "Orange", "four"=> "Grapes"];
    // $fruits = [];
    // $boolean = true;
    // $value = "Hello";
    // $value = "";
@endphp

{{-- @include('pages.header',['names' => $fruits]);
<h1>Home Page</h1>
@include('pages.footer'); --}}

{{-- @include('pages.header', ['name'=>'Yahoo Baba']) --}}



{{-- @includeIf('pages.footer'); agr page exist krta hoga to include kraga otherwise error nhi daga --}}

{{-- @includeWhen(false,'pages.header',['names' => $fruits]);
@includeUnless($boolean, 'pages.header', ['names' => $fruits]); --}}

{{-- @includeWhen(empty($value),'pages.footer',['names' => $fruits]); --}}


    {{-- @include('pages.header')
            <article>
                <h1>Home Page</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti provident enim facere. Quasi minus iure provident vero voluptate quod consequuntur sequi consectetur. Assumenda possimus voluptatem pariatur nam, deserunt distinctio molestias.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis sequi maiores quasi laboriosam delectus eveniet facilis fugit perspiciatis dolore. Culpa maxime veniam neque quibusdam praesentium, minus hic dolorum. Temporibus, aliquid.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut fugiat iste ipsum saepe ab exercitationem perspiciatis. Delectus ipsam dolor nesciunt quam et voluptas, voluptates quos expedita voluptatem. Temporibus, ratione unde.
                </p>
            </article>
        @include('pages.sidebar'); 
        @include('pages.footer'); --}}




{{-- //tutorial 10 template inheritance --}}
@extends('layouts.masterlayout');
@section('content')
<h1>Home Page</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit libero quidem maiores corporis harum, ut consequuntur, iusto placeat itaque perferendis molestiae suscipit temporibus officia quasi quibusdam sequi labore, dolor eligendi.
</p>
@endsection

@section('title')
Home Page
@endsection





