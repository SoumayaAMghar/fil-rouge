<?php
if(isset($_POST['submit'])){
    $newPatient= new PatientsController();
    $newPatient->addPatient();
}   

?>


<div class="flex justify-center items-center w-full bg-white-400">
    <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
        <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Add a Patient</h1>
        <form method="post">
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="firstname">First Name</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="firstname" id="firstname">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="lastname">Last Name</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="lastname" id="lastname">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="birthday">birthday</label>
                <input class="border py-2 px-3 text-grey-800" type="date" name="birthday" id="birthday">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="cin">CIN</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="cin" id="cin">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="phone">Phone</label>
                <input class="border py-2 text-grey-800" type="text" name="phone" id="phone">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="blood_group">Blood_group</label>
                <input class="border py-2 text-grey-800" type="text" name="blood_group" id="blood_group">
            </div>
            <button class="block bg-green-400 hover:bg-green-600 text-white uppercase text-lg mx-auto p-4 rounded" type="submit" name="submit">Save</button>
        </form>
    </div>
</div>