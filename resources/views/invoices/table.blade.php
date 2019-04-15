<table  id="example" class="table  table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
        <th>Kode Invoices</th>   
        <th>Paket</th>
        <th>Jama'ah</th>
        <th>Pembayaran</th>

        <th>Dibayarkan (Rp)</th>
        <th>Total (Rp)</th>
        <th>Type</th>
        <th>Status</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoices)
        <tr>
            <td>{!! $invoices->invoice_number !!}</td>
            <td>{!! $invoices->category->name !!}</td>
            <td>{!! $invoices->member->first_name.' '.$invoices->member->last_name !!} | {!! $invoices->user->name !!}</td>
            <td>
                <span style='text-transform:capitalize;'>
                @if($invoices->payment =="cash")

                  {{ $invoices->payment }}
                @else

                  {{ $invoices->payment }} | {{ $invoices->account_number }}
                @endif
            </span>
            </td>
            <td>Rp {!! number_format($invoices->price,0,'','.')!!}</td>
            <td>Rp {!! number_format($invoices->total,0,'','.')!!}</td>
            <td>@if($invoices->type =='dp') DP @else Lunas @endif</td>
            <td>@if($invoices->status ==1) Publish @else Draft @endif</td>
            <td>
                <?php if((Auth::user()->role_id ==1)) {?>

                {!! Form::open(['route' => ['invoices.destroy', $invoices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('invoices.show', [$invoices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                   
                
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
               
                </div>
                {!! Form::close() !!}
                <?php }else{?>
                    <a href="{!! route('invoices.show', [$invoices->id]) !!}">Detail</a>
                 <?php }?>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<style type="text/css">
    #example_paginate .pagination{
         margin: 0px 0;
         position: relative;
         top:-6px;
        float: right;
    }   
</style>


