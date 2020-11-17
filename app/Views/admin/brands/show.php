<div class="col">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <i class="fa fa-table"></i> <?php echo $title;?> 
      <a href="/admin/brands" class="btn btn-info float-right">
      <span data-feather="arrow-left-circle"></span> Go Back</a>
    </div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item active" aria-disabled="true"><?php echo $title;?></li>
        <li class="list-group-item">Name: <?=$brand->name?></li>
        <li class="list-group-item">Status: <?=$brand->status?></li>
        <li class="list-group-item">Description: <?=$brand->description?></li>
      </ul>
    </div>
  </div>
</div>