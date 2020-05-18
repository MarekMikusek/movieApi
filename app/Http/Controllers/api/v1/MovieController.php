<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\StoreMovie;
use App\Movie;
use App\Http\Resources\Movie as MovieResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

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
}
