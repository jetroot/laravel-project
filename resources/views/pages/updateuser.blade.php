@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="card">
                <div class="card-header">Edit Password</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.user.password', ['userId' => $userId]) }}">
                        @csrf
                        @method('PUT')

                        {{-- old password --}}
                        <div class="form-group row">
                            <label for="old_password" class="col-md-4 col-form-label">Old password</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- new password --}}
                        <div class="form-group row">
                            <label for="new_password" class="col-md-4 col-form-label">New Password</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Confirm new password --}}
                        <div class="form-group row">
                            <label for="password_confirm" class="col-md-4 col-form-label">Confirm password</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password"  class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style='font-size: 15px !important'>
                                Change password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
