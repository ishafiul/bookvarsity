<?php
    require_once '../vendor/autoload.php';
    require_once 'config/config.php';
    // Load Helpers
    require_once 'helpers/session_helper.php';
    require_once 'helpers/url_helper.php';

    $db = new Database;
    $dbCore = new coreDb;

    $dbCore->query('SELECT * FROM users');
    $resultscore = $dbCore->resultSet();
    $db->query('SELECT * FROM users');
    $results = $db->resultSet();
    foreach ($resultscore as $core){
        $i=0;
        foreach ($results as $local){
            if ($core->email == $local->email ){
                $i++;
            }
        }
        if ($i == 0){
            $db->query("INSERT INTO users (fname,lname, email,phone, password,zip,address) VALUES(:fname,:lname, :email,:phone, :password,:zip,:address)");
            // Bind values
            $db->bind(':fname', $core->fname);
            $db->bind(':lname', $core->lname);
            $db->bind(':email', $core->email);
            $db->bind(':phone', $core->phone);
            $db->bind(':password', $core->password);
            $db->bind(':zip', $core->zip);
            $db->bind(':address', $core->address);
            $db->execute();
        }
    }
$dbCore->query('SELECT * FROM payments where site_id = 1');
$resultscore = $dbCore->resultSet();
$db->query('SELECT * FROM payments');
$results = $db->resultSet();
foreach ($resultscore as $core){
    $i=0;
    foreach ($results as $local){
        if ($core->payment_id == $local->payment_id ){
            $i++;
        }
    }
    if ($i == 0){
        $db->query("INSERT INTO payments (payment_id,payer_id,payer_email,amount,currency,payment_status, fname, lname, mail, phone, zip, address, user_id, products_ids) VALUES(:payment_id, :payer_id,:payer_email,:amount,:currency,:payment_status,:fname,:lname,:mail,:phone,:zip,:address,:user_id,:products_ids)");
        // Bind values
        $db->bind(':payment_id', $core->payment_id);
        $db->bind(':payer_id', $core->payer_id);
        $db->bind(':payer_email', $core->payer_email);
        $db->bind(':amount', $core->amount);
        $db->bind(':currency', $core->currency);
        $db->bind(':payment_status', $core->payment_status);
        $db->bind(':fname', $core->fname);
        $db->bind(':lname', $core->lname);
        $db->bind(':mail', $core->mail);
        $db->bind(':phone', $core->phone);
        $db->bind(':zip', $core->zip);
        $db->bind(':address', $core->address);
        $db->bind(':user_id', $core->user_id);
        $db->bind(':products_ids', $core->products_ids);
        $db->execute();
    }
}

$dbCore->query('SELECT * FROM products where site_id = 1');
$resultscore = $dbCore->resultSet();
$db->query('SELECT * FROM products');
$results = $db->resultSet();
foreach ($resultscore as $core){
    $i=0;
    foreach ($results as $local){
        if ($core->url == $local->url ){
            $i++;
        }
    }
    if ($i == 0){
$db->query("INSERT INTO products (product_name, price, short_info, product_details, more_info, category, brand, url, pdf) VALUES(:product_name, :price, :short_info, :product_details, :more_info, :category, :brand, :url, :pdf)");
    // Bind values
    $db->bind(':product_name', $core->product_name);
    $db->bind(':price', $core->price);
    $db->bind(':short_info', $core->short_info);
    $db->bind(':product_details', $core->product_details);
    $db->bind(':more_info', $core->more_info);
    $db->bind(':category', $core->category);
    $db->bind(':brand', $core->brand);
    $db->bind(':url', $core->url);
    $db->bind(':pdf', $core->pdf);
    $db->execute();
    }

}

$dbCore->query('SELECT * FROM image where site_id = 1');
$resultscore = $dbCore->resultSet();
$db->query('SELECT * FROM image');
$results = $db->resultSet();
foreach ($resultscore as $core){
    $i=0;
    foreach ($results as $local){
        if ($core->product_id == $local->product_id ){
            $i++;
        }
    }
    if ($i == 0){
        $db->query("INSERT INTO image (img,product_id,base64) VALUES(:img,:product_id,:base64)");
        // Bind values
        $db->bind(':img', $core->img);
        $db->bind(':product_id', $core->product_id);
        $db->bind(':base64', $core->base64);
        $db->execute();
    }

}
