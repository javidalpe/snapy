<div class="ui container">
    <div class="ui large inverted secondary menu">
        <a class="ui item inverted">Snapy</a>
        <div class="right item">
            @if (Auth::check())
              <a href="/home" class="ui inverted button">Home</a>
            @else
              <a href="/login" class="ui inverted button">Log in</a>
                <a href="/register" class="ui inverted button">Register</a>
            @endif
        </div>
    </div>
</div>
