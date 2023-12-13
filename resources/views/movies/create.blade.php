<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a Movie</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('movies.store') }}">
        @csrf
        @method('post')
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Title Movie"/>
        </div>
        <div>
            <label>Writers</label>
            <input type="text" name="writers" placeholder="Writers Movie"/>
        </div>
        <div>
            <label>Stars</label>
            <input type="text" name="stars" placeholder="Stars Movie"/>
        </div>
        <div>
            <label>Sypnosis</label>
            <input type="text" name="sypnosis" placeholder="Sypnosis Movie"/>
        </div>
        <div>
            <label>Poster Link</label>
            <input type="text" name="poster_url" placeholder="Poster Movie"/>
        </div>
        <div>
            <label>Trailer Link</label>
            <input type="text" name="trailer_url" placeholder="Trailer Movie"/>
        </div>
        <div>
            <input type="submit" value="Save a New Movie"/>            
        </div>
    </form>
</body>
</html>