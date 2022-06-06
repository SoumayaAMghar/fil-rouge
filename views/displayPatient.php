<?php

if (isset($_POST['id'])) {

    $data = new PatientsController();
    $patient = $data->getOnePatient();
    $_SESSION['id_patient'] = $_POST['id'];
}
?>
<style>
    .bg-gradient-cover {
        background-color: transparent;
        background-image: linear-gradient(transparent, rgba(0, 0, 0, 0.92));
        background-position-y: -1px;
    }

    .max-h-98 {
        max-height: 24.3rem;
    }

    .box-one>article:nth-child(1) {
        padding-top: 0;
        padding-bottom: 0.125rem;
        padding-right: 0.125rem;
    }

    .box-one>article:nth-child(2) {
        padding-top: 0;
        padding-bottom: 0.125rem;
        padding-left: 0.125rem;
    }

    .box-one>article:nth-child(3) {
        padding-top: 0.125rem;
        padding-bottom: 0.125rem;
        padding-right: 0.125rem;
    }

    .box-one>article:nth-child(4) {
        padding-top: 0.125rem;
        padding-bottom: 0.125rem;
        padding-left: 0.125rem;
    }
</style>



<div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <a href="<?= BASE_URL ?>homeuser">
                        <span class="text-white text-2xl mx-2 font-semibold">DM<span class="text-indigo-600">I</span></span>
                    </a>
                </div>
            </div>

            <nav class="mt-10">
                <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="<?php echo BASE_URL; ?>homeuser">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <span class="mx-3">Dashboard</span>
                </a>
                <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="<?= BASE_URL ?>addPatient">
                    <i class=" text-whit fa fa-plus"></i>
                    <span class="mx-3">Add Patient</span>
                </a>
                <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100"  href="<?php echo BASE_URL; ?>displayPatient">
                    <i class="fas fa-info-circle"></i>
                    <span class="mx-3">Patient's Informations</span>
                </a>
            </nav>
        </div>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <a href="<?php echo BASE_URL; ?>logout" title="Déconnexion" class="mr-2 mb-2 text-black">
                            <i class="fa fa-power-off"></i> Logout
                        </a>
                    </div>
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <div class="flex flex-col mt-8">
                        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div class="align-middle inline-block min-w-full  overflow-hidden sm:rounded-lg border-b border-gray-200">
                                <div class="bg-gray-200 py-6 mb-12 ">
                                    <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                                        <!-- big grid 1 -->
                                        <div class="flex flex-row flex-wrap ">
                                            <!--Start left cover-->
                                            <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1">
                                                <div class="relative hover-img max-h-96 overflow-hidden rounded-md m-2">
                                                    <a href="<?php echo BASE_URL; ?>displayDisease">
                                                        <img class="max-w-full w-full mx-auto h-auto" src="https://i-sam.unimedias.fr/2022/02/02/dossiermedical.jpg" alt="Image description">

                                                        <div class="absolute px-5  pb-5 bottom-0 w-full bg-gradient-cover">
                                                            <div class="flex space-x-6">
                                                                <h2 class="text-3xl font-bold capitalize text-white mb-3">Medical History</h2>
                                                                <!-- <p><i class="fas fa-plus mt-4"></i></p> -->
                                                            </div>
                                                            <p class="text-gray-100 hidden sm:inline-block"></p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--Start box news-->
                                            <div class="flex-shrink max-w-full w-full lg:w-1/2 ">
                                                <div class="box-one flex flex-row flex-wrap ">
                                                    <section class="flex-shrink max-w-full w-full sm:w-1/2">
                                                        <div class="relative hover-img max-h-48 overflow-hidden rounded-md m-2">
                                                            <a href="<?php echo BASE_URL; ?>displayAttachement">
                                                                <img class="max-w-full w-full mx-auto h-48" src="https://media.istockphoto.com/photos/medical-record-picture-id1202959518?k=20&m=1202959518&s=612x612&w=0&h=qoRuwJM6jfQkgmVBDpkEJPEwnp74tAUqQTawfYySNKs=" alt="Image description">
                                                                <div class="absolute px-4 pt-2 pb-0 bottom-0 w-full bg-gradient-cover">
                                                                    <h2 class="text-lg font-bold capitalize leading-tight text-white mb-4">Attachements</h2>
                                                            </a>
                                                            <div class="pt-1">
                                                                <div class="text-gray-100">
                                                                    <!-- <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>Interior -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- </div> -->
                                                    </section>
                                                    <section class="flex-shrink max-w-full w-full sm:w-1/2">
                                                        <div class="relative hover-img max-h-48 overflow-hidden rounded-md m-2">
                                                            <a href="<?php echo BASE_URL; ?>displayAllergies">
                                                                <img class="max-w-full w-full mx-auto h-auto" src="https://cdn.the-scientist.com/assets/articleNo/68059/aImg/40018/vaccine-article-l.png" alt="Image description">
                                                                <div class="absolute px-4 pt-2 pb-2 bottom-0 w-full bg-gradient-cover">
                                                                    <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">Allergies</h2>
                                                            </a>
                                                            <div class="pt-1">
                                                                <div class="text-gray-100">

                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                </section>
                                                <section class="flex-shrink max-w-full w-full sm:w-1/2">
                                                    <div class="relative hover-img max-h-56 overflow-hidden rounded-md m-2">
                                                        <a href="<?= BASE_URL ?>displayBiometry">
                                                            <img class="max-w-full w-full mx-auto h-auto" src="https://www.inria.fr/sites/default/files/2021-06/A_MedecinePersonnalisee_Vidium_AdobeStock_103537025.jpg" alt="Image description">

                                                            <div class="absolute px-4 pt-2 pb-2 bottom-0 w-full bg-gradient-cover">

                                                                <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">Biometry</h2>
                                                        </a>
                                                        <div class="">
                                                            <div class="text-gray-100">
                                                                <!-- <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>Interior -->
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </section>
                                            <section class="flex-shrink max-w-full w-full sm:w-1/2">
                                                <div class="relative hover-img max-h-48 overflow-hidden rounded-md m-2">
                                                    <a href="<?= BASE_URL ?>displayVaccine">
                                                        <img class="max-w-full w-full mx-auto h-auto" src="https://u-paris.fr/wp-content/uploads/2021/01/S%C3%A9minaire-vaccination-21.jpg" alt="Image description">

                                                        <div class="absolute px-4 pt-2 pb-2 bottom-0 w-full bg-gradient-cover">

                                                            <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">Vaccination</h2>
                                                    </a>
                                                    <div class="pt-1">
                                                        <div class="text-gray-100">
                                                            <!-- <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>Lifestyle -->
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




        </div>
    </div>
</div>
</div>
</main>
</div>
</div>
</div>