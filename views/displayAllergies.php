<?php

$data = new AllergiesController();
$diseases = $data->getAllallergies();

if (isset($_POST['id_patient'])) {

    $data = new PatientsController();
    $patient = $data->getOnePatient();
    $_SESSION['id_patient'] = $_POST['id_patient'];
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


<nav class="relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light">
    <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
        <button class=" navbar-toggler text-gray-500 border-0 hover:shadow-none hover:no-underline py-2 px-2.5 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline
    " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

        </button>
        <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
            <a class=" flex flex-col  text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-1 " href="<?php echo BASE_URL; ?>homeuser">
                <h1 class="text-xl font-bold">DM<span class="text-blue-700">I</span></h1>
                <p class="text-xs">Computerized medical record</p>
            </a>

        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="flex items-center relative">
            <!-- Icon -->

            <div class="dropdown relative">
                <a class="dropdown-toggle flex items-center hidden-arrow" href="<?php echo BASE_URL; ?>homeuser" id="dropdownMenuButton2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-full" style="height: 25px; width: 25px" alt="" loading="lazy" />
                </a>

            </div>
        </div>
        <!-- Right elements -->
    </div>
</nav>

<div class="min-w-screen min-h-screen pt-12">


    <div class="bg-white py-6 mb-12 ">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <!-- big grid 1 -->
            <div class="flex flex-row flex-wrap ">
                <!--Start left cover-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1">
                    <div class="relative hover-img max-h-screen overflow-hidden rounded-md m-2">
                        <!-- <a href="#"> -->
                        <img class="max-w-full w-full mx-auto h-auto" src="https://i-sam.unimedias.fr/2022/02/02/dossiermedical.jpg" alt="Image description">
                        <!-- </a> -->
                        <div class="absolute px-5  pb-5 bottom-0 w-full bg-gradient-cover">
                            <div class="flex space-x-6">
                                <h2 class="text-3xl font-bold capitalize text-white mb-3">Medical History</h2>
                                <!-- <p><i class="fas fa-plus mt-4"></i></p> -->
                                <form method="post" action="adddisease">
                                    <button name="patient"><i class="fas fa-plus  bg-teal-400 rounded p-2 mt-2"></i></button>
                                </form>
                            </div>
                            <p class="text-gray-100 hidden sm:inline-block"></p>
                            <div class="pt-2 rounded bg-[rgba(0,0,0,0.3)] h-72 overflow-y-scroll ">
                                <?php foreach ($diseases as $disease) : ?>
                                    <div class="flex flex-row space-x-6 mb-4 text-l font-bold pl-3">
                                        <p class="text-gray-100 hidden sm:inline-block"><?php echo $disease['date']; ?></p>
                                        <p class="text-gray-100 hidden sm:inline-block"><?php echo $disease['disease']; ?></p>
                                        <p class="text-gray-100 hidden sm:inline-block <?= $disease['status'] == 'Active' ? 'bg-red-700 px-1 rounded' : 'bg-green-500 px-1 rounded' ?>"><?php echo $disease['status']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Start box news-->
            </div>
        </div>
    </div>
</div>