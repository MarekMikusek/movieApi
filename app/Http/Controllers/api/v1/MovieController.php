<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\StoreMovie;
use App\Movie;
use App\Http\Resources\Movie as MovieResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MovieController extends Controller
{

    public function index()
    {
//        $movies = Movie::paginate(15);
        return MovieResource::collection(Movie::all());
    }

    public function store(StoreMovie $movie)
    {
        $movie = Movie::create($movie->validated());
        return new MovieResource($movie);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return new MovieResource($movie);
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return response()->noContent();
    }

    public function cover(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $cover = $request->file('cover');
        $coverName = "cover_{$id}_".time().'.'.$cover->getClientOriginalExtension();
        $coverUrl = public_path('/covers/'.$coverName);
        $coverImage = Image::make($cover->getRealPath());
        $coverImage->fit(200,200)->save($coverUrl);

        $movie->update(['cover' => $coverUrl]);
        return response()->json(['url'=>$coverUrl], 200);
    }
}
