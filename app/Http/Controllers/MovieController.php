<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index',['movies' =>$movies]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $data= $request->validate([
            'title' => 'required',
            'writers' => 'required',
            'stars' => 'required',
            'sypnosis'=>'nullable',
            'poster_url'=> 'nullable',
            'trailer_url' => 'nullable',
        ]);

        $newMovie = Movie::create($data);

        return redirect(route('movies.index'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    public function update(Movie $movie, Request $request)
    {
        $data= $request->validate([
            'title' => 'required',
            'writers' => 'required',
            'stars' => 'required',
            'poster_url'=>'nullable',
            'trailer_url'=>'nullable',
            'sypnosis'=>'nullable',
        ]);

        $movie->update($data);

        return redirect(route('movies.index'))->with('sucess', 'Movie Updated Succesfuly');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect(route('movies.index'))->with('sucess', 'Movie Deleted Succesfuly');
    }
}