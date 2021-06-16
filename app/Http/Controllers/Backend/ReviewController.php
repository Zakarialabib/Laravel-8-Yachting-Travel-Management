<?php

namespace App\Http\Controllers\Backend;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private $review;
    private $response;

    public function __construct(
        Review $review,
        Response $response
    )
    {
        $this->review = $review;
        $this->response = $response;
    }

    public function list()
    {
        $user = User::where('is_admin','=',1)->first();

        $reviews = Review::query()
            ->with('user')
            ->with('place')
            ->get();

        return view('pages.backend.review.review_list', [
            'reviews' => $reviews
        ]);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function destroy(Request $request)
    {
        Review::destroy($request->review_id);
        return back()->with('success', 'Delete review success!');
    }

    public function updateStatus(Request $request)
    {
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $model = Review::find($request->review_id);
        $model->fill($data)->save();

        return $this->response->formatResponse(200, $model, 'Update review status success!');
    }
}