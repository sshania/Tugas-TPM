<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;
use App\Models\MaturityRating;
use App\Models\FilmStatus;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('films.index',[
            'films' => Films::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maturity = MaturityRating::all();
        $filmstatus =FilmStatus::all();


        return view('films.create',[
            'maturity' => $maturity,
            'filmstatus' => $filmstatus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'FilmName' => 'required|string',
            'FilmDirector' => 'required|string',
            'MaturityRating' => 'required|numeric',
            'FilmDuration' => 'required|numeric',
            'FilmStatusId' => 'required|numeric',
            'FilmSynopsis' => 'required|string',
            'FilmWriter' => 'required|string',
            'FilmPoster' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
        

        //Upload Image
        $imageName = time().'.' .$request->FilmPoster->extension();
        $request->FilmPoster->move(public_path('poster'), $imageName);

        $ms_films = new Films();
        $ms_films->FilmPoster = $imageName;
        $ms_films->FilmName = $request->FilmName;
        $ms_films->FilmDirector=$request->FilmDirector;
        $ms_films->MaturityRatingId = $request->MaturityRating;
        $ms_films->FilmDuration = $request->FilmDuration;
        $ms_films->FilmStatusID = $request->FilmStatusId;
        $ms_films->FilmSynopsis = $request->FilmSynopsis;
        $ms_films->FilmWriter = $request->FilmWriter;
        $ms_films->save();

        return back()->withSuccess('New Film Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ms_films = Films::where('id',$id)->first();
        $maturity = MaturityRating::all();
        $filmstatus =FilmStatus::all();

        return view('films.edit', [
            'films' => $ms_films,
            'maturity' => $maturity,
            'filmstatus' => $filmstatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'FilmName' => 'required|string',
            'FilmDirector' => 'required|string',
            'MaturityRating' => 'required|numeric',
            'FilmDuration' => 'required|numeric',
            'FilmStatusId' => 'required|numeric',
            'FilmSynopsis' => 'required|string',
            'FilmWriter' => 'required|string',
            'FilmPoster' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
        $ms_films = Films::where('id',$id)->first();

        if(isset($request->FilmPoster))
        {
            $imageName = time().'.' .$request->FilmPoster->extension();
            $request->FilmPoster->move(public_path('poster'), $imageName);
            $ms_films->FilmPoster = $imageName;
        }
        
        $ms_films->FilmName = $request->FilmName;
        $ms_films->FilmDirector=$request->FilmDirector;
        $ms_films->MaturityRatingId = $request->MaturityRating;
        $ms_films->FilmDuration = $request->FilmDuration;
        $ms_films->FilmStatusID = $request->FilmStatusId;
        $ms_films->FilmSynopsis = $request->FilmSynopsis;
        $ms_films->FilmWriter = $request->FilmWriter;
        $ms_films->save();

        return back()->withSuccess('New Film Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $ms_films=Films::where('id', $id)->first();
       $ms_films->delete();
       return back()->withSuccess('Film Delete Success');
    }
}
