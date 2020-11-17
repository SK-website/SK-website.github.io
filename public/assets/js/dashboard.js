/* globals Chart:false, feather:false */
(function () {
  'use strict';
  feather.replace();
  
}())

$(document).ready(function(){

 $image_crop = $('#image_crop').croppie({
    enableExif: true,
    viewport: {
      width:280,
      height:210,
      type:'rectangle' //circle
      
    },
    boundary:{
      width:300,
      height:250,
      
    }    
  });

  $('#insert_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#insertimageModal').modal('show');
  });
  const model = $('.crop_image').attr('data-model');
  $('.crop_image').click(function(event){
    // console.log($(this).attr('data-model'));
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){

      $.ajax({
        url:'/api/'+model+'/insert_image',
        type:'POST',
        data:{"image":response},
        success:function(data){
          $('#insertimageModal').modal('hide');
          output = `
          <input type="hidden" name="file_name" value="${data}">
          <div class="row">
            <div class="col-md-2" style="margin-bottom:16px;">
              <img src="/assets/images/${model}/${data}" class="img-thumbnail" />
            </div>
          </div>`;
        $('#store_image').html(output);

        }
      })
    });
  });

  // load_image();

  function load_image(id) {
    $.ajax({
      url:"/api/categories/fetch_image/1",
      success:function(result) {
        output = `
          <div class="row">
            <div class="col-md-2" style="margin-bottom:16px;">
              <img src="/assets/images/categories/${result}" class="img-thumbnail" />
            </div>
          </div>`;
        $('#store_image').html(output);
      }
    })
  }
});  
