@extends('master.master')

@section('content')

    <div class="ui segments">
        <div class="ui segment">
            <h4>{{ $reward->description}}</h4>
        </div>
    </div>

    @include('purchase.tables')

@endsection
