<table class="table table-responsive" id="usersAddresses-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Address</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>City Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usersAddresses as $usersAddresses)
        <tr>
            <td>{!! $usersAddresses->user_id !!}</td>
            <td>{!! $usersAddresses->address !!}</td>
            <td>{!! $usersAddresses->latitude !!}</td>
            <td>{!! $usersAddresses->longitude !!}</td>
            <td>{!! $usersAddresses->city_id !!}</td>
            <td>
                {!! Form::open(['route' => ['usersAddresses.destroy', $usersAddresses->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('usersAddresses.show', [$usersAddresses->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('usersAddresses.edit', [$usersAddresses->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>