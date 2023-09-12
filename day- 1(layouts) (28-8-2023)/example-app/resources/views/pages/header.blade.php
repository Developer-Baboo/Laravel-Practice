{{-- <h1>Header page</h1> --}}


{{-- value jo hum na welcoem wala page sa send ke ha wo necha show krvha rha han --}}

{{-- <p>{{$name}}</p> --}}




{{-- Blade tutorial 9 below --}}

{{-- @foreach ($names as $item)
   <p>{{$item}}</p> 
@endforeach --}}

{{-- @foreach ($names as $key => $item)
   <p>{{ $key }} - {{ $item }}</p> 
@endforeach --}}

{{-- @forelse ($names as $key => $item)
    <p>{{ $key }} - {{ $item }}</p> 
@empty
    <p>No Value Found In Array </p>
@endforelse --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baboo Kumar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="wrapper" >
        <header>
            <h1>Baboo Kumar</h1>
        </header>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/post">Post</a>
        </nav>
        <main>