
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search users"> <span class="input-group-btn">

            <button type="submit"   class="btn btn-dark">
                <span class="glyphicon glyphicon-search"></span> Search
            </button>
        </span>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Passport Office</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($passports as $passport)
            @php
                $date=date('Y-m-d', $passport['date']);

            @endphp
            <tr>
                <td>{{$passport['id']}}</td>
                <td>{{$passport['name']}}</td>

                <td>{{$date}}</td>
                <td>{{$passport['email']}}</td>
                <td>{{$passport['number']}}</td>
                <td>{{$passport['office']}}</td>


                <td><a href="{{action('PassportController@edit', $passport['id'])}}" class="btn btn-warning">Edit</a></td>

                <td><a href="{{action('PassportController@showsingle', $passport['id'])}}" class="btn btn-primary">Reade</a></td>
                <td>
                    <form action="{{action('PassportController@destroy', $passport['id'])}}" method="post">

                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

            <td><a href="{{action('PassportController@showlist')}}" class="btn btn-warning">All Users</a>
                <a href="{{action('PassportController@create')}}" class="btn btn-success">Create</a>
            </td>


        </tbody>
    </table>
</div>
</body>
</html>
