<table class="table table-responsive" id="vehicles-table">
    <thead>
        <tr>
            <th>Type Vehicle Id</th>
        <th>Brand</th>
        <th>Model</th>
        <th>License Plate</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($vehicles as $vehicles)
        <tr>
            <td>{!! $type_vehicles[$vehicles['type_vehicle_id']] ?? '' !!}</td>
            <td>{!! $vehicles['brand'] !!}</td>
            <td>{!! $vehicles['model'] !!}</td>
            <td>{!! $vehicles['license_plate'] !!}</td>
            <td>
                {!! Form::open(['route' => ['vehicles.destroy', $vehicles['id']], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vehicles.show', [$vehicles['id']]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('vehicles.edit', [$vehicles['id']]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>