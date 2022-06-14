<?php

if (isset($_POST['submit'])) {
    $loginDoctor = new DoctorsController();
    $loginDoctor->auth();
}

?>


<body>
    <section class="min-h-screen flex items-stretch text-white lg:text-black ">
        <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center " style="background-image: url(https://images.ctfassets.net/76f8cs5bg9si/69wePzTKPymXWXlQZHxxva/3b957ad3eb91b988a1eb850a67cacf1a/Untitled-design-18-copy.png?w=2560&q=100);">
            <div class="absolute bg-black opacity-50 inset-0 z-0"></div>
           
        </div>
        
        <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0" style="background-color: #edf4ff;">
            <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center" style="background-image: url(https://images.ctfassets.net/76f8cs5bg9si/69wePzTKPymXWXlQZHxxva/3b957ad3eb91b988a1eb850a67cacf1a/Untitled-design-18-copy.png?w=2560&q=100);">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="w-full py-6 z-20">
            <div class="w-full mb-16 px-24 z-10 ">
                <h1 class="text-2xl lg:text-3xl  font-bold text-left tracking-wide text-center ">The Shared Medical Record</h1>
                <p class="text-l lg:text-xl my-4 text-center ">is now available for everyone - Théragora.</p>
            </div>

                <form method="post" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto" data-netlify="true">
                    <div class="pb-2 pt-4">
                        <input  type="text" name="patente" placeholder="Patente" class="block w-full p-4 text-lg rounded-sm bg-white shadow-md">
                    </div>
                    <!-- <div class="pb-2 pt-4">
                        <input type="password" name="password" placeholder="password" class="block w-full p-4 text-lg rounded-sm bg-white shadow-md">
                    </div> -->
                    <div class="relative pb-2 pt-4" x-data="{ input: 'password' }">
                        <input class="block w-full p-4 text-lg rounded-sm bg-white shadow-md" id="password" name="password" type="password" x-bind:type="input">
                        <div class="absolute right-0 top-0 mr-2 mt-3" x-on:click="input = (input === 'password') ? 'text' : 'password'">
                            <span class="body text-show-hide text-gray-600 uppercase cursor-pointer" x-text="input == 'password' ? 'show' : 'hide'">show</span>
                        </div>
                    </div>
                    <div class="px-4 pb-2 pt-4">
                        <button name="submit" class="uppercase  w-40 p-4 text-lg rounded-full bg-indigo-500 hover:bg-indigo-600 focus:outline-none text-white mt-4 font-semibold">sign in</button>
                    </div>
                </form>
                <div class="text-grey-dark mt-6">
                    Don't have an account?
                    <a class="no-underline border-b border-blue text-blue" href="<?php echo BASE_URL ?>register">
                        Register
                    </a>.
                </div>
            </div>
        </div>
    </section>
</body>