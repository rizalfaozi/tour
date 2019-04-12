<table class="table table-responsive" id="villages-table">
    <thead>
        <tr>
            <th>Kecamatan</th>
        <th>Kelurahan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($villages as $villages)
        <tr>
            <td>{!! $villages->subdistrict->name !!}</td>
            <td>{!! $villages->name !!}</td>
            <td>
                {!! Form::open(['route' => ['villages.destroy', $villages->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('villages.show', [$villages->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('villages.edit', [$villages->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>