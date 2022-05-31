<?php
$data = new PatientsController();
$patients = $data->getAllpatients();
?>

<nav class="relative w-full flex flex-wrap items-center justify-between py-4 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg navbar navbar-expand-lg navbar-light">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <button class=" navbar-toggler text-gray-500 border-0 hover:shadow-none hover:no-underline py-2 px-2.5 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline
    " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

    </button>
    <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent">
      <a class=" flex items-center text-gray-900 hover:text-gray-900 focus:text-gray-900 mt-2 lg:mt-0 mr-1 " href="#">
        <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" style="height: 15px" alt="" loading="lazy" />
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

<div class="overflow-x-auto">
  <div class="min-w-screen min-h-screen  flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
    <div class="w-full lg:w-5/6">
      <div class="bg-gray-0">
        <a href="<?php echo BASE_URL; ?>add" class="btn btn-sm btn-primary mr-2 mb-2"><i class="fas fa-plus"></i></a>
      </div>
      <div class="bg-white shadow-md rounded my-6">

        <table class="min-w-max w-full table-auto">
          <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
              <th class="py-3 px-6 text-left">Fullname</th>
              <th class="py-3 px-6 text-left">Birthday</th>
              <th class="py-3 px-6 text-center">CIN</th>
              <th class="py-3 px-6 text-center">Phone</th>
              <th class="py-3 px-6 text-center">Blood_group</th>
              <th class="py-3 px-6 text-center">Action</th>
            </tr>
          </thead>
          <tbody class="text-gray-600 text-sm font-light">
            <?php foreach ($patients as $patient) : ?>
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                  <?php echo $patient['firstname'] . " " . $patient['lastname']; ?>

                </td>
                <td class="py-3 px-6 text-left">
                  <div class="flex items-center">
                    <?php echo $patient['birthday']; ?>

                  </div>
                </td>
                <td class="py-3 px-6 text-center">
                  <?php echo $patient['cin']; ?>
                </td>
                <td class="py-3 px-6 text-center">
                  <?php echo $patient['phone']; ?>
                </td>
                <td class="py-3 px-6 text-center">
                  <?php echo $patient['blood_group']; ?>
                </td>
                <!-- <td class="py-3 px-6 text-center">
                  <?php echo $patient['id']; ?>
                </td> -->
                <td class="py-3 px-6 text-center">
                  <div class="flex item-center justify-center">
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                      <form method="post" class="mr-1" action="displayPatient">
                        <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
                        <button class=""><i class="fas fa-eye"></i></button>
                      </form>
                    </div>
                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                      <form method="post" class="mr-1" action="update">
                        <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
                        <button class=""><i class="fa fa-edit"></i></button>
                      </form>
                    </div>

                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                      <form method="post" class="mr-1" action="delete">
                        <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
                        <button class=""><i class="fa fa-trash"></i></button>
                    </div>
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