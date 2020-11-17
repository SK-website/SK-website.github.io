<div class="col">
  <div class="card">
    <div class="card-header">
      <strong class="card-title"><span data-feather="file-text"></span><?=$title;?></strong> 
      <a href="/admin/products" 
      class="btn btn-info text-center float-right"><span data-feather="arrow-left-circle"></span> Go Back</a>
    </div>
    <div class="card-body">
      <form method="POST" class="form-horizontal">
        <div class="form-group">
          <label for="name"><?=$product->name?></label>
          
          <small id="nameHelp" class="form-text text-muted"><h2>This Product will be deleted! Are You Sure?</h2></small>
        </div>
                
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-danger">Delete Product</button>
            <button name="reset" class="btn btn-info">Cansel</button>
        </div>
        
      </form>   
    </div>
  </div>
</div>