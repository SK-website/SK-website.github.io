  
<div class="col">
  <div class="card">
    <div class="card-header">
      <strong class="card-title"><span data-feather="file-text"></span><?=$title;?></strong> 
      <a href="/admin/brands" class="btn btn-info text-center float-right">
      <span data-feather="arrow-left-circle"></span> Go Back</a>
    </div>
    <div class="card-body">
      <form method="POST" action="/admin/brands/update">
        <input type="hidden" name="id" value="<?=$brand->id?>">
        <div class="form-group">
          <label for="name">Brand name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" 
          require value="<?=$brand->name?>">
          <small id="nameHelp" class="form-text text-muted">Brand name required</small>
        </div>
                
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="status" name="status" 
          <?php echo $brand->status? 'checked':''?>>
          <label class="form-check-label" for="status">Is Active?</label>
        </div>
        <button type="submit" class="btn btn-primary">Update Brand</button>
      </form>   
    </div>
  </div>
</div>