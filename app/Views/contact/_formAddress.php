<div class="col-md-6 mb-2 text-center">
<form class="text-center border p-5 m-auto">
    <h3 class="mb-4 text-uppercase"><?=$title_2?></h3>
    
<?php if(isset($address)):?>
    <label for="" class="form-control mb-4"><i class="fas fa-home"></i>: <?=$address['street']?></label>
    <label for="" class="form-control mb-4"><i class="fas fa-map-marker-alt"></i>: <?=$address['city']?></label>
    <label for="" class="form-control mb-4"><i class="fas fa-university"></i>: <?=$address['country']?></label>    
    <label for="" class="form-control mb-4"><i class="fas fa-envelope-square"></i>: <?=$address['email']?></label>
    <label for="" class="form-control mb-4"><i class="fas fa-phone-square-alt"></i>: <?=$address['mobile']?></label>

<?php endif?>

    <h4 class="text-uppercase"><?=$subtitle?></h4>
        <div class="form-control mb-4">
            <a href="#" class="social"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social"><i class="fab fa-facebook"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus"></i></a>
            <a href="#" class="social"><i class="fab fa-instagram"></i></a>
    </div>

</div> 