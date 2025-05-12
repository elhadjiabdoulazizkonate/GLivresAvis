@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-3xl font-bold text-center text-amber-800">Liste des Utilisateurs</h1>

    @if($users->isEmpty())
        <p class="text-center text-muted">Aucun utilisateur disponible.</p>
    @else
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow rounded-xl bg-gradient-to-br from-yellow-100 to-yellow-300">
                        <div class="card-body">
                            <h5 class="card-title text-xl font-bold text-amber-900">{{ $user->name }}</h5>
                            <p class="card-text text-amber-800">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
