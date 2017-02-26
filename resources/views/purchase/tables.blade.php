<h4>Pending to reward user</h4>
<table class="ui very compact table">
    <thead>
        <tr><th>When</th>
            <th>To</th>
            <th>Reward</th>
            <th>Actions</th>
        </tr></thead>
        <tbody>
            @foreach($pending as $purchase)
                <tr>
                    <td>{{ $purchase->created_at }}</td>
                    <td>{{ $purchase->username }}</td>
                    <td>{{ $purchase->reward->description }}</td>
                    <td>            <form class="" action="{{route('purchases.update', $purchase->id) }}" method="post">
                                  {{ csrf_field() }}
                                  {{ method_field('PUT') }}
                                  <input type="hidden" name="status" value="done">
                                  <input type="submit" name="" value="Done!" class="ui button tiny teal basic">
                                </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Completed</h4>
    <table class="ui very compact table">
        <thead>
            <tr><th>When</th>
                <th>To</th>
                <th>Reward</th>
            </tr></thead>
            <tbody>
                @foreach($done as $purchase)
                    <tr>
                        <td>{{ $purchase->created_at }}</td>
                        <td>{{ $purchase->username }}</td>
                        <td>{{ $purchase->reward->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
