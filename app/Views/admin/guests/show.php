<div class="col">
  <div class="card">
    <div class="card-header">
    <strong class="card-title"><span data-feather="file-text"></span><?=$title;?></strong> 
      <a href="/admin/guests" class="float-right"><button class="btn btn-primary text-right">
        <span data-feather="arrow-left-circle"></span> Go Back</button></a>
    </div>
    <div class="card-body">  
      <ul class="list-group">
        <li class="list-group-item">Name: <?=$guest->gender.': '.$guest->username?></li>
        <li class="list-group-item">Email: <?=$guest->email?></li>
        <li class="list-group-item">Subject: <?=$guest->subject?></li>
        <li class="list-group-item">Message: <?=$guest->message?></li>

      </ul> 
    </div>
  </div>
</div>