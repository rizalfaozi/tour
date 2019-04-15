<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Judul Iklan:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Tgl Mulai:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control date']) !!}
</div>

<!-- Finish Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finish_date', 'Tgl Berahir:') !!}
    {!! Form::text('finish_date', null, ['class' => 'form-control date']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}<br>
</div>

<?php if(Request::segment(2) !="create"){?>
<?php if(isset($advertisements) ? $advertisements->photo != '' : true){?>
<div class="form-group col-sm-6">
   
   <img width="100"  src="{{ isset($advertisements) ? '/'.$advertisements->photo : true  }}">
</div>

<?php } }?>   

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}<br>
    {{ Form::radio('status', 1, isset($advertisements) ? $advertisements->status == 1 : false) }} Publish<br>
    {{ Form::radio('status', 0, isset($advertisements) ? $advertisements->status == 0 : true) }} Draft <br>

    {{ Form::radio('status', 2, isset($advertisements) ? $advertisements->status == 2 : false) }} Non Aktif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('advertisements.index') !!}" class="btn btn-default">Batal</a>
</div>



