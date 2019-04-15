<table id="example" class="table  table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Berangkat</th>
            <th>Penerbangan</th>
            <th>Hotel</th>
            <th>Kuota</th>
            <th>Status</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $categories)
        <tr>
            <td>{!! $categories->name !!}</td>
            <td>Rp {!! number_format($categories->price,2,',','.') !!}</td>
            <td>{!! convert($categories->departure_date) !!} </td>
            <td>{!! $categories->flight !!}</td>
            <td>{!! $categories->hotel !!}</td>
            <td>{!! $categories->quota !!} Jama'ah</td>
             <td>  @if($categories->status>0)
               Publish
             @else
                Draft
             @endif</td>
            <td>
                {!! Form::open(['route' => ['categories.destroy', $categories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categories.show', [$categories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categories.edit', [$categories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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