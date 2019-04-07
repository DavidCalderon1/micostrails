<table class="table table-responsive" id="storages-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>City Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($storages as $storages)
        <tr>
            <td>{!! $storages->name !!}</td>
            <td>{!! $storages->city_id !!}</td>
            <td>
                {!! Form::open(['route' => ['storages.destroy', $storages->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('storages.show', [$storages->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('storages.edit', [$storages->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>