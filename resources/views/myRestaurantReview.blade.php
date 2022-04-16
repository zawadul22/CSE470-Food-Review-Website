@extends('owner')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h3 class="card-header text-center">All Reviews</h3>
                    <div class="card-body">
                        <div class="container mt-8">
                            <table class="table table-bordered mb-7">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col">#</th>
                                        <th scope="col">Restaurant name</th>
                                        <th scope="col">Review</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach($myRestaurantReview as $data)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $data->restaurants->restaurant_name }}</td>
                                        <td>{{ $data->review }}</td>
                                        <td><img src="{{url('/images/' . $data->img)}}" width="350px;" height="200px;" ></td>
                                        <form action="{{ route('review.update',$data->id) }}" method="POST">
                                                
                                                 @csrf
                                                 @method('PUT')
                                        <td>
                                            <input type="text" placeholder="Comment" id="review" class="form-control" name="comment" value="{{$data->comment}}" required>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </td>
                                        </form>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection