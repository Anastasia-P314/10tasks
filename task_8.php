<?php

$connection = mysqli_connect('localhost','root','','marlin');

$new_table = "CREATE TABLE IF NOT EXISTS task8_table (
`#` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`First Name` VARCHAR(30),
`Last Name` VARCHAR(30),
`Username` VARCHAR(30)
)";
//UNIQUE('Username') Нужно не поле делать уникальным, а проверять несколько полей одновременно через условие WHERE NOT EXISTS
mysqli_query($connection, $new_table);

$array = array(
    ['Mark','Otto','@mdo'],
    ['Jacob','Thornton','@fat'],
    ['Larry','the Bird','@twitter'],
    ['Larry the Bird','Bird','@twitter']
);

foreach($array as $a){ //echo $a[0];
    //$insert_data = "INSERT INTO task8_table (`First Name`, `Last Name`, `Username`) VALUES ('$a[0]','$a[1]','$a[2]')";
    $insert_data = "INSERT INTO task8_table (`First Name`, `Last Name`, `Username`)
    SELECT * FROM (SELECT '$a[0]','$a[1]','$a[2]') AS tmp
    WHERE NOT EXISTS (
    SELECT `First Name`, `Last Name`, `Username` FROM task8_table WHERE `First Name` = '$a[0]' AND `Last Name` = '$a[1]' AND `Username` = '$a[2]'
    ) LIMIT 1";
    mysqli_query($connection, $insert_data);
};
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
                            <h5 class="frame-heading">
                                Обычная таблица
                            </h5>
                            <div class="frame-wrap">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?Php 
                                    $result = mysqli_query($connection, "SELECT * FROM task8_table");
                                    foreach($result as $r)
                                    {?>

                                        <tr>
                                            <th scope="row"><?php echo $r['#']?></th>
                                            <td><?php echo $r['First Name']?></td>
                                            <td><?php echo $r['Last Name']?></td>
                                            <td><?php echo $r['Username']?></td>
                                            <td>
                                                <a href="show.php?id=<?php echo $r['#']?>" class="btn btn-info">Редактировать</a>
                                                <a href="edit.php?id=<?php echo $r['#']?>" class="btn btn-warning">Изменить</a>
                                                <a href="delete.php?id=<?php echo $r['#']?>" class="btn btn-danger">Удалить</a>
                                            </td>
                                        </tr>
                                    <?php 
                                    }
                                    ?>

                                    </tbody>
                                </table>
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
