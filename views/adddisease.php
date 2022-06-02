<?php
if(isset($_POST['submit'])){
    $newDisease= new DiseasesController();
    $newDisease->addDisease();
}   
if(isset($_POST['patient_id'])){
 $data = new PatientsController();
$patient = $data->getOnePatient();  
$patient_id = $_POST['patient_id']; 
}

?>


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

<div class="min-w-screen min-h-screen bg-violet-400 p-16">
<div class="flex justify-center items-center w-full  ">
    <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
        <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Add Disease</h1>
        <form method="post">
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="date">Date</label>
                <input class="border py-2 px-3 text-grey-800" type="date" name="date" id="date">
                <input class="hidden" type="text" name="id" value="<?= $patient_id ?>">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="disease">Disease</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="disease" id="disease">
            </div>
            <!-- <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="status">Status</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="status" id="status">
            </div> -->
            <div class="flex flex-col mb-4">
            <label class="mb-2 font-bold text-lg text-gray-900" for="status">Status</label>
                <select class="border py-2 px-3 text-grey-800" name="status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <button class="block bg-teal-400 hover:bg-teal-600 text-white uppercase text-lg mx-auto p-4 rounded" type="submit" name="submit">Save</button>
        </form>
    </div>
</div>
</div>