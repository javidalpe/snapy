@if (Auth::check())
    <div class="ui top menu">
        <div class="ui container">
            <a  href="/home" class="item">{{ Auth::user()->email }}</a>
            <a class="item" href="{{ route('rewards.index')}}">Rewards</a>
            <a class="item" href="{{ route('purchases.index')}}">Orders</a>
            <a class="item" href="{{ route('balance.index')}}">Balance</a>
            <div class="right menu">
                <div class="item">
                    <form action="/logout" class="ui form" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="ui button tiny">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
