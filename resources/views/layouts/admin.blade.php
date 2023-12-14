<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Name - @yield('title')</title>
    @vite('resources/css/app.css')

</head>
<body>
<nav class="font-abc">
   <div class="grid grid-cols-3 ml-10 ">
            <div>
                <a href="/"><img class="w-40 h-20" src="{{ asset('Image/logo1.png') }}" alt=""></a>

            </div>
          <div class="flex justify-center items-center">
           <ul class="flex md:gap-20 mt-5 text-sm">
            <li><a href="">All mentees</a></li>
            <li><a href="/listofmentors">All mentors</a></li>
           
           </ul>
          </div>
          <div class="flex gap-5 justify-end items-center mr-10">
          <p>{{auth()->user()->name}}</p>
            <p class="text-sm font-semibold text-turtle-green"><a href="/logout">logout</a></p>
          </div>
          <div>

          </div>
    </div>
</nav>
    <div class="container font-abc">
        @yield('content')
    </div>
</body>
</html>