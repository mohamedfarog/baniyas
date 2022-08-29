@extends('layout') 
@section('content')
<style>
  .imgPreview img {
      padding: 8px;
      max-width: 100px;
      max-height: 80px;
  } 
</style>
<form method="POST" action="{{url('submit_news_data')}}" enctype="multipart/form-data" style="width: 95%; padding-left: 100px;"   >
   @csrf 
   
   <div class="row">
     <div class=" col-6">
      <label for="inputForTitle">Arabic Title: </label>
       <input type="text" class="form-control" id="arTitle" placeholder="A-Title"  name="ar_title" required>
     </div>
     <div class="col-6">
      <label for="inputForTitle">English Title: </label>
       <input type="text" class="form-control" id="enTitle"  name="en_title" placeholder="E-Title" required>
     </div>
     <div class="col-6">
      <label for="category"> Choose category: </label>
     <select name="category" id="category" class="col-12 newscat">
      <option value=0>First Team</option>
      <option value=1>Academy</option>
      <option value=2>Football School</option>
      <option value=3>Volleyball</option>
      <option value=4>Jiujitsu</option>
      <option value=5>Basketball</option>
      <option value=6>Fencing</option>
      <option value=7>Handball</option>
      <option value=8>Community</option> 
    </select>
     </div>
     <div class="col-6">
      <label for="inputDate">Date: </label>
      <input type="date" class="form-control" id="date" placeholder="Last name" name="date" required>
    </div>
    <div class="col-6">
      <label for="body">Arabic Body: </label>
      <textarea class="form-control" id="arBody" rows="3" name="ar_body" required></textarea>
    </div> 
    <div class="col-6">
      <label for="body">English Body: </label>
      <textarea class="form-control" id="enBody" rows="3" name="en_body" required></textarea>
    </div> 
    <div class="col->12">
      <label for="inputDate">News Images: </label>
      <input type="file" class="form-control" id="newsImages" placeholder="images" name="news_images" required >
    </div>

  <div class="user-image mb-3 text-center"  >
    <div class="imgPreview" > </div>
</div>            
<div class="custom-file">
    <input type="file" name="imagefile[]" class="custom-file-input" id="myimages" multiple="multiple">
    <label class="custom-file-label" for="myimages">Choose image</label>
</div>
   </div>
   <div class="submit_news">
      <button type="submit" name="post-btn" value="post" class="btn btn-outline-success" style="margin-top: 25px;">Add News</button>
   </div>
 </form>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

 <script>
  $(function() {
  // Multiple myimages preview with JavaScript
  var multiImgPreview = function(input, imgPreviewPlaceholder) {
      if (input.files) {
          var filesAmount = input.files.length;
          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();
              reader.onload = function(event) {
                  $($.parseHTML('<img>')).attr('src',  event.target.result).appendTo(imgPreviewPlaceholder) ;
              }
              reader.readAsDataURL(input.files[i]);
          }
      }
  };
  $('#myimages').on('change', function() {
      multiImgPreview(this, 'div.imgPreview');
  });
  });    
</script>
@stop
