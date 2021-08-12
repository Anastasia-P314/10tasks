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

                            <?php 
                            $styles = [
                                ['d-flex mt-2','d-inline-block ml-auto','progress progress-sm mb-3','progress-bar bg-fusion-400','progressbar','65','0','100'],
                                ['d-flex','d-inline-block ml-auto','progress progress-sm mb-3','progress-bar bg-success-500','progressbar','34','0','100'],
                                ['d-flex','d-inline-block ml-auto','progress progress-sm mb-3','progress-bar bg-info-400','progressbar','77','0','100'],
                                ['d-flex','d-inline-block ml-auto','progress progress-sm mb-g','progress-bar bg-primary-300','progressbar','84','0','100']
                            ];

                            $data = [
                                ['My Tasks','130 / 500','d-flex mt-2','d-inline-block ml-auto','progress progress-sm mb-3','progress-bar bg-fusion-400','progressbar','65','0','100'],
                                ['Transfered','440 TB','d-flex','d-inline-block ml-auto','progress progress-sm mb-3','progress-bar bg-success-500','progressbar','34','0','100'],
                                ['Bugs Squashed','77%','d-flex','d-inline-block ml-auto','progress progress-sm mb-3','progress-bar bg-info-400','progressbar','77','0','100'],
                                ['User Testing','7 days','d-flex','d-inline-block ml-auto','progress progress-sm mb-g','progress-bar bg-primary-300','progressbar','84','0','100']
                                ]  
                            ?>

                            <?php 
                            foreach($data as $d){ ?>
                            <div class="<?php echo $d[2]?>">


                                <?php 
                                    echo $d[0];
                                ?>
                                <span class="<?php echo $d[3]?>">
                                <?php 
                                    echo $d[1];
                                ?></span>

                            </div>
                            <div class="<?php echo $d[4]?>">
                                <div class="<?php echo $d[5]?>" role="<?php echo $d[6]?>" style="width: <?php echo $d[7]?>%;" aria-valuenow="<?php echo $d[7]?>" aria-valuemin="<?php echo $d[8]?>" aria-valuemax="<?php echo $d[9]?>"></div>
                            </div>

                            <?php };?>


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
