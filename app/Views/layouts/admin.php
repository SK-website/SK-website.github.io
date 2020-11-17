<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <?php require_once VIEWS.'/layouts/partials/admin/_styles.php';?>
 </head>
 <body>
    <?php require_once VIEWS.'/layouts/partials/admin/_nav.php';?>
    
    <div class="container-fluid">
        <div class="row">
        <?php require_once VIEWS.'/layouts/partials/admin/_sidebar.php';?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?php require_once VIEWS.'/layouts/partials/admin/_toolbox.php';?>

                <?php //var_dump(VIEWS.'/'.$template);?>
                <?php require_once VIEWS.'/'.$template;?>
            </main>
        </div>
    </div>
       

    </div>
    <?php require_once VIEWS.'/layouts/partials/admin/_scripts.php';?>
    
   
 </body>
 </html>