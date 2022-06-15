<?php

if (isset($_POST['find'])) {
  $data = new DoctorsController();
  $doctors = $data->findDoctors();
} else {
  $data = new DoctorsController();
  $doctors = $data->getAlldoctors();
}


if (isset($_POST['accept'])) {
  // echo '<pre>';
  // echo "accept";
  // print_r($_POST);
  // die;
  $doc = new DoctorsController();
  $doc->updateDoctor($_POST["id"], "accepted");
}
if (isset($_POST['reject'])) {
  // echo '<pre>';
  // echo "reject";
  // print_r($_POST);
  // die;
  $doc = new DoctorsController();
  $doc->updateDoctor($_POST["id"], "rejected");
}

$data = new DoctorsController();
$nbrDoctors = $data->getNbrOfDoctors();

$data = new DoctorsController();
$nbrPending = $data->getNbrOfPending();

$data = new DoctorsController();
$nbrAccepted = $data->getNbrOfAccepted();


?>


<div>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden">
    </div>
    <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
      <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
          <a href="<?= BASE_URL ?>homeadmin">
            <span class="text-white text-2xl mx-2 font-semibold">DM<span class="text-indigo-600">I</span></span>
          </a>
        </div>
      </div>
      <nav class="mt-10">
        <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="<?php echo BASE_URL; ?>homeadmin">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
          </svg>
          <!-- <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path>
          </svg> -->
          <span class="mx-3">Dashboard</span>
        </a>

        <a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100" href="<?= BASE_URL ?>showdoctors">

          <svg class="fill-current h-5 w-5" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"></path>
          </svg>
          <span class="mx-3">Show all Doctors</span>
        </a>

        <!-- <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/tables">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
            </path>
          </svg>

          <span class="mx-3">Tables</span>
        </a> -->

        <!-- <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
            </path>
          </svg>

          <span class="mx-3">Forms</span> -->
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
          <h3 class="text-gray-700 text-3xl font-medium">All doctors</h3>

          <div class="mt-8">

          </div>

          <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
              <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                  <thead class="bg-blue-400">
                    <tr>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Fullname</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Speciality</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Phone</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Email</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Patente</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Status</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Actions</th>
                    </tr>
                  </thead>

                  <tbody class="bg-white">
                    <?php foreach ($doctors as $doctor) : ?>

                      <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $doctor['firstname'] . " " . $doctor['lastname']; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $doctor['speciality']; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $doctor['phone']; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $doctor['email']; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $doctor['patente']; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <?php echo $doctor['status']; ?>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                          <div class="flex space-x-2">
                            <form method="post" class="mr-1">
                              <input type="hidden" value="<?php echo $doctor['id']; ?>" class="idDoctor" name="id">
                              <button name="accept" class="accepted w-11 h-11"> <i class="text-green-500 fas fa-user-check "></i> </button>
                            </form>

                            <form method="post" class="mr-1">
                              <input type="hidden" value="<?php echo $doctor['id']; ?>" class="idDoctor" name="id">
                              <button name="reject" class="rejected  w-11 h-11"> <i class="text-red-500 fas fa-user-alt-slash "></i> </button>
                            </form>
                            <form method="post" class="mr-1" action="deleteDoctor" onsubmit=" return deleteRow(this)">
                              <input type="hidden" name="id" value="<?php echo $doctor['id']; ?>">
                              <button type="submit" class="text-red-700"><i class=" mt-4 text-indigo-700 fa fa-trash"></i></button>
                            </form>
                          </div>
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
        text: "Once deleted, you will not be able to recover this Docotor!",
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


<script>
  let accepted = document.querySelectorAll('.accepted');
  let rejected = document.querySelectorAll('.rejected');
  let status = document.querySelector('.status');
  let idDoctor = document.querySelector('.idDoctor');
  accepted.forEach((e) => {
    e.addEventListener('click', function() {
      status.value = 'accepted';
      idDoctor.value = e.value;
    })

  })
  rejected.forEach((e) => {
    e.addEventListener('click', function() {
      status.value = 'rejected';
      idDoctor.value = e.value;
    })

  })
</script>