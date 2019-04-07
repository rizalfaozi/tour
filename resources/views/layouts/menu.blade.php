
<li class="">
    <a href="{!! url('home') !!}"><i class="fa fa-home"></i><span>Beranda</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-hashtag"></i><span>Kategori</span></a>
</li>

<li class="treeview">
  <a href="#">
    <i class="fa fa-bars"></i>
    <span>List</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
     <li class="{{ Request::is('agents*') ? 'active' : '' }}">
    <a href="{!! route('agents.index') !!}"><i class="fa fa-circle-o"></i><span>Agen</span></a>
</li>
       <li class="{{ Request::is('members*') ? 'active' : '' }}">
    <a href="{!! route('members.index') !!}"><i class="fa fa-circle-o"></i><span>Jama'ah</span></a>
</li>


<li class="{{ Request::is('commissions*') ? 'active' : '' }}">
    <a href="{!! route('commissions.index') !!}"><i class="fa fa-circle-o"></i><span>Komisi</span></a>
</li>
  </ul>
</li>


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




<li class="treeview">
  <a href="#">
    <i class="fa fa-cog"></i>
    <span>Setting</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
   
    <li class="{{ Request::is('roles*') ? 'active' : '' }}">
      <a href="{!! route('roles.index') !!}"><i class="fa fa-circle-o"></i><span>Role</span></a>
    </li>
  </ul>


