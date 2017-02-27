@extends('master.master')

@section('content')
        <div class="ui piled segment" style="margin-top: 20px">
            <h4 class="ui header">{{ $reward->user->name }}: {{ $reward->description }}  @money($reward->amount)</h4>

            <form class="ui form" action="{{route('purchases.store', $id)}}" method="post">
                {{ csrf_field() }}

                <div class="field">
                    <label>Your snapchat username</label>
                    <input type="text" name="username" required placeholder="Username">
                </div>

                <div class="field">
                    <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ config('services.stripe.key') }}"
                    data-amount="{{ ($reward->amount * 100.0) }}"
                    data-name="{{ $reward->user->name }}"
                    data-description="{{ $reward->description }}"
                    data-locale="auto"
                    data-zip-code="false"
                    data-allow-remember-me="false">
                    </script>
                </div>
            </form>
        </div>
        
        <div style="margin-top:60px;text-align:center;">
          <a href="/" style="color:grey">Monetize your own account...</a>
        </div>
@endsection
