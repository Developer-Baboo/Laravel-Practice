<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Baboo Kumar @yield('title', 'Website' )</title>
        {{-- upper yield ka second paramenter tb chalte ha jb user section dana bhool jaya  to us ka aga default name website show hoga --}}
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
                <article>
                    {{-- check krka ka user na content ka section bnaya ha ka nhi agr bnaya ha to wo chlaga otherwise else chlaga  --}}
                    @hasSection('content')
                        @yield('content')
                        @else
                            <h1>No Content Found</h1>
                    @endif
                   @yield('content');
                </article>
                <aside>
                    @section('sidebar')
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/post">Post</a></li>
                    </ul>
                    @show
                    {{-- section end nhi ha is ka necha mtlb show ka necha jo likhenga wo bhi show hoga  --}}
                </aside>
            </main>
            <footer>baboo@gmail.com</footer>
        </div>
    </body>
</html>    