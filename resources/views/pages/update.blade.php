@extends('layouts.app')

@section('content')
    @if($isIdExists) 
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
                        <div class="card-header">Edit user data</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('update.user', ['userId' => $userId]) }}">
                                @csrf
                                @method('PUT')

                                {{-- Card id --}}
                                <div class="form-group row">
                                    <label for="cardid" class="col-md-4 col-form-label">Card ID</label>

                                    <div class="col-md-6">
                                        <input id="cardid" type="text" class="form-control @error('cardid') is-invalid @enderror" name="cardid" value="{{ $cardId }}" autocomplete="off" required>

                                        @error('cardid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- First name --}}
                                <div class="form-group row">
                                    <label for="firstname" class="col-md-4 col-form-label">First name</label>

                                    <div class="col-md-6">
                                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $firstName }}"  autocomplete="off" required>

                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Last name --}}
                                <div class="form-group row">
                                    <label for="lastname" class="col-md-4 col-form-label">Last name</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $lastName }}"  autocomplete="off" required>

                                        @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Birthdate --}}
                                <div class="form-group row">
                                    <label for="birthdate" class="col-md-4 col-form-label">Birth date</label>

                                    <div class="col-md-6">
                                        <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ $birthDate }}"  autocomplete="off" required>

                                        @error('birthdate')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Birth place --}}
                                <div class="form-group row">
                                    <label for="birthplace" class="col-md-4 col-form-label">Birth place</label>

                                    <div class="col-md-6">
                                        <input id="birthplace" type="text" class="form-control @error('birthplace') is-invalid @enderror" name="birthplace" value="{{ $birthPlace }}"  autocomplete="off" required>

                                        @error('birthplace')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Father name --}}
                                <div class="form-group row">
                                    <label for="fathername" class="col-md-4 col-form-label">Father name</label>

                                    <div class="col-md-6">
                                        <input id="fathername" type="text" class="form-control @error('fathername') is-invalid @enderror" name="fathername" value="{{ $fatherName }}"  autocomplete="off" required>

                                        @error('fathername')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Mother name --}}
                                <div class="form-group row">
                                    <label for="mothername" class="col-md-4 col-form-label">Mother name</label>

                                    <div class="col-md-6">
                                        <input id="mothername" type="text" class="form-control @error('mothername') is-invalid @enderror" name="mothername" value="{{ $motherName }}"  autocomplete="off" required>

                                        @error('mothername')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Gender --}}
                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label">Gender</label>

                                    <div class="col-md-6">
                                        <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ $gender }}" required>
                                            <option value="{{ $gender }}">{{ $gender }}</option>
                                            <option value="{{ $gender == 'F' ? 'M' : 'F' }}">{{ $gender == 'F' ? 'M' : 'F' }}</option>
                                        </select>

                                        @error('gender')
                                            <strong class="text-danger" style="font-size: 80%">
                                                {{ $message }}
                                            </strong>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label">Address</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $address }}"  autocomplete="off" required>

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- phone --}}
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label">Phone</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $phone }}"  autocomplete="off" required>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- profession --}}
                                <div class="form-group row">
                                    <label for="profession" class="col-md-4 col-form-label">Profession</label>

                                    <div class="col-md-6">
                                        <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ $profession }}"  autocomplete="off" required>

                                        @error('profession')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Note --}}
                                <div class="form-group row">
                                    <label for="note" class="col-md-4 col-form-label">Note</label>

                                    <div class="col-md-6">
                                        <textarea id="note" rows="5" type="text" class="form-control @error('note') is-invalid @enderror" name="note" required>{{ $note }}</textarea>
                                        @error('note')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary w-25">
                                            Edit   
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div style="width: 100%; text-align: center">
            <h1 style="font-size: 1.5rem">مسخدم غير موجود</h1>
        </div>
    @endif
@endsection
