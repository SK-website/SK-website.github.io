<div class="col">
  <div class="card">
    <div class="card-header">
    <strong class="card-title"><span data-feather="file-text"></span><?=$title;?></strong> 
      <a href="/admin/products" class="float-right"><button class="btn btn-primary text-right">
        <span data-feather="arrow-left-circle"></span> Go Back</button></a>
    </div>
    <div class="card-body">  
      <ul class="list-group">
        <li class="list-group-item">Product Name: <?=$product->name?></li>
        <li class="list-group-item">Сategory: <?=$product->category_id?></li>
        <li class="list-group-item">Brand: <?=$product->brand_id?></li>
        <li class="list-group-item">Description: <?=$product->description?></li>
        <li class="list-group-item">Price: <?=$product->price?></li>
        <li class="list-group-item">Status: <?=$product->status?></li>  
        <li class="list-group-item">Picture: <?=$product->image?></li>
      </ul> 
    </div>
  </div>
</div>

