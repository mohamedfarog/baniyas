@extends('layout') 
@section('content')
<style>
  .imgPreview img {
      padding: 8px;
      max-width: 100px;
      max-height: 80px;
  } 
</style>
{{-- {{$team_cat}} --}}
<script type="text/javascript">
  $(function () {
      $('#datetimepicker1').datetimepicker();
  });
</script>
<form method="POST" action="{{url('update_news_data', $news_data->newsid)}}"  enctype="multipart/form-data" style="width: 95%; padding-left: 100px;"   >
   @csrf {{ csrf_field() }}
   {{-- @method('PUT') --}}
   <div class="row">
     <div class=" col-6">
      <label for="inputForTitle">Arabic Title: </label>
       <input type="text" class="form-control" id="arTitle" value="{{$news_data->newstitle}}" placeholder="A-Title"  name="ar_title">
     </div>
     <div class="col-6">
      <label for="inputForTitle">English Title: </label>
       <input type="text" class="form-control" id="enTitle" value="{{$news_data->news_e_title}}" name="en_title" placeholder="E-Title">
     </div>
     <div class="col-6">
      <label for="category"> Choose category: </label>
     <select name="category" id="category"  class="col-12 newscat">
      <option value={{$news_data->newscategory}} >{{$news_data->cat}}</option>
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
      <input type="datetime-local" class="form-control" id="date"  value="{{$news_data->newsdate}}"  placeholder="Last name" name="date" >
    </div>
    <div class="col-6">
      <label for="body">Arabic Body: </label>
      <textarea  class="form-control"  id="arBody" rows="3" name="ar_body"  required> @isset($news_data){{$news_data->newsbody}}@else @endIf</textarea>
    </div> 
    <div class="col-6">
      <label for="body">English Body: </label>
      <textarea class="form-control" id="enBody" rows="3" name="en_body" required>@isset($news_data){{$news_data->news_e_body}}@else @endIf</textarea>
    </div> 
    <div class="col->12">
      <label for="inputDate">News Images: </label>
      <input type="file" class="form-control" id="newsImages" name="news_images"  value="{{$news_data->newsimages}}" placeholder="images" >
    </div>
    <div class="user-image mb-3 text-center">
      <div class="imgPreview" > </div>
  </div>
    <div class="custom-file">
      <input type="file" name="imagefile[]"  class="custom-file-input" id="myimages"  multiple="multiple">
      <label class="custom-file-label" for="myimages">Choose image</label>
  </div>
   </div>
   <div class="submit_news">
      <button type="submit" name="post-btn" value="post" class="btn btn-outline-success">Update News</button>
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
