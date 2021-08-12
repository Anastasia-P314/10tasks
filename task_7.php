<?php 

$connection = mysqli_connect('localhost','root','');
// if(!$connection) {
//     die('Could not connect: ' . mysql_error());
// }
// echo 'Connected successfully';

mysqli_query($connection,"CREATE DATABASE IF NOT EXISTS marlin"); 
//mysqli_query($connection,"DROP DATABASE myDB");

// $sql = "CREATE DATABASE dbaad";
// if(mysqli_query($connection,$sql)) {
//     echo "Database my_db created successfully\n";
// } else {
//     echo 'Error creating database: ' . mysql_error() . "\n";
// };
mysqli_select_db($connection,'marlin');


$new_table = "CREATE TABLE IF NOT EXISTS `users`(
`id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`img` VARCHAR(30),
`altname` VARCHAR(30),
`title` VARCHAR(30),
`profession` VARCHAR(30),
`twitter` VARCHAR(30),
`wrapbootstrap` VARCHAR(30),
UNIQUE(`altname`)
)";
mysqli_multi_query($connection,$new_table);
// if(mysqli_multi_query($connection,$new_table)){
//     echo "Table Created";
// }else{
//     echo "Failed to create Table";
// };

$array = array(
    ['sunny.png', 'Sunny A.','Sunny A. (UI/UX Expert)', 'Lead Author','@myplaneticket','myorange'],
    ['josh.png', 'Jos K.','Jos K. (ASP.NET Developer)','Partner &amp; Contributor','@atlantez','Walapa'],
    ['jovanni.png', 'Jovanni Lo','Jovanni L. (PHP Developer)', 'Partner &amp; Contributor','@lodev09','lodev09'],
    ['roberto.png', 'Roberto R.','Roberto R. (Rails Developer)','Partner &amp; Contributor','@sildur','sildur'],
    );

foreach($array as $a){//echo "'".$a[0]."'\n";//"'".$a[5]."'"
    $insert_data = "INSERT IGNORE INTO users (img,altname,title,profession,twitter,wrapbootstrap) VALUES ('$a[0]','$a[1]','$a[2]','$a[3]','$a[4]','$a[5]');";
    mysqli_multi_query($connection, $insert_data);
};

//$insert_data = "INSERT INTO users (img,altname,title,profession,twitter,wrapbootstrap) VALUES ('1','2','3','4','5','6');";

//mysqli_close($connection); Если обязательно закрывать, то где? в конце документа или блока? 
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                           <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">
                            <?php

                            $result = mysqli_query($connection,'SELECT * FROM `users`');
                            // $r1 = mysqli_fetch_assoc($result); 
                            // print_r($r1);

                            $banned_users = array('Jovanni Lo','Roberto R.');

                            foreach($result as $r) {
                                ?>
                            
                            <div class="<?php if(in_array($r['altname'], $banned_users)){echo 'banned';}?> rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">
                                <img src="img/demo/authors/<?php echo $r['img']?>" alt="<?php echo $r['altname']?>" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">
                                <div class="ml-2 mr-3">
                                    <h5 class="m-0">
                                        <?php echo $r['title']?>
                                        <small class="m-0 fw-300">
                                            <?php echo $r['profession']?>
                                        </small>
                                    </h5>
                                    <a href="https://twitter.com/<?php echo $r['twitter']?>" class="text-info fs-sm" target="_blank"><?php echo $r['twitter']?></a> -
                                    <a href="https://wrapbootstrap.com/user/<?php echo $r['wrapbootstrap']?>" class="text-info fs-sm" target="_blank" title="Contact <?php echo strtok($a[1],' ')?>"><i class="fal fa-envelope"></i></a>
                                </div>
                            </div>

                            <?php 
                            }?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
