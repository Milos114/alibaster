<div>
    @if ($orders->count())
        <h4>Last 3 purchases</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Currency</th>
                <th scope="col">Surchange amount</th>
                <th scope="col">Amount purchased</th>
                <th scope="col">Amount in USD</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->rate->currency}}</th>
                    <td>{{$order->surchange_amount}}</td>
                    <td>{{$order->amount_purchased}}</td>
                    <td>{{$order->amount_in_usd}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</div>
