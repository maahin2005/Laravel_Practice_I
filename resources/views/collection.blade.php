<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Collection</title>
</head>
<body>

<h1>Post Collection Testing</h1>

<h3>Value after 3: {{$afterThree}}</h3>
<h3>Value after 4 strict: {{$strictAfterFour}}</h3>


@if($posts->isEmpty())
    <p>No posts available.</p>
@else
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</body>
</html>
