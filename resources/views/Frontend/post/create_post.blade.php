<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>create post!</title>
  </head>
  <body>
   


<!-- header start -->


@include('Frontend.page.header')

<!-- header end -->

<div class="main">


<br>
<br>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 

<div class="container">
    <div class="row">
        <div class="col-md-6">


<a href="{{route('all.post')}}" class="btn btn-primary">all Post</a>

<form action="{{ route('store.post')}}" method="post">
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">title</label>
    <input type="text" class="form-control" name="title" id="title" aria-autocomplete="off" aria-describedby="title">

  </div>

  <div class="mb-3">
    <label for="content" class="form-label">content</label>
    <input type="text" name="content" class="form-control" id="content">
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" name="image" id="image">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>


        <div class="col-md-6"></div>
    </div>
</div>




</div>

<!-- footer start -->

<div class="card">
  <div class="card-body text-center">
    This is some text within a card body.
  </div>
</div>
<!-- footer end -->



   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
 }
 @endif
</script>

</body>
</html>