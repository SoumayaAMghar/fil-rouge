<?php

if (isset($_POST['submit'])){
    $loginDoctor = new AdminController();
    $loginDoctor->auth();
} 

?>


<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h3 class="mb-8 text-3xl text-center">Login Admin</h3>
            <form method="post">
                <input type="text" name="email" placeholder="email" class="block border border-grey-light w-full p-3 rounded mb-4">
                <input type="password" name="password" placeholder="password" class="block border border-grey-light w-full p-3 rounded mb-4">
                <div class="flex justify-center ">
                <button name="submit" class="mt-7 w-24 text-center py-3 rounded bg-blue-600 text-black hover:bg-green-dark focus:outline-none my-1">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
