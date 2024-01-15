@extends('layouts.master')

@section('title', 'Registracija')



@section('content')
    <div class="center-align">
        <h4>Registracija</h4>

        <div class="row">
            <div class="col m3 s0"></div>
            <div class="col m6 s12 ">
                <div class="card-panel custom-color-main rounded-corners">
                    <span class="white-text">
                        <!-- START registration form -->
                        <form action="{{ route('register-store') }}" method="post" novalidate >
                            @csrf
                            <!-- Name -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <label label for="name" class="custom-label">Ime</label>
                                    <input placeholder="Ime" id="name" type="text" class="custom-input validate" id="name" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="helper-text red lighten-1 white-text" data-error="wrong">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <label label for="email" class="custom-label">Email</label>
                                    <input placeholder="naslov@domena.si" id="email" type="email" class="custom-input validate" id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="helper-text red lighten-1 white-text" data-error="wrong">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <label label for="password" class="custom-label">Geslo</label>
                                    <input placeholder="Geslo" id="password" type="password" class="custom-input validate" id="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="helper-text red lighten-1 white-text" data-error="wrong">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Password Confirmation -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <label label for="password_confirmation" class="custom-label">Ponovno vnesite geslo</label>
                                    <input placeholder="Geslo" id="password_confirmation" type="password" class="custom-input validate" id="password_confirmation" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="helper-text red lighten-1 white-text" data-error="wrong">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <button class="btn waves-effect waves-light white custom-text-color-main" type="submit" name="action">Registriraj se
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                        <!-- END registration form -->
                    </span>
                </div>
            </div>
            <div class="col m3 s0"></div>
    </div>
@endsection
