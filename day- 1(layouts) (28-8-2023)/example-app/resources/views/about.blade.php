{{-- <h1>About Page</h1> --}}



{{-- <a href="/">Home</a>
<a href="/post">Post</a>
<a href="/firstpost">First post page</a> --}}



{{-- tutorial 9  --}}

{{-- @include('pages.header')
            <article>
                <h1>About Page</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti provident enim facere. Quasi minus iure provident vero voluptate quod consequuntur sequi consectetur. Assumenda possimus voluptatem pariatur nam, deserunt distinctio molestias.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis sequi maiores quasi laboriosam delectus eveniet facilis fugit perspiciatis dolore. Culpa maxime veniam neque quibusdam praesentium, minus hic dolorum. Temporibus, aliquid.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut fugiat iste ipsum saepe ab exercitationem perspiciatis. Delectus ipsam dolor nesciunt quam et voluptas, voluptates quos expedita voluptatem. Temporibus, ratione unde.
                </p>
            </article>
            @include('pages.sidebar'); 
            @include('pages.footer'); --}}


{{-- Tutorail 10 --}}
@extends('layouts.masterlayout');
@section('content')
<h1>About Page</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit libero quidem maiores corporis harum, ut consequuntur, iusto placeat itaque perferendis molestiae suscipit temporibus officia quasi quibusdam sequi labore, dolor eligendi.
</p>
@endsection

{{-- //Necha wala section nhi chlaga qn ka ek page man ek section he chlaga wo shuru wala he chlaga  --}}

{{-- @section('content')
<h1>About Page</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit libero quidem maiores corporis harum, ut consequuntur, iusto placeat itaque perferendis molestiae suscipit temporibus officia quasi quibusdam sequi labore, dolor eligendi.
</p>
@endsection --}}





{{-- 
{{-- @section('title')
About Page
@endsection --}}