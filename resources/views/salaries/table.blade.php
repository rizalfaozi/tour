<table class="table table-responsive" id="salaries-table">
    <thead>
        <tr>
        <th>Agen / Perwakilan</th>
        <th>Total Gaji</th>
        <th>Komisi</th>
        <th>Total Closing</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($salaries as $salaries)
        <tr>
            <td>{!! $salaries->user->name !!}</td>
            <td>Rp {!! number_format($salaries->total,2,',','.')   !!}</td>
            <td>Rp {!! number_format($salaries->commission,2,',','.')   !!}</td>
            <td>{!! $salaries->count !!} Jama'ah</td>
            <td>@if($salaries->status ==0) Pending @else Sukses @endif</td>
            <td>
                {!! Form::open(['route' => ['salaries.destroy', $salaries->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('salaries.show', [$salaries->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('salaries.edit', [$salaries->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>