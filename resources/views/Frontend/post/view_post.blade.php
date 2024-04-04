<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   


<!-- header start -->


@include('Frontend.page.header')

<!-- header end -->

<div class="container">

<div class="row">
    <div class="col-md-12"> 
        


<div class="main">

@foreach ($viewData as $iteam)



<div class="card" style="width: 18rem;">
  <img src="{{asset('Image/bd.png')}}" class="card-img-top" style="height: 200px; width:200px;" alt="...">
<form action="{{route('store.comment') }}" method="post">
@csrf

<div class="card-body">
  <input type="hidden" name="post_id">
    <h5 class="card-title">{{$iteam->title ?? ""}}</h5>
    <p class="card-text">{{$iteam->content ?? ""}}</p>
    <textarea class="form-control" name="commentarea" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
  
@endforeach


</div>



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
  </body>
</html>