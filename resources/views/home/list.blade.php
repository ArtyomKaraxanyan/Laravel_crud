
@extends('layout')


@section('content')

            <h2>Users</h2>

              <ul>
                  @foreach($passports as $passport)
                    <li>
                        <a href={{action('PassportController@showsingle',$passport['id'])}}> {{ $passport['name'] }} </a>
                    </li>
                @endforeach
            </ul>
    @endsection

