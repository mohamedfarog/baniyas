@extends('layout') 
@section('content')
@if (session()->has('message'))
<h5 class="alert alert-success">{{ session('message') }}</h5>
@endif
@if (session()->has('delete_galarey'))
<h5 class="alert alert-success">{{ session('delete_galarey') }}</h5>
@endif
@if (session()->has('success_gallery_update'))
<h5 class="alert alert-success">{{ session('success_gallery_update') }}</h5>
@endif

<div class="add-galery_button">
<a href="#addGallery" class="fa-regular fa-square-plus fa-3x" data-toggle="modal" data-target="#addGallery"></a>
</div>
<table class="table table-striped">
  <thead>
    <tr class="table-primary">
      <th scope="col">Arabic Name</th>
      <th scope="col">English Name</th>
      <th scope="col">Date</th>
      <th scope="col">Albumn Name</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  @foreach ($all_gallery as $gal)
  <script>
      let mydate = new Date((new Date(data.gallerydate)).toDateString())
        var month = mydate.getUTCMonth() + 1; //months from 1-12
        var day = mydate.getUTCDate();
        var year = mydate.getUTCFullYear()
        newdate = year + "/" + month + "/" + day;
        document.getElementById("galDates").value = newdate;
  </script>
  <tbody>
     <tr role="button" id="disablRowImages" onclick="galleryInfo({{$gal->galleryid}})">
      <td >{{$gal->galleryaname}}</a></td>
      <td>{{$gal->galleryename}}</td>
      <td>{{ date('Y-m-d', strtotime($gal->gallerydate))}}</td>
      <td>{{$gal->albumnames}}</td>
      <td>
        <form class="remove-record-model" id="theForm" method="POST" action="{{ URL::route('delete_gallery', $gal->galleryid)}}">
        @csrf
        <div>
       <button class="fa-solid fa-trash-can" style="color:red; font-size:25px" type="submit" ></button>
       <i class="fa-solid fa-pen-to-square" onclick="event.stopPropagation(); aliHassan({{$gal}})" style="color:rgb(16, 99, 154); font-size:25px"></i>   
    </form>   
    </div>
</td>
    </tr>
  </tbody>
  @endforeach
</table>
<script>
    function galleryInfo(id){

        window.location.href = "{{ route('gallery_images')}}?id="+id
    }
</script>

{{-- Add gallery model --}}
{{-- fade --}}
<div class="modal fade" id="addGallery" tabindex="-1" role="dialog" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD NEW GALLERY</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form action="{{url('submit_gallery_data')}}"  method="POST" enctype="multipart/form-data">
                {{-- <form class="add-gallery" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="form-group">
                        <label>Arabic Name: </label>
                        <input type="text" name="ar_name" id="ar_name" class="form-control" required/>
                    </div>  
                    <div class="form-group">
                        <label>English Name: </label>
                        <input type="text" name="en_name" id="en_name" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Date: </label>
                        <input type="datetime-local" name="date" id="date" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>Albumn Name: </label>
                    <input type="text" name="alb_name" id="alb_name" class="form-control" required/>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
</div>
{{-- Starting of update model --}}
<div class="modal fade" id="updateGallery" tabindex="-1" role="dialog" aria-labelledby="updateGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE GALLERY</h5>    
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form action="{{url('update_gallery_data')}}"  method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Arabic Name: </label>
                        <input type="text"  name="ar_name" id="update_ar_name" class="form-control"  wire:model="ar_name"/>
                    </div>  
                    <div class="form-group">
                        <label>English Name: </label>
                        <input type="text" name="en_name" id="update_en_name" class="form-control" wire:model="en_name"/>
                    </div>
                    <div class="form-group">
                        <label>Date: </label>
                        <input type="datetime-local" name="date" id="update_date" class="form-control"  wire:model="date"   />
                    </div>
                    <input type="hidden" name="galleryid" id="update_galleryid_id">
                <div class="form-group">
                    <label>Albumn Name: </label>
                    <input type="text" name="alb_name" id="update_alb_name" class="form-control" wire:model="alb_name"/>
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
    function aliHassan(data){
        $('.delete').on('click', function(e){
            e.stopPropagation();
            console.log('button clicked');
        });
        // document.getElementById("disablRowImages").disabled = true;
        console.log(data);
        document.getElementById("update_ar_name").value = data.galleryaname;
        document.getElementById("update_en_name").value =data.galleryename;
        document.getElementById("update_date").value = data.gallerydate;
        document.getElementById("update_alb_name").value = data.albumnames;
        document.getElementById("update_galleryid_id").value = data.galleryid;
        var myModal = new bootstrap.Modal(document.getElementById('updateGallery'))
        myModal.show()
        }
</script>
<script>
    function hideModel(){
        var myModalEl = document.getElementById('updateGallery');
        var modal = bootstrap.Modal.getInstance(myModalEl)
         modal.hide();
}
         
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
{{-- End of add gallery model --}}
<div class="pagination">
    {!! $all_gallery->links() !!}
    </div>
@stop
