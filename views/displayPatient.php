<?php
$data = new DiseasesController();
$diseases = $data->getAlldiseases();

$dat = new AttachementsController();
$attachements = $dat->getAllattachements();
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
            <a class=" flex flex-col  text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-1 " href="#">
                <h1 class="text-xl font-bold">DM<span class="text-blue-700">I</span></h1>
                <p class="text-xs">Computerized medical record</p>
            </a>

        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="flex items-center relative">
            <!-- Icon -->

            <div class="dropdown relative">
                <a class="dropdown-toggle flex items-center hidden-arrow" href="#" id="dropdownMenuButton2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-full" style="height: 25px; width: 25px" alt="" loading="lazy" />
                </a>

            </div>
        </div>
        <!-- Right elements -->
    </div>
</nav>


<div class="bg-white py-6 ">
    <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
        <!-- big grid 1 -->
        <div class="flex flex-row flex-wrap ">
            <!--Start left cover-->
            <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1">
                <div class="relative hover-img max-h-98 overflow-hidden rounded-md m-2">
                    <a href="#">
                        <img class="max-w-full w-full mx-auto h-auto" src="https://i-sam.unimedias.fr/2022/02/02/dossiermedical.jpg" alt="Image description">
                    </a>
                    <div class="absolute px-5  pb-5 bottom-0 w-full bg-gradient-cover">
                        <a href="#">
                            <h2 class="text-3xl font-bold capitalize text-white mb-3">Medical History</h2>
                        </a>
                        <p class="text-gray-100 hidden sm:inline-block"></p>
                        <div class="pt-2">
                            <?php foreach ($diseases as $disease) : ?>
                                <div class="flex flex-row space-x-6 mb-4 text-xl font-bold">
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
            <div class="flex-shrink max-w-full w-full lg:w-1/2">
                <div class="box-one flex flex-row flex-wrap">
                    <section class="flex-shrink max-w-full w-full sm:w-1/2">
                        <div class="relative hover-img max-h-48 overflow-hidden rounded-md m-2">
                            <a href="#">
                                <img class="max-w-full w-full mx-auto h-auto" src="https://media.istockphoto.com/photos/medical-record-picture-id1202959518?k=20&m=1202959518&s=612x612&w=0&h=qoRuwJM6jfQkgmVBDpkEJPEwnp74tAUqQTawfYySNKs=" alt="Image description">
                            </a>
                            <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                <a href="#">
                                    <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">Attachements</h2>
                                </a>
                                <div class="pt-1">
                                    <!-- <div class="text-gray-100"> -->
                                    <?php foreach ($attachements as $attachement) : ?>
                                        <p class="text-gray-100 hidden sm:inline-block"><?php echo $attachement['titre']; ?></p>
                                        <p class="text-gray-100 hidden sm:inline-block"><?php echo $attachement['date']; ?></p>
                                        <p class="text-gray-100 hidden sm:inline-block"><?php echo $attachement['attachement']; ?></p>
                                    <?php endforeach; ?>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="flex-shrink max-w-full w-full sm:w-1/2">
                        <div class="relative hover-img max-h-48 overflow-hidden rounded-md m-2">
                            <a href="#">
                                <img class="max-w-full w-full mx-auto h-auto" src="https://cdn.the-scientist.com/assets/articleNo/68059/aImg/40018/vaccine-article-l.png" alt="Image description">
                            </a>
                            <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                <a href="#">
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
                        <div class="relative hover-img max-h-48 overflow-hidden rounded-md m-2">
                            <a href="#">
                                <img class="max-w-full w-full mx-auto h-auto" src="https://tailnews.tailwindtemplate.net/src/img/dummy/img4.jpg" alt="Image description">
                            </a>
                            <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                <a href="#">
                                    <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">Tips for decorating the interior of the living room</h2>
                                </a>
                                <div class="pt-1">
                                    <div class="text-gray-100">
                                        <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>Interior
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="flex-shrink max-w-full w-full sm:w-1/2">
                        <div class="relative hover-img max-h-48 overflow-hidden rounded-md m-2">
                            <a href="#">
                                <img class="max-w-full w-full mx-auto h-auto" src="https://tailnews.tailwindtemplate.net/src/img/dummy/img5.jpg" alt="Image description">
                            </a>
                            <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                <a href="#">
                                    <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">Online taxi users are increasing drastically ahead of the new year</h2>
                                </a>
                                <div class="pt-1">
                                    <div class="text-gray-100">
                                        <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>Lifestyle
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