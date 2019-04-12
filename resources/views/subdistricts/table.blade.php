<table class="table table-responsive" id="subdistricts-table">
    <thead>
        <tr>
            <th>Kabupaten</th>
        <th>Kecamatan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subdistricts as $subdistricts)
        <tr>
            <td>{!! $subdistricts->district->name !!}</td>
            <td>{!! $subdistricts->name !!}</td>
            <td>
                {!! Form::open(['route' => ['subdistricts.destroy', $subdistricts->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subdistricts.show', [$subdistricts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subdistricts.edit', [$subdistricts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>