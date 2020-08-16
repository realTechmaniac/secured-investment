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

                    {{ __('You are logged in!') }}<br>
                    {{auth()->user()->bankDetail->full_name}}<br>
                    {{auth()->user()->bankDetail->bank_name}}<br>
                    {{auth()->user()->bankDetail->account_number}}<br>
                    {{auth()->user()->bankDetail->account_type}}<br>
                    {{auth()->user()->first_name}}<br>
                    {{auth()->user()->last_name}}<br>
                    {{auth()->user()->gender}}<br>
                    {{auth()->user()->email}}<br>
                    {{auth()->user()->username}}<br>
                    {{auth()->user()->phone_number}}<br>
                    http://127.0.0.1:8000/register/{{auth()->user()->referrerDetail->referrer_link}}<br>
                    {{auth()->user()->referrerDetail->referrer_balance}}<br>
                    Referred from: {{$ref}}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
