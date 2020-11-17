<div class="col-md-6 mb-2 pl-4">
    <form class="text-center border p-5 m-auto" action="" method="POST">
        <h3 class="mb-4 text-uppercase"><?=$title_1?></h3>
        <div class="form-control form-radio mb-4">
            <input type="radio" name="gender" value="Г-жа" required> Г-жа
            <input type="radio" name="gender" value="Г-н" required> Г-н
            
        </div>
        <input class="form-control mb-4" type="text" name="username" id="username" value="" placeholder="Имя" required> 
        <input class="form-control mb-4" type="email" name="email" value="" placeholder="Адрес электронной почты" required>
        <label for="">Тема
            <select class="form-select" name="subject" id="" required>
                <option value="">Выберите тему</option>
                <option value="Отзыв">Отзыв</option>
                <option value="Жалоба">Жалоба</option>
                <option value="Сотрудничество">Сотрудничество</option>
            </select>
        </label>
        <div class="form-group">
            <textarea name="message" id="" class="form-control rounded-0 mb-4" col="30" row="20" required></textarea>    
        </div>
        <div class="form-control form-checkbox mb-4">
            <label>
                <input type="checkbox" class="control-input"> Отправить мне копию этого сообщения
            </label>  
        </div>

        <button type="submit" class="btn-submit btn-dark btn-block ">Отправить</button>
    </form>
                   
</div>


