@extends('master.master')

@section('content')

    @if(!Auth::user()->account_id)
        <div class="ui message warning">
            Setup your bank account to enable money transfers
        </div>
    @endif

  @include('monetize.balance.table')
@endsection
