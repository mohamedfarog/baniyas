@extends('layout') 
@section('content')


@if (session()->has('updated_notfi'))
<h5 class="alert alert-success">{{ session('updated_notfi') }}</h5>
@endif
@if (session()->has('notyms'))
<h5 class="alert alert-success">{{ session('notyms') }}</h5>
@endif
@if (session()->has('newsdelete'))
<h5 class="alert alert-success">{{ session('newsdelete') }}</h5>
@endif

<a type="button" class="btn btn-outline-primary add_news" data-mdb-ripple-color="dark" href="{{ route('add_news') }}">Add news</a>
{{-- <a type="button" class="btn btn-primary add_news" href="{{ route('add_news') }}">+</a> --}}

<script>
  function submitForm(){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})
}
function confirmDelete(){
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})
}
</script>
<div class="content-wrapper"> 
  @foreach ($all_news as $new)
    <div class="news-card col-sm-2">
      <a href="#" class="news-card__card-link"></a>

      <img src={{$new->newsimages}} alt="" class="news-card__image">
      <div class="news-card__text-wrapper">
        <h2 class="news-card__title">{{$new->newstitle}}</h2>
        <h3> <sup>{{$new->cat}}</sup></h3> 
        <div id="newsDate" class="news-card__post-date">{{ date('Y-m-d', strtotime($new->newsdate))}}</div>
        <div class="news-card__details-wrapper">
          <p class="news-card__excerpt">{{$new->newsbody}}</p>
        </div>
        <div class="float-end">
          <form class="remove-record-model" id="theForm" method="post" action="{{ URL::route('delete_news', $new->newsid)}}">
            @csrf          
              <div class="dropdown">
                <i class="fas fa-cog" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">                
                </i>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li class="mdi mdi-pencil font-size-15" onclick="window.location='{{ URL::route('update_news', $new->newsid) }}'"> Edit</li>
                  <button id="SwalBtn1" onclick= return  submitForm() class="mdi mdi-trash-can font-size-10" type="submit" > Delete</button>  
                </ul>
              </div>
              </button>
          </form>
      </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="pagination">
    {!! $all_news->links() !!}
    </div>
@stop
{{-- onclick="return confirm('Are you sure?')" --}}
