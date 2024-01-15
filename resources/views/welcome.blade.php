@extends('layouts.master')

@section('title', 'Dobrodošli')



@section('content')
    <h4>eAsistent - Strokovna naloga</h4>
    <h5>Nina Lušin</h5>

    <p>Dobrodošli na spletno stran moje strokovne naloge - Nakupovalni listek.</p>
    <p>Za ogled nakupovalnega listka se ni potrebno prijaviti.</p>
    <p>Če želite urejati nakupovalni listek, se najprej registrirajte, nato pa prijavite z vašim uporabnikom.</p>

    @if(session('success'))
        <div class="row">
        <div class="col s12 m6">
            <div class="card green lighten-1">
                <div class="card-content white-text">

                    <p class="mb-0">{{session('success')}}</p>

                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
