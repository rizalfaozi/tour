
<li class="">
    <a href="{!! url('home') !!}"><i class="fa fa-home"></i><span>Beranda</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-hashtag"></i><span>Paket</span></a>
</li>

<li class="treeview">
  <a href="#">
    <i class="fa fa-usd"></i>
    <span>Pembayaran</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">

     <li class="{{ Request::is('invoices*') ? 'active' : '' }}">
    <a href="{!! route('invoices.index') !!}"><i class="fa fa-circle-o"></i><span>Invoice Jama'ah</span></a></li>

    <li class="{{ Request::is('salaries*') ? 'active' : '' }}">
    <a href="{!! route('salaries.index') !!}"><i class="fa fa-circle-o"></i><span>Gaji Agen</span></a>
</li>
 
   

    
  </ul>

<li class="treeview">
  <a href="#">
    <i class="fa fa-bars"></i>
    <span>List</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
   <ul class="treeview-menu">
  <?php if((Auth::user()->role_id ==3) || (Auth::user()->role_id ==2)) {?>
      <li class="{{ Request::is('invoices*') ? 'active' : '' }}">
    <a href="{!! route('invoices.index') !!}"><i class="fa fa-circle-o"></i><span>Invoices</span></a>
</li>

        <li class="{{ Request::is('members*') ? 'active' : '' }}">
    <a href="{!! route('members.index') !!}"><i class="fa fa-circle-o"></i><span>Jama'ah</span></a>
        </li>

   <?php } else { ?>
      
     <li class="{{ Request::is('agents*') ? 'active' : '' }}">
    <a href="{!! url('agents?type=agen') !!}"><i class="fa fa-circle-o"></i><span>Agen</span></a>
   </li>

   <li class="{{ Request::is('agents*') ? 'active' : '' }}">
    <a href="{!! url('agents?type=perwakilan') !!}"><i class="fa fa-circle-o"></i><span>Perwakilan</span></a>
   </li>

       <li class="{{ Request::is('members*') ? 'active' : '' }}">
    <a href="{!! route('members.index') !!}"><i class="fa fa-circle-o"></i><span>Jama'ah</span></a>

</li>




  
<?php }?> 


</ul> 
</li>

 <?php if(Auth::user()->role_id ==1) {?>

<li class="treeview">
  <a href="#">
    <i class="fa fa-location-arrow"></i>
    <span>Lokasi</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
   
<li class="{{ Request::is('provinces*') ? 'active' : '' }}">
    <a href="{!! route('provinces.index') !!}"><i class="fa fa-circle-o"></i><span>Provinsi</span></a>
</li>
<li class="{{ Request::is('districts*') ? 'active' : '' }}">
    <a href="{!! route('districts.index') !!}"><i class="fa fa-circle-o"></i><span>Kabupaten</span></a>
</li>

<li class="{{ Request::is('subdistricts*') ? 'active' : '' }}">
    <a href="{!! route('subdistricts.index') !!}"><i class="fa fa-circle-o"></i><span>Kecamatan</span></a>
</li>
<li class="{{ Request::is('villages*') ? 'active' : '' }}">
    <a href="{!! route('villages.index') !!}"><i class="fa fa-circle-o"></i><span>Kelurahan</span></a>
</li>


  </ul>
</li>

<?php } ?>


<?php if((Auth::user()->role_id ==1)) {?>
<li class="treeview">
  <a href="#">
    <i class="fa fa-cog"></i>
    <span>Setting</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
     <li class="{{ Request::is('agents*') ? 'active' : '' }}">
    <a href="{!! url('agents?type=admin') !!}"><i class="fa fa-circle-o"></i><span>Admin</span></a>
   </li>

     <li class="{{ Request::is('agents*') ? 'active' : '' }}">
    <a href="{!! url('agents?type=hrd') !!}"><i class="fa fa-circle-o"></i><span>HRD</span></a>
   </li>

    <li class="{{ Request::is('roles*') ? 'active' : '' }}">
      <a href="{!! route('roles.index') !!}"><i class="fa fa-circle-o"></i><span>Role</span></a>
    </li>
  </ul>

<?php } ?>



