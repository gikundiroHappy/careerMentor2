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

<div class="font-abc grid grid-cols-3 space-y-10">
    <div class="col-span-1 flex justify-center items-center pl-20">
      <div class="space-y-6">
    <h2 class="text-turtle-green font-semibold text-xl">Welcome! Tell Us Your Story 🌟</h2>
    <p class="text-sm leading-7">We believe in the power of mentorship and connection. We're eager to get to know you 
      better! Share what you're passionate about, your interests, and anything else you'd 
      like to tell us.</p></div>
    </div>
    <div class="col-span-2 flex justify-center items-center">

 

    <form method="POST" action="" class="space-y-9 mr-40 ml-40 bg-red-00 border border-turtle-green p-10 rounded-tl-[60px] rounded-br-[60px] text-sm">
    <div class="mt-5">
    @if($errors->any())
 <div class="space-y-3 pl-[10px] pb-10">
   @foreach($errors->all() as $error)
   <div class="text-red-400 ">{{$error}}</div>
    @endforeach
 </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success text-green-500">{{session('success')}}</div>
    @endif
</div>
    @csrf
                 <input type="text" name="mentee_name" id="mentor_name" placeholder="Enter your name" 
                 class="shadow-sm w-[500px] pl-4 py-2 border border-turtle-green rounded-md mt-3 "><br/>

                   <textarea name="description" id="" cols="30" rows="10"  class="shadow-sm w-[500px] pl-4 py-2 h-[150px] border border-turle-green rounded-md mt-3 mb-6">Description</textarea><br>

                    <button type="submit" class="bg-turtle-green text-white font-semibold border border-white py-3 px-8 rounded-full mt-3 mb-6">MENTOR ME</button>
    </form>
  </div>
</div>