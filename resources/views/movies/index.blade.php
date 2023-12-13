<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Movies</h1>
    <div>
        <div>
            @if(session()->has('sucess'))
                <div>
                    {{ session('sucess') }}
                </div>
            @endif
        </div>
        <div>
            <a href="{{ route('movies.create') }}">Add a new Movie</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Writers</th>
                <th>Stars</th>
                <th>Sypnosis</th>
                <th>Poster Url</th>
                <th>Trailer Url</th>
                <th>Edit</th> 
                <th>Delete</th>                  
            </tr>
            @foreach ($movies as $movie )
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->writers }}</td>
                    <td>{{ $movie->stars }}</td>
                    <td>{{ $movie->sypnosis }}</td>
                    <td>{{ $movie->poster_url }}</td>
                    <td>{{ $movie->trailer_url }}</td>
                    <td>
                        <a href="{{ route('movies.edit', ['movie' => $movie])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('movies.destroy', ['movie' => $movie]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>