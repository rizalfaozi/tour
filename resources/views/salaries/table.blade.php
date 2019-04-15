<table id="example" class="table  table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
        <th>Agen / Kordinator</th>
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
            <td>@if($salaries->status ==0) Pending Withdraw @elseif($salaries->status ==1) Proses Withdraw @else Sukses Withdraw @endif

             | <a href="{{ url('verifikasi/'.$salaries->user->id.'/'.$salaries->id) }}">Verifikasi</a>
            </td>
            <td>
                <?php if((Auth::user()->role_id ==1)) {?>
                {!! Form::open(['route' => ['salaries.destroy', $salaries->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('salaries.show', [$salaries->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('salaries.edit', [$salaries->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            <?php }else{ ?>

                <a href="{!! route('salaries.show', [$salaries->id]) !!}">Detail</a> 
                @if($salaries->status ==0) 
                 |  <a href="{{ url('withdraw') }}">Withdraw</a>
                @else
                
                 @endif
               

             <?php } ?>
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