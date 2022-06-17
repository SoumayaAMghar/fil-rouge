<?php

if (isset($_POST['find'])) {
  $data = new DiseasesController();
  $diseases = $data->findDiseases();
} else {
  $data = new DiseasesController();
  $diseases = $data->getAlldiseases();
}

$data = new PatientsController();
$patient = $data->getOnePatient($_SESSION['id_patient']);
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
    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden">
    </div>
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

          <div class="relative mx-4 lg:mx-0">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
              <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                </path>
              </svg>
            </span>

            <form method="post" data-netlify="true"> 
              <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600" type="text" name="search" placeholder="Search">
              <button class="btn btn-info btn-sm" name="find" type="submit"></button>
            </form>

          </div>
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
          <h3 class="text-gray-700 text-3xl font-medium">Medical History</h3>
          <div class="flex flex-col mt-8">
            <form method="post" action="adddisease">
              <button name="patient"><i class="fas fa-plus text-white mb-4 bg-indigo-600 rounded p-2 mt-2"> </i></button>
            </form>
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              <div class="align-middle inline-block min-w-full  overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                  <thead class="bg-blue-400">
                    <tr>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Date
                      </th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Doctor
                      </th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Disease</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Status</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Action</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <?php foreach ($diseases as $disease) : ?>
                      <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $disease['date']; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $disease['doctor_name']; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $disease['disease']; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  <?= $disease['status'] == 'Active' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' ?>">
                            <?php echo $disease['status']; ?></span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <?php if($_SESSION['id'] == $disease['id_doctor']) :?>
                          <div class="flex space-between">
                              <form method="post" class="mr-1" action="updateDisease" data-netlify="true">
                                <input type="hidden" name="id" value="<?php echo $disease['id']; ?>">
                                <button class="text-emerald-400"><i class="fa fa-edit"></i></button>
                              </form>
                              <form method="post" class="mr-1" action="deletedisease" onsubmit=" return deleteRow(this)">
                              <input type="hidden" name="id" value="<?php echo $disease['id']; ?>">
                              <button type="submit" class="text-red-700"><i class="fa fa-trash"></i></button>
                            </form>
                            </div>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
 function deleteRow(form) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Attachement!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
      return false;
  }
</script>
