<table id="example" class="table  table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
        <th>Photo</th>
        <th>Nama Kantor</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Telp</th>
         <th>Jenis Kelamin</th>
        <th>Bank</th>
        <th>No Rekening</th>
       
        <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($agents as $agents)
        <tr>
            <td><img width="50" height="50"  src="@if(isset($agents) ? $agents->photo != '' : false){!! $agents->photo !!}@else {{ asset('files/photo/default.png') }}  @endif" />
            </td>
            <td>{!! $agents->office_name !!}</td>
            <td>{!! $agents->name !!}</td>
            <td>{!! $agents->email !!}</td>
            <td>{!! $agents->phone !!}</td>
             <td>{!! $agents->gender !!}</td>
            <td>{!! $agents->bank !!}</td>
            <td>{!! $agents->account_number !!}</td>
          
           
            
            <td> @if($agents->status>0)
               Aktif
             @else
                Non Aktif
             @endif</td>
            <td>
                {!! Form::open(['route' => ['agents.destroy', $agents->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('agents.show', [$agents->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! url('agents/'.$agents->id.'/edit?type='.$type) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
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