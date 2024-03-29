@extends('layouts.master')

@section('title', 'Testna stran')



@section('content')
    <h4>Testna stran - komponente</h4>

    <div class="row">
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Test spremenljivk</span>
                    @isset($pageConfigs['variableTest'])
                        <p class="mb-0">Preveri delovanje spremenljivk: <span class="fw-semibold"> {{ $pageConfigs['variableTest'] }}</span></p>
                    @endisset

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Test povezave na bazo</span>
                    @isset($pageConfigs['connection_test'])
                        <p class="mb-0">Preveri povezavo na podatkovno bazo: <span class="fw-semibold"> {{ $pageConfigs['connection_test'][0]['text'] }}</span></p>
                    @endisset
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Test prijave uporabnika</span>
                        <p class="mb-0">Status prijave uporabnika: <span class="fw-semibold"> {{ $pageConfigs['logged_in'] ? "Uporabnik je prijavljen." : "Uporabnik ni prijavljen."}}</span></p>
                </div>
            </div>
        </div>
    </div>


    <div id="app">
        <example-component></example-component>
    </div>




@endsection
