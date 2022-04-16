@extends('app')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-8">
                            <h3 class="text-center">All Reviews</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="text-right">
                                <form method="GET" action="{{ route('allReviews') }}">
                                    <input type="text" name="search" class="form-control" placeholder="Search by Restaurant Name">
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="container mt-8">
                            <table class="table table-bordered mb-7">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col">Restaurant name</th>
                                        <th scope="col">Review</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach($allReviews as $data)
                                    <tr>
                                        <td>@if($data->restaurants){{ $data->restaurants->restaurant_name }}@endif</td>
                                        <td style="width:350px;">{{ $data->review }}</td>
                                        <td><img src="{{url('/images/' . $data->img)}}" width="350px;" height="200px;"></td>
                                        <td style="width:320px;">{{$data->comment}}</td>
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