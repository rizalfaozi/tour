<table  id="example" class="table  table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
           
        <th>Kode Invoice</th>
        <th>Nama Lengkap</th>
        <th>Phone</th>
        <th>Umur</th>
        <th>No KTP</th>
         <th>Keberangkatan</th>
         <th>Kantor Agen / Kordinator</th>
         <th>Nama Agen / Kordinator</th>
       
      
        <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            
            <td>{!! $member->invoice_id !!} </td>  
            <td>{!! $member->first_name !!} {!! $member->last_name !!}</td>
            <td>{!! $member->phone !!} </td>
             <td>{!! $member->age !!} </td>
             <td>{!! $member->id_card !!} </td>
            <td>{!! convert($member->departure_date) !!} </td>
            <td>{!! $member->office_name !!} </td>
            <td>{!! $member->agen !!} </td>
              
            
          
            <td>
               <a href="#"> Detail</a> | <a href="{{ url('pindah/jamaah/'.$member->member_id) }}">Pindahkan</a>
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