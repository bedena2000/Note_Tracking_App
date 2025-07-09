<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register Page</title>
  @vite('resources/css/app.css')
</head>
<body>

  <div class="min-h-screen bg-[#202433] text-white grid grid-cols-1 lg:grid-cols-2 overflow-hidden">

    <div class="hidden lg:block">
      <img 
      class="w-full h-full object-cover"
      src="{{  Vite::asset('resources/images/authentication_image.png') }}" alt="background_image">
    </div>

    <div class="flex w-full items-center p-[16px] sm:p-[100px]">
      <div class="w-full">
        <h3 class="text-[32px] mb-2.5">Register</h3>
      <p class="text-white/60 mb-[30px]">Enter your user details below.</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="flex flex-col gap-2.5">
          <label class="text-base font-semibold" for="username">Name</label>
          <input id="username" class="bg-[#33394F] rounded-sm px-10 py-[23px] text-white" type="text" placeholder="Enter username..." name="username">
        </div>

        @error('username')
          <p class="mt-4 text-white bg-green-800 rounded-md px-4 font-bold"> {{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-2.5 mt-8">
          <label class="text-base font-semibold" for="email">Email</label>
          <input id="email" class="bg-[#33394F] rounded-sm px-10 py-[23px] text-white" type="email" placeholder="Enter username..." name="email">
        </div>

        @error('email')
          <p class="mt-4 text-white bg-green-800 rounded-md px-4 font-bold">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-2.5 mt-8">
          <label class="text-base font-semibold" for="password">Password</label>
          <input id="password" class="bg-[#33394F] rounded-sm px-10 py-[23px] text-white" type="password" placeholder="Enter password..." name="password">
        </div>

        @error('password')
          <p class="mt-4 text-white bg-green-800 rounded-md px-4 font-bold">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-2.5 mt-8">
          <label class="text-base font-semibold" for="password_confirmation">Confirm Password</label>
          <input id="password_confirmation" class="bg-[#33394F] rounded-sm px-10 py-[23px] text-white" type="password" placeholder="Enter password..." name="password_confirmation">
        </div>

        <button class="mt-8 rounded-sm w-full cursor-pointer px-10 py-[23px] text-[#202433] font-semibold bg-[#DADADA]" type="submit">
          Register
        </button>

        

        <p class="mt-[55px] font-semibold text-white/60 text-center">
          Have an account? <a href="/login" class="text-[#FC728B]">Login!</a>
        </p>

      </form>
      </div>
    </div>
  </div>
  
</body>
</html>