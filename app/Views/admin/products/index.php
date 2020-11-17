<div class="col">
  <div class="card">
    <div class="card-header">
      <strong class="card-title"><span data-feather="file-text"></span> <?=$title;?></strong> <a href="/admin/products/create" class="btn btn-primary text-center float-right"><span data-feather="plus"></span> Add New</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if(!empty($products) && count($products)>0):?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Name</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product):?>

            <tr>
              <th scope="row"><?=$product->id;?></th>
              <td><?=$product->name;?></td>
              <td><a href="/admin/products/show/<?=$product->id?>" 
                class="btn btn-default"><span data-feather="eye"></span> View</a></td>
              <td><a href="/admin/products/edit/<?=$product->id?>" class="btn btn-primary">
                <span data-feather="edit"></span> Edit</a></td>
              <td><a href="/admin/products/delete/<?=$product->id?>" class="btn btn-danger">
                <span data-feather="delete"></span> Delete</a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table> 
        <?php else: echo "<h2>No Products yet</h2>"?>
        <?php endif;?>
      </div>   
    </div>
  </div>
</div>