@extends('master.master')

@section('content')
    <div class="ui piled segment">
        <h4 class="ui header">Create a reward</h4>
        <form class="ui form" action="{{route('rewards.store')}}" method="post">
            {{ csrf_field() }}

            <div class="field">
                <label>Describe your reward</label>
                <small>This is what you offer</small>
                <input type="text" name="description" required placeholder="Dedicated photo">
            </div>
            <div class="field">
                <label>Reward cost</label>
                <small>This is what you get</small>
                <div class="ui right labeled input">
                    <div class="ui label">$</div>
                    <input type="text" name="amount" required placeholder="10.00">
                </div>
            </div>
            <div class="ui field">
              @include('master.components.submit',['class' => 'primary', 'label' => 'Submit'])
            </div>

            <a href="/">Cancel</a>
        </form>
    </div>
@endsection
