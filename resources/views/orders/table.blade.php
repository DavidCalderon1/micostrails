<table class="table table-responsive" id="orders-table">
    <thead>
        <tr>
            <th>Creator Id</th>
        <th>Client Id</th>
        <th>Transporter Id</th>
        <th>Users Addresses Id</th>
        <th>Delivery Date</th>
        <th>Priority</th>
        <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $orders)
        <tr>
            <td>{!! $orders->creator_id !!}</td>
            <td>{!! $orders->client_id !!}</td>
            <td>{!! $orders->transporter_id !!}</td>
            <td>{!! $orders->users_addresses_id !!}</td>
            <td>{!! $orders->delivery_date !!}</td>
            <td>{!! $orders->priority !!}</td>
            <td>{!! $orders->status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $orders->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.show', [$orders->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('orders.edit', [$orders->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>