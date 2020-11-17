  
<div class="col">
  <div class="card">
    <div class="card-header bg-primary text-white">
    <i class="fa fa-table"></i> <?php echo $title;?> <a href="/admin/brands" class="btn btn-info float-right"><span data-feather="arrow-left-circle"></span> Go Back</a>
    </div>
    <div class="card-body">
      <form method="POST" action="/admin/brands/store">
        <div class="form-group">
          <label for="name">Brand name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" require>
          <small id="nameHelp" class="form-text text-muted">Brand name required</small>
        </div>
        <div class="form-group">
          <label for="name">Brand description</label>
          <input type="text" class="form-control" id="description" name="description" aria-describedby="brandHelp" require>
          <small id="nameHelp" class="form-text text-muted">Brand description required</small>
        </div>
                
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="status" name="status">
          <label class="form-check-label" for="status">Is Active?</label>
        </div>
        <button type="submit" class="btn btn-primary">Add Brand</button>
      </form>   
    </div>
  </div>
</div>
