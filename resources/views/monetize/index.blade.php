@extends('master.master')

@section('content')


    <strong>First, setup your bank account</strong>
    <small>Where you will recieve funds</small>
    @if($account && $account['transfers_enabled'])
        @include('master.components.done')
    @endif
    <div class="ui segment">
        @include('monetize.account')
    </div>


    @if($account && $account['transfers_enabled'])
        <a href="{{ route('rewards.create' )}}" class="ui button primary">Create a reward</a>
    @endif

@endsection
