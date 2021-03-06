<?php
require_once './autoload.php';
require_once './views/includes/header.php';
require_once './views/includes/footer.php';
require_once './views/includes/alerts.php';


$home = new HomeController();

$pages = ['deleteDoctor','showdoctors', 'homeadmin', 'homeuser', 'addPatient', 'update', 'delete', 'login', 'loginadmin', 'logoutadmin', 'register', 'logout', 'pending', 'rejected', 'displayPatient', 'adddisease', 'addattachement', 'addBiometry', 'addVaccine', 'addallergy', 'displayAttachement', 'displayDisease', 'displayAllergies', 'displayVaccine', 'displayBiometry', 'deleteallergy', 'deleteattachement', 'deletebiometry', 'deletevaccine', 'deletedisease','updateDisease','updateAttachement','updateAllery','updateVaccine','updateBiometry'];
// print_r($_SESSION);
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    if (isset($_GET['page'])) {
        //in_array — Indique si une valeur appartient à un tableau
        if (in_array($_GET['page'], $pages)) {
            $page = $_GET['page'];
            $home->index($page);
        } else {
            include('./views/includes/404.php');
        }
    }

} else if (isset($_SESSION['loginadmin']) && $_SESSION['loginadmin'] == true) {
    if (isset($_GET['page']) && in_array($_GET['page'], $pages)) {
        $page = $_GET['page'];
        $home->index($page);
    } else {
        include('views/includes/404.php');
    }
} else if (isset($_GET['page']) && $_GET['page'] == 'loginadmin') {
    $home->index('loginadmin');
} else if (isset($_GET['page']) && $_GET['page'] == 'register') {
    $home->index('register');
} else {
    $home->index('login');
}
