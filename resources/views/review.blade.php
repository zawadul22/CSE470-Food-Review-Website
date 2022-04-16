@extends('app')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Review</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('review') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="cars">Choose a Restaurant:</label>
                                  <select name="restaurant_id" id="" required>
                                    <option value="">Choose from below</option>
                                    @foreach($restaurants as $data)
                                    <option value="{{$data->id}}">{{$data->restaurant_name}}</option>
                                    @endforeach
                                  </select>
                                @if ($errors->has('restaurant_name'))
                                <span class="text-danger">{{ $errors->first('restaurant_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Review" id="review" class="form-control" name="review" required>
                                @if ($errors->has('review'))
                                <span class="text-danger">{{ $errors->first('review') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="img">Select image:</label>
                                <input type="file" id="img" name="img" accept="image/*">
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection