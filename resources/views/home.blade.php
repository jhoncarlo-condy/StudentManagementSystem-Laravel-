@extends('layouts.app')

@section('homecontent')
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
                </div>
                <div class="mb-2 text-right mr-2">
                    <a href="{{ route('students.index') }}">
                        <button class="btn btn-primary">
                            Manage Students
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
