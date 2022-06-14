<?php

if (isset($_POST['submit'])){
    $loginDoctor = new AdminController();
    $loginDoctor->auth();
} 

?>



<!-- This is an example component -->
<div class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
      <div class="leading-loose">
        <form method="post" class="max-w-md m-4 p-10 bg-black bg-opacity-75 rounded shadow-xl">
            <p class="text-white font-medium text-center text-lg font-bold">LOGIN</p>
              <div class="">
                <label class="block text-md font-regular text-white" for="email">E-mail</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-black" name="email" type="email" id="email"  placeholder="Digite o e-mail" aria-label="email" required>
              </div>
              <div class="mt-2">
                <label class="block  text-md font-regular text-white">Password</label>
                 <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-black"
                  name="password" type="password" id="password" placeholder="Digite a sua senha" arial-label="password" required>
              </div>

              <div class="mt-4 items-center flex justify-center w-full">
                <button class="px-4 py-1 text-white font-bold tracking-wider bg-gray-900 hover:bg-gray-800 rounded"
                name="submit"  type="submit">Login</button>
              </div>
        </form>

      </div>
    </div>
  </div>
</div>
<style>
  .login{
  /*
    background: url('https://tailwindadmin.netlify.app/dist/images/login-new.jpeg');
  */
  background: url('https://nearterm.com/wp-content/uploads/2020/10/Nearterm-Healthcare-Admin-Issues-1024x512.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>