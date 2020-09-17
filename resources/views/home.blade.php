@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <ul>
                        <li>Franck</li>
                    </ul>
                    @if(auth::user()->role_id < 1)
                        <ul>
                            <li>Ange</li>
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
