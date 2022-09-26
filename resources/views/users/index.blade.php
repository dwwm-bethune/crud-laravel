@extends('layouts.base')

@section('content')
    <div>
        @foreach ($users as $user)
            <div>
                {{ $user->name }}
                
                @if ($user->roles->isNotEmpty())
                a les rôles suivants:
                {{ $user->roles->implode('name', ', ') }}
                @else
                n'a pas de rôles
                @endif

                <a href="{{ route('users.edit', $user) }}">
                    Modifier les rôles
                </a>
            </div>
        @endforeach
    </div>
@endsection
