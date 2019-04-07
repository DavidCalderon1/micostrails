<table class="table table-responsive" id="typeVehicles-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($typeVehicles as $typeVehicle)
        <tr>
            <td>{!! $typeVehicle->name !!}</td>
            <td>
                {!! Form::open(['route' => ['typeVehicles.destroy', $typeVehicle->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('typeVehicles.show', [$typeVehicle->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('typeVehicles.edit', [$typeVehicle->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>