<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


@extends('layouts.app')

    @section('content')
        <h2 class="text-center">All users</h2>
        <ul class="list-group py-3 mb-3">

            @forelse($users as $user)

                <li class="list-group-item my-2">
                    <h5>{{ $user->username }}</h5>
                    <a href="{{route('users.show',$user->id)}}">Read More</a>
                </li>

            @empty
                <h4 class="text-center">No users Found!</h4>
            @endforelse
            
        </ul>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>

    @endsection

</body>
</html>