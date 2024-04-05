<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <!-- header start -->
    @include('Frontend.page.header')

    <!-- header end -->

    <div class="container">

        <div class="row">


            <form class="d-flex">
                <input class="form-control me-2" name="search" value="{{ $search }}" type="search"
                    placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>


            <div class="col-md-12">

                <h3 class="text-center">All Post</h3>
                <a href="{{ route('create.post') }}" class="btn btn-primary">Add Post</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($published) > 0)
                            <!-- Display search value if provided -->
                            @if ($search)
                                <p>Search value: {{ $search }}</p>
                            @endif


                            @foreach ($published as $key => $post)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>
                                        <img src="{{ url('public/Image/' . $post->image) }}"
                                            style="width: 70px; height: 40px;">

                                    </td>

                                    <td>
                                        <a href="{{ route('view.post', $post->id) }}" class="btn btn-info">View</a>


                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No posts found.</p>
                        @endif


                        <!-- post -->

                        @foreach ($posts as $key => $post)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    <img src="{{ url('public/Image/' . $post->image) }}"
                                        style="width: 70px; height: 40px;">

                                </td>

                                <td>
                                    <a href="{{ route('view.post', $post->id) }}" class="btn btn-info">View</a>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
