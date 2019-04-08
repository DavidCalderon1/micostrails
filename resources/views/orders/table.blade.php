<table class="table table-responsive" id="orders-table">
    <thead>
        <tr>
            <th>Client</th>
            <th>Transporter</th>
            <th>Storage</th>
            <th>Address</th>
            <th>Delivery Date</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Paid</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $orders)
        <tr>
            <td>{!! $users[$orders['client_id']] !!}</td>
            <td>{!! $users[$orders['transporter_id']] !!}</td>
            <td>{!! $storages[$orders['storage_id']] !!}</td>
            <td>{!! $usersAddresses[$orders['users_addresses_id']] !!}</td>
            <td>{!! $orders['delivery_date'] !!}</td>
            <td>{!! $orders['priority'] !!}</td>
            <td>{!! $status[$orders['status_id']] !!}</td>
            <td>{!! ($orders['paid'] ? 'Yes' : 'No') !!}</td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $orders['id']], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.show', [$orders['id']]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('orders.edit', [$orders['id']]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>