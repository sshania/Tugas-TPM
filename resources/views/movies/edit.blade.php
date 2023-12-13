<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Movie</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('movies.update',['movie' => $movie]) }}">
        @csrf
        @method('put')
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Title Movie" value="{{ $movie->title }}"/>
        </div>
        <div>
            <label>Writers</label>
            <input type="text" name="writers" placeholder="Writers Movie" value="{{ $movie->writers }}"/>
        </div>
        <div>
            <label>Stars</label>
            <input type="text" name="stars" placeholder="Stars Movie" value="{{ $movie->stars }}"/>
        </div>
        <div>
            <label>Sypnosis</label>
            <input type="text" name="sypnosis" placeholder="Sypnosis Movie" value="{{ $movie->sypnosis }}"/>
        </div>
        <div>
            <label>Poster Link</label>
            <input type="text" name="poster_url" placeholder="Poster Movie" value="{{ $movie->poster_url }}"/>
        </div>
        <div>
            <label>Trailer Link</label>
            <input type="text" name="trailer_url" placeholder="Trailer Movie" value="{{ $movie->trailer_url}}"/>
        </div>
        <div>
            <input type="submit" value="Update"/>            
        </div>
    </form>
</body>
</html>