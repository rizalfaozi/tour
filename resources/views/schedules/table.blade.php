<table id="example" class="table  table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Jama'ah</th>
        <th>Kode Invoice</th>
        <th>Paket</th>
        <th>Keberangkatan</th>
        <th>Pesawat</th>
        <th>Tujuan</th>
        <th>Hotel</th>
        <th>Status</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($schedules as $schedules)
        <tr>
            <td>{!! $schedules->member->first_name !!} {!! $schedules->member->last_name !!}</td>
            <td>{!! $schedules->invoice_id !!}</td>
            <td>{!! $schedules->category->name !!}</td>
            <td>{!! convert($schedules->departure_date) !!}</td>
            <td>{!! $schedules->flight !!}</td>
            <td>{!! $schedules->airport !!}</td>
             <td>{!! $schedules->hotel !!}</td>
            <td>@if($schedules->status==0) Tunda @else Sesuai Jadwal | <a href="{{ url('pindah/alumni/'.$schedules->member_id) }}">Jadikan Alumni</a> @endif</td>
            <td>
                {!! Form::open(['route' => ['schedules.destroy', $schedules->id], 'method' => 'delete']) !!} 
                <div class='btn-group'>
                    <a href="{!! route('schedules.show', [$schedules->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('schedules.edit', [$schedules->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
<?php 

 function convert($tgl, $hari_tampil = true){

        $bulan  = array("Januari"
                        , "Februari"
                        , "Maret"
                        , "April"
                        , "Mei"
                        , "Juni"
                        , "Juli"
                        , "Agustus"
                        , "September"
                        , "Oktober"
                        , "November"
                        , "Desember");
        $hari   = array("Senin"
                        , "Selasa"
                        , "Rabu"
                        , "Kamis"
                        , "Jumat"
                        , "Sabtu"
                        , "Minggu");
        $tahun_split    = substr($tgl, 0, 4);
        $bulan_split    = substr($tgl, 5, 2);
        $hari_split     = substr($tgl, 8, 2);
        $tmpstamp       = mktime(0, 0, 0, $bulan_split, $hari_split, $tahun_split);
        $bulan_jadi     = $bulan[date("n", $tmpstamp)-1];
        $hari_jadi      = $hari[date("N", $tmpstamp)-1];
        if(!$hari_tampil)
        $hari_jadi="";
       // return $hari_jadi.", ".$hari_split." ".$bulan_jadi." ".$tahun_split;
        return $hari_split." ".$bulan_jadi." ".$tahun_split;
    }  

?>