<table class="table table-responsive" id="invoices-table">
    <thead>
        <tr>
        <th>Paket</th>
        <th>Jama'ah</th>
        <th>Agen / perwakilan</th>
        <th>Dibayarkan (Rp)</th>
        <th>Total (Rp)</th>
        <th>Type</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoices)
        <tr>
            <td>{!! $invoices->category->name !!}</td>
            <td>{!! $invoices->member->first_name.' '.$invoices->member->last_name !!}</td>
            <td>{!! $invoices->user->name !!}</td>
            <td>Rp {!! number_format($invoices->price,0,'','.')!!}</td>
            <td>Rp {!! number_format($invoices->total,0,'','.')!!}</td>
            <td>@if($invoices->type =='dp') DP @else Lunas @endif</td>
            <td>@if($invoices->status ==1) Publish @else Draft @endif</td>
            <td>
                {!! Form::open(['route' => ['invoices.destroy', $invoices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('invoices.show', [$invoices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('invoices.edit', [$invoices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>