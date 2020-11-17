
<div class="col">
  <div class="card">
    <div class="card-header">
      <strong class="card-title"><span data-feather="file-text"></span> <?=$title;?></strong> 
      <a href="/admin/brands/create" class="btn btn-primary text-center float-right">
      <span data-feather="plus"></span> Add New</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if(!empty($brands) && count($brands)>0):?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($brands as $brand):?>

            <tr>
              <th scope="row"><?=$brand->id;?></th>
              <td><?=$brand->name;?></td>
              <td><?=$brand->status;?></td>
              <td><a href="/admin/brands/show/<?=$brand->id?>" class="btn btn-default"><span data-feather="eye"></span> View</a></td>
              <td><a href="/admin/brands/edit/<?=$brand->id?>" class="btn btn-primary"><span data-feather="edit"></span> Edit</a></td>
              <td><a href="/admin/brands/delete/<?=$brand->id?>" class="btn btn-danger"><span data-feather="delete"></span> Delete</a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table> 
        <?php else: echo "<h2>No brands yet</h2>"?>
        <?php endif;?>
      </div>   
    </div>
  </div>
</div>