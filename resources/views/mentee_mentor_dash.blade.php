@vite('resources/css/app.css')
<nav class="font-abc">
   <div class="grid grid-cols-3 ml-10">
            <div>
                <a href="/"><img class="w-40 h-20" src="{{ asset('Image/logo1.png') }}" alt=""></a>

            </div>
          <div class="flex justify-center items-center">
           <ul class="flex md:gap-20 text-sm">
            <li><a href="/menteedashboard"> Home</a></li>
            <li><a href="/mentors"> Mentors</a></li>
           </ul>
          </div>
          <div class="flex gap-5 justify-end items-center pr-20">
          <p>{{auth()->user()->name}}</p>
            <p class="text-sm font-semibold text-turtle-green"><a href="/logout">logout</a></p>
          </div>
    </div>
</nav>

<div class="font-abc ">
    <h1 class="text-turtle-green text-xl font-semibold text-center my-5">List of mentors in Mentee page</h1>
    <div class="flex gap-8 justify-end mr-20">
        <p class="border border-turtle-green text-turtle-green font-bold py-2 px-6 rounded-md">Sort</p>
        <input type="text" placeholder="Search....." class="border border-turtle-green py-2 px-6 rounded-md">
    </div>
    <div class="flex flex-wrap gap-8 p-10 text-sm">
    @foreach($mentors as $mentor)
       <div class=" border border-turtle-green w-[350px] py-10 px-6 space-y-5 rounded-tl-[30px] rounded-br-[30px]">
   
       <div class="grid grid-cols-2">
       @if($mentor->image_path)
    <img src="{{ asset('storage/' . $mentor->image_path) }}" alt="Mentor Image" class=" w-[120px] h-[120px] mb-4 rounded-full">
       @endif

        <h1 class="flex items-center justify-end font-semibold">{{ $mentor->mentor_name }}</h1>
        </div>
        <h2 class="font-bold text-turtle-green text-lg">{{ $mentor->field }}</h2>
        <h3>{{ $mentor->location }}</h3>
        <p class="leading-6">{{ $mentor->description }}</p>
       </div>
         @endforeach

    </div>
</div>
