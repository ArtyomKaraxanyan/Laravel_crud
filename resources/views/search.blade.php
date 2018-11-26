

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search users">  <span class="input-group-btn">
            <button type="submit" class="btn btn-dark">Search
                <span class="glyphicon glyphicon-search"></span>
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
        @if(isset($details))
                <div>
                    <h4> The Search results for your query <b> {{ $query }} </b> are :</h4>

                </div>
            @foreach($details as $user)
                @php
                    $date=date('Y-m-d', $user['date']);
                @endphp

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>

                    <td>{{$date}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->number}}</td>
                    <td>{{$user->office}}</td>


                    <td><a href="{{action('PassportController@edit', $user['id'])}}" class="btn btn-warning">Edit</a></td>

                    <td><a href="{{action('PassportController@showsingle', $user['id'])}}" class="btn btn-primary">Reade</a></td>
                    <td>
                        <form action="{{action('PassportController@destroy', $user['id'])}}" method="post">

                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        @elseif(isset($message))

            <p>  {{ $message}}  </p>


        @endif

        <td><a href="{{action('PassportController@showlist')}}" class="btn btn-warning">All Users</a>
            <a href="{{action('PassportController@create')}}" class="btn btn-success">Create</a>
            <a  href="{{url('http://laravel.local/passports')}}" class="btn btn-success" > Go Back  </a>
        </td>



        </tbody>
    </table>
</div>
</body>
</html>
