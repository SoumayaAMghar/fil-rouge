<?php
if(isset($_POST['patient_id'])){
  $patient_id = $_POST['patient_id'];
}
if (isset($_POST['id']) && !isset($_POST['submit'])) {
  $existDisease = new DiseasesController();
  $Disease = $existDisease->getOneDisease();
 
}

if (isset($_POST['submit'])) {
  $existDisease = new DiseasesController();
  $existDisease->updateDisease();
}
?>

<div>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

  <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

    <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
      <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
          <a href="<?= BASE_URL ?>homeuser">
            <span class="text-white text-2xl mx-2 font-semibold">DM<span class="text-blue-700">I</span></span>
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
        <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="<?php echo BASE_URL; ?>displayPatient">
          <i class=" text-whit fas fa-info-circle"></i>
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

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Products</a>
              <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
            </div>
          </div>
        </div>
      </header>
      <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-8">


          <div class="flex justify-center items-center w-full ">
            <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
              <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Edit a Disease</h1>
              <form method="post">
                <div class="flex flex-col mb-4">
                  <label class="mb-2 font-bold text-lg text-gray-900" for="date">Date</label>
                  <input class="border py-2 px-3 text-grey-800" type="date" name="date" id="date" value="<?php echo $Disease->date; ?>" required>
                  <input type="hidden" name="id" value="<?php echo $Disease->id; ?>">
                </div>
                <div class="flex flex-col mb-4">
                  <label class="mb-2 font-bold text-lg text-gray-900" for="disease">Disease</label>
                  <input class="border py-2 px-3 text-grey-800" type="text" name="disease" id="disease" value="<?php echo $Disease->disease; ?>" required>
                </div>
                <div class="flex flex-col mb-4">
                  <label class="mb-2 font-bold text-lg text-gray-900" for="status">status</label>
                  <!-- <input class="border py-2 px-3 text-grey-800" type="text" name="status" id="status" value="<?php echo $Disease->status; ?>"> -->
                  <select class="border py-2 px-3 text-grey-800" name="status" required>
                    <option class="bg-red-400 rounded p-2" value="<?php echo $Disease->status = 'Active'; ?>">Active</option>
                    <option class="bg-green-400 rounded p-2" value="<?php echo $Disease->status = 'Inactive'; ?>">Inactive</option>
                  </select>
                </div>
                <div class="pt-4 flex items-center justify-center">
                  <a class="flex justify-center items-center w-40 text-gray-900 px-4 py-3 rounded-md focus:outline-none" href="<?php echo BASE_URL; ?>displayDisease">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg> Cancel
                  </a>
                  <button type="submit" name="submit" class="bg-indigo-500 w-40 text-white px-4 py-3 rounded-md focus:outline-none">SAVE</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>
</div>