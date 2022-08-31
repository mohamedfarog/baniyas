@extends('layout') 
@section('content')
@if (session()->has('gallery_message'))
<h5 class="alert alert-success">{{ session('gallery_message') }}</h5>
@endif
@if (session()->has('gallery_imges_deleted'))
<h5 class="alert alert-success">{{ session('gallery_imges_deleted')}}</h5>
@endif
@if (session()->has('update_gallery_image'))
<h5 class="alert alert-success">{{ session('update_gallery_image')}}</h5>
@endif
<div class="container h-80>
    <div class="row align-middle">
      <div class="col-md-8 col-lg-8 column" style="background-color: rgb(137, 137, 250); border: 0px; border-radius: 7px;">
            <div class="card gr-3">
                <div class="txt">
                  <h1>Arabic Name: </br><h6>{{$gallery->galleryaname}}</h6></h1>
                  <h1>English Name: </br><h6>{{$gallery->galleryename}}</6></h1>
                  <h1>Date:</br><h6>{{$gallery->gallerydate}}</h6></h1>
                  <h1>Album name: </br><h6>{{$gallery->albumnames}}</h6></h1>
                </div>
              </div>
            </div>
        </div>
    </div> 
    <header style="margin-top: 70px;">
      <div class="navbar navbar-dark " style="background-color:  rgb(171, 171, 249);">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Album</strong>
          </a>
        </div>
      </div>
    </header>
    <main role="main">
      <svg 
      onclick="addMoreImages()"
      type="button"
      stroke="currentColor"
      fill="none"
      aria-hidden="true"
      style=" margin-top: 10px; margin-top: 30px; margin-left: 180px; height:50px;"
    >
      <path
        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
        strokeWidth="2"
        strokeLinecap="round"
        strokeLinejoin="round"
      />
    </svg>
        <div class="col-md-4" id="addGalImages" style="margin-left: 180px;  display: none">    
         <form method="post"  action="{{url('submit_gallery_images', $gallery->galleryid)}}" enctype="multipart/form-data" >
          @csrf  
            <input type="file" class="form-control" id="galleryImages" placeholder="images" name="gallery_images[]" multiple >   
            <div class="input-group-btn"> 
              <button type="submit" class="btn btn-outline-dark" style="margin-top: 5px;">Submit</button>  
            </div>
        </form> 
    </div>
      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            @foreach($gallery_imgs as $gimages)
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src={{$gimages->imgfilename}} height="100" alt="Card image cap">
                <div class="card-body">
                  <h5 style=" color: black; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                  ">Uploaded date: </h5>
                  <p class="card-text" style="color:black;">{{$gimages->uploadedtime}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <form class="remove-record-model" id="theForm" method="POST" action="{{ URL::route('delete_gallery_images', $gimages->imgid)}}">
                      @csrf
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary" onclick="updateGalImage({{$gimages}})">Edit</button>
                      <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                    </div>
                    </form>
                    <small class="text-muted">{{$gimages->imgid}}</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </main>
    <div class="pagination">
      {{ $gallery_imgs->appends(Request::except('page'))->links() }} 
    </div>
    <script> 
      function updateGalImage(imgData){
    console.log(imgData);
    document.getElementById("update_gal_image").src = imgData.imgfilename;
    document.getElementById("update_ganImage_id").value = imgData.imgid;
    var imgModal = new bootstrap.Modal(document.getElementById('updateGalleryImage'))
    imgModal.show()
    // imgfilename
      }
    
    </script>
    <script>
    function hideModel(){
        var galModal = document.getElementById('updateGalleryImage');
        var myModal = bootstrap.Modal.getInstance(galModal)
        myModal.hide();
}

    </script>
<div class="modal fade" id="updateGalleryImage" tabindex="-1" role="dialog" aria-labelledby="updateGalleryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">UPDATE GALLERY IMAGE</h5>    
          </div>
          <div class="modal-body">
              <div class="alert alert-danger" style="display:none"></div>
              <form action="{{url('update_gallery_image')}}" method="POST" enctype="multipart/form-data">
                  @csrf 
  
                  <div class="form-group">
                      <img src="good_morning.jpg" alt="Good Morning Friends" id="update_gal_image" height="125px; width: 150px;" />  
                      <input type="file" class="form-control" id="galleryImages" placeholder="images" name="gallery_images" style="margin-top: 20px;" >   
                      <input type="hidden" name="imgid" id="update_ganImage_id">

                  </div>  
                 
              <div class="modal-footer">
                  <button type="button"  class="btn btn-danger" data-dismiss="modal" onclick="hideModel()">Close</button>
                  <button type="submit" class="btn btn-success">Save</button>
              </div>
          </form>
          </div>
      </div>
  </div>
</div>

    <script>
      //show add filed 
      function addMoreImages() {
        var x = document.getElementById("addGalImages");

        if (x.style.display === "none") {
            x.style.display = "block";
        }else{
            x.style.display = "none";
        }
      }
      
</script>
<script type="text/javascript">
$(document).ready(function() {
  $(".btn-success").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
          $("body").on("click",".btn-danger",function(){ 
              $(this).parents(".control-group").remove();
          });
    
        });
    
    </script>
@stop