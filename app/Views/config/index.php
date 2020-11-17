<div class="py-5 bg-light">
<div class="row">
        <div class="container-wrapper">
            <div class="form">
                <form action="" method="POST">
                    <h1><?=$title?></h1>
                    <?php if(isset($address)):?>
                        <div><label for=""><i class="fas fa-home"></i>: <input type="text" name="street" 
                        value="<?=$address['street']?>"></label></div>
                        <div><label for=""><i class="fas fa-envelope-square"></i>:<input type="email" name="email" 
                        value="<?=$address['email']?>"></label></div>
                        <div><label for=""><i class="fas fa-phone-square-alt"></i>: <input type="text" name="mobile" 
                        value="<?=$address['mobile']?>"></label></div>
                        <div><label for=""><i class="fas fa-map-marker-alt"></i>: <input type="text" name="city" 
                        value="<?=$address['city']?>"></label></div>
                        <div><label for=""><i class="fas fa-university"></i>: <input type="text" name="country" 
                        value="<?=$address['country']?>"></label></div>
                    <?php endif?>
                    <input type="submit" value="Отправить">
                </form>
            </div>
                
        </div>
</div>

</div>