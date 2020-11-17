  
<div class="col">
  <div class="card">
    <div class="card-header">
      <strong class="card-title"><span data-feather="file-text"></span><?=$title;?></strong> <a href="/admin/categories" class="btn btn-info text-center float-right"><span data-feather="arrow-left-circle"></span> Go Back</a>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="name">Category name</label>
        <input type="text" class="form-control" value="<?=$category->name?>" disabled>
        <small id="nameHelp" class="form-text text-muted">Category name required</small>
      </div>
                
      <div class="form-group form-check">
        <label class="form-check-label" for="status">Status: </label>
        <input type="text" name="status" value="<?php echo $category->status? 'Active ':'Not Active '?>" disabled> 
      </div>
    </div>
  </div>
</div>