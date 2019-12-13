@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your account hasn't been verified yet, please check your email for code</div>
                <form action="{{ url('/confirm') }}" method="POST">
                    {{ csrf_field() }}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="confirm_code" class="col-md-4 col-form-label text-md-center">{{ __('Code') }}</label>

                        <div class="col-md-6">
                            <input id="confirm_code" type="text" class="form-control @error('confirm_code') is-invalid @enderror" name="confirm_code" required autocomplete="name">

                            @error('confrim_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Verify') }}
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection