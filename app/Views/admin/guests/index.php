
<div class="col">
  <div class="card">
    <div class="card-header">
      <strong class="card-title"><span data-feather="file-text"></span> <?=$title;?></strong> 
      <a href="/admin/guests/index" class="btn btn-primary text-center float-right">
      <span data-feather="plus"></span> Add New</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if(!empty($guests) && count($guests)>0):?>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Gender</th>
              <th scope="col">Username</th>
              <th scope="col">Subject</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($guests as $guest):?>

            <tr>
              <th scope="row"><?=$guest->id;?></th>
              <td><?=$guest->gender;?></td>
              <td><?=$guest->username;?></td>
              <td><?=$guest->subject;?></td>
              <td><a href="/admin/guests/show/<?=$guest->id?>" class="btn btn-default">
              <span data-feather="eye"></span> View</a></td>
              <td><a href="/admin/guests/delete/<?=$guest->id?>" class="btn btn-danger">
              <span data-feather="delete"></span> Delete</a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table> 
        <?php else: echo "<h2>No guests yet</h2>"?>
        <?php endif;?>
      </div>   
    </div>
  </div>
</div>