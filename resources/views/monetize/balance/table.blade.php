<strong>Account balance</strong>
<table class="ui table compact">
  <thead>
    <tr>
      <th>Type</th>
      <th>Net</th>
      <th>Amount</th>
      <th>Fee</th>
      <th>Available on</th>
    </tr></thead>
    <tbody>
      @foreach ($balance as $item)
        <tr>
          <td>{{ $item->type}}</td>
          <td>
            @stripe($item->net)
          </td>
          <td>
            @stripe($item->amount)
          </td>

          <td>
            (@stripe($item->fee))
          </td>
          <td>
             @date($item->available_on)
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
