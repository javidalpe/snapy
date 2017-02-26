@extends('master.master')

@section('content')

    @if(!Auth::user()->account_id)
        <div class="ui message warning">
            Setup your bank account to enable thes rewards
        </div>
    @endif

    @forelse (Auth::user()->rewards()->orderBy('amount', 'asc')->get() as $key => $value)
        <div class="ui piled segments ">
        <div class="ui segment {{ !Auth::user()->account_id ? "disabled":"" }}">
            <div class="ui tag labels">
                <h4>{{ $value->description}}
                    <a class="ui label">
                    @money($value->amount)
                    </a>
                </h4>
            </div>
        </div>

        <div class="ui segment {{ !Auth::user()->account_id ? "disabled":"" }}">
            <div class="">
                <p>Link to purchase this reward</p>
            </div>
            <div class="ui action input">
              <input type="text" value="{{ route('purchases.create', $value->id) }}">
              <button class="ui blue right labeled icon button">
                <i class="copy icon"></i>
                Copy
              </button>
            </div>
        </div>


        <div class="ui segment">
            <form class="" action="{{route('rewards.destroy', $value->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
                  @if ($value->purchases()->count() > 0)
                      <a href="{{ route('rewards.show', $value->id)}}" class="ui button tiny blue basic">View purchases</a>
                  @endif

              <input type="submit" name="" value="Delete" class="ui button tiny red basic">
            </form>
        </div>
    </div>
    @empty
        <div class="ui center">
            <h2 class="ui aligned icon header">
                <i class="circular dollar icon"></i>
                You have no rewards
            </h2>
            <a href="{{ route('rewards.create') }}" class="ui aligned button center">Create your first reward</a>
        </div>

    @endforelse

    @if (Auth::user()->rewards()->count() > 0)
        <a href="{{ route('rewards.create') }}" class="ui button">Create other reward</a>
    @endif
@endsection
