<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Page</title>
  @vite('resources/css/app.css')
</head>
<body>

  <div class="min-h-screen bg-[#202433] text-white grid grid-cols-2">

    <div>
      <p>left</p>
    </div>

    <div class="p-[140px]">
      <h3 class="text-[32px] mb-2.5">Login</h3>
      <p class="text-white/60 mb-[30px]">You can login with your registered account or quick login with your Google account.</p>

      <form action="">
        <div class="flex flex-col gap-2.5">
          <label class="text-base font-semibold" for="username">Name</label>
          <input id="username" class="bg-[#33394F] rounded-sm px-10 py-[23px] text-white" type="text" placeholder="Enter username...">
        </div>

        <div class="flex flex-col gap-2.5 mt-8">
          <label class="text-base font-semibold" for="password">Password</label>
          <input id="password" class="bg-[#33394F] rounded-sm px-10 py-[23px] text-white" type="password" placeholder="Enter password...">
        </div>

        <div class="mt-8 flex gap-[15px]">
          <input type="checkbox" name="rembemerme" id="">
          <p class="font-semibold">Remember me</p>
        </div>

        <button class="mt-8 rounded-sm w-full cursor-pointer px-10 py-[23px] text-[#202433] font-semibold bg-[#DADADA]" type="submit">
          Login
        </button>

        <p class="mt-[55px] font-semibold text-white/60 text-center">
          Don’t have an account? <a href="/register" class="text-[#FC728B]">Create one!</a>
        </p>

      </form>
    </div>
  </div>
  
</body>
</html>