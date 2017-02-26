@extends('master.master')

@section('content')
    <div class="ui piled segment" style="margin-top:20px">
        <h4 class="ui header">Create a reward</h4>
        <form class="ui form" action="{{route('rewards.store')}}" method="post">
            {{ csrf_field() }}

            <div class="field">
                <label>Describe your reward</label>
                <small>This is what you offer to your followers</small>
                <input type="text" name="description" required placeholder="Special selfie">
            </div>
            <div class="field">
                <label>Price</label>
                <small>This is what you get</small>
                <div class="ui right labeled input">
                    <div class="ui label">$</div>
                    <input type="text" name="amount" required placeholder="10.00">
                </div>
            </div>
            <div class="ui field">
              @include('master.components.submit',['class' => 'primary', 'label' => 'Submit']) <a href="/">Cancel</a>
            </div>


        </form>
    </div>
@endsection
