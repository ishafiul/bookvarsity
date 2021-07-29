<?php
if (!isset($_SESSION['user_id_admin'])){
    redirect('admins/login');
}
require_once 'inc/header.php';
//print_r($data['payment']);
?>


<?php
require_once 'inc/footer.php';
?>
