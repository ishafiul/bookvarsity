<?php
if (!isset($_SESSION['user_id_admin'])){
    redirect('admins/login');
}
require_once 'inc/header.php';
//print_r($data['payment']);
?>
<h1>All Sell Info</h1>
<?php flash('register_success');
?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Product Id(s)</th>
            <th scope="col">Buyer Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">E-mail</th>
            <th scope="col">Zip Code</th>
            <th scope="col">Transaction ID</th>
            <th scope="col">Amount($)</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data['payment'] as $payment){
        ?>
        <tr>
            <th scope="row"><?php echo $payment->products_ids?></th>
            <th scope="row"><?php echo $payment->fname.' '.$payment->lname?></th>
            <th scope="row"><?php echo $payment->address?></th>
            <th scope="row"><?php echo $payment->phone?></th>
            <th scope="row"><?php echo $payment->mail?></th>
            <th scope="row"><?php echo $payment->zip?></th>
            <th scope="row"><?php echo $payment->payment_id?></th>
            <th scope="row"><?php echo $payment->amount?></th>
            <th scope="row"><?php
                if ($payment->payment_status == 'approved'){
                    echo '<span class="text-success">'.$payment->payment_status.'</span>';
                }
                else
                {
                    echo '<span class="text-danger">'.$payment->payment_status.'</span>';
                }
                $payment->payment_status
                ?></th>
        </tr>
            <?php
        }
            ?>
        </tbody>
    </table>
<?php
$helpers = new HelperFunction();
$helpers->pagination($data['total_pages'],$data['pageno']);
?>
<?php
require_once 'inc/footer.php';
?>