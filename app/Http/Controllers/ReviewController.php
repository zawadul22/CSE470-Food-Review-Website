<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\User;

use Illuminate\Support\Facades\Input;


class ReviewController extends Controller
{
    public function index(){
        $restaurants = User::where('restaurant_name', '!=', null)->get();
        return view('review', compact('restaurants'));
    }

    public function review(Request $request){
        $request->validate([
            'restaurant_id' => 'required',
            'review' => 'required',
            'img' => 'required',
        ]);

        $imageName = time().'.'.$request->img->extension();  
        $request->img->move(public_path('images'), $imageName);

        Review::create([
            'restaurant_id' => $request->restaurant_id,
            'review' => $request->review,
            'img' => $imageName
        ]);

        return redirect('/allReviews');
    }

    public function allReviews(Request $request){
        if ($request->get('search')) {
            $queryString = $request->get('search');
            $restaurant = User::where('restaurant_name', 'LIKE', "%$queryString%")->first();
            $allReviews = Review::where('restaurant_id', $restaurant->id)->get();
        }
        else{
            $allReviews = Review::orderBy('id', 'desc')->get();
        }
        return view('allReviews', compact('allReviews'));
    }

    public function myRestaurantReview(Request $request){
        //dd('ókk');
        //dd(auth()->user()->id);
        //dd($request->user()->id);
        $myRestaurantReview = Review::where('restaurant_id', auth()->user()->id)->get();
        return view('myRestaurantReview', compact('myRestaurantReview'));
    }

    public function reviewUpdate(Request $request, $id){
        $review = Review::find($id);
        Review::where('id', $review->id)->update([
            'comment' => $request->comment
        ]);
        
        return back();
    }

    
}
