<?php
if (isset($_POST['submit'])) {
    $newPatient = new PatientsController();
    $newPatient->addPatient();
}

?>


<div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"></path>
                    </svg>

                    <span class="text-white text-2xl mx-2 font-semibold">DMI</span>
                </div>
            </div>

            <nav class="mt-10">
                <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="<?php echo BASE_URL; ?>homeuser">
                    <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path>
                    </svg>
                    <span class="mx-3">Patients</span>
                </a>

                <!-- <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/ui-elements">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
            </path>
          </svg>

          <span class="mx-3">UI Elements</span>
        </a> -->

                <!-- <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/tables">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
            </path>
          </svg>

          <span class="mx-3">Tables</span>
        </a>

        <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
            </path>
          </svg>

          <span class="mx-3">Forms</span>
        </a> -->
            </nav>
        </div>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-end items-center py-4 px-6 bg-gray-900 ">
                <!-- <div class="flex justify-end"> -->
                <a href="<?php echo BASE_URL; ?>logout" title="Déconnexion" class="mr-2 mb-2 text-white">
                    <i class="fa fa-power-off"></i> Logout
                </a>
                <!-- </div> -->
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-900">
                <div class="container mx-auto px-6 py-8">
                    <div class="flex flex-col mt-12 mr-12">
                        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">

                            <!-- <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"> -->

                            <div class="flex justify-center items-center w-full ">
                                <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
                                    <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">ADD Patient</h1>
                                    <form method="post">
                                        <div class="flex flex-col mb-4">
                                            <label class="mb-2 font-bold text-lg text-gray-900" for="firstname">First Name</label>
                                            <input class="border py-2 px-3 text-grey-800" type="text" name="firstname" id="firstname">
                                            
                                        </div>
                                        <div class="flex flex-col mb-4">
                                            <label class="mb-2 font-bold text-lg text-gray-900" for="lastname">Last Name</label>
                                            <input class="border py-2 px-3 text-grey-800" type="text" name="lastname" id="lastname" >
                                        </div>
                                        <div class="flex flex-col mb-4">
                                            <label class="mb-2 font-bold text-lg text-gray-900" for="cin">CIN</label>
                                            <input class="border py-2 px-3 text-grey-800" type="text" name="cin" id="cin" >
                                        </div>
                                        <div class="flex flex-col mb-4">
                                            <label class="mb-2 font-bold text-lg text-gray-900" for="phone">Phone</label>
                                            <input class="border py-2 text-grey-800" type="text" name="phone" id="phone" >
                                        </div>
                                        <div class="flex flex-col mb-4">
                                            <label class="mb-2 font-bold text-lg text-gray-900" for="birthday">Birthday</label>
                                            <input class="border py-2 px-3 text-grey-800" type="date" name="birthday" id="birthday" >
                                        </div>
                                        <div class="flex flex-col mb-4">
                                            <label class="mb-2 font-bold text-lg text-gray-900" for="blood_group">Blood_group</label>
                                            <input class="border py-2 text-grey-800" type="text" name="blood_group" id="blood_group" >
                                        </div>
                                        
                                        <div class="pt-4 flex items-center justify-center">
                                            <a class="flex justify-center items-center w-40 text-gray-900 px-4 py-3 rounded-md focus:outline-none" href="<?php echo BASE_URL; ?>homeuser">
                                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg> Cancel
                                            </a>
                                            <button type="submit" name="submit" class="bg-indigo-500 w-40 text-white px-4 py-3 rounded-md focus:outline-none">SAVE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </main>


        </div>
    </div>
</div>