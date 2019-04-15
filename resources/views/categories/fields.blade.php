<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nama Paket:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('type', 'Tipe:') !!}
    {!! Form::select('type', ['0'=>'Pilih type','reguler'=>'Reguler','khusus'=>'Khusus','plus'=>'Plus'] ,null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('price', 'Harga:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('departure_date', 'Keberangkatan:') !!}
    {!! Form::text('departure_date', null, ['class' => 'form-control date']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('flight', 'Penerbangan:') !!}
    {!! Form::text('flight', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('hotel', 'Hotel:') !!}
    {!! Form::text('hotel', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Keterangan:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>


<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('quota', 'Kuota:') !!}
    {!! Form::text('quota', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}<br>
    {{ Form::radio('status', 1, isset($categories) ? $categories->status == 1 : false) }} Publish<br>
    {{ Form::radio('status', 0, isset($categories) ? $categories->status == 0 : true) }} Draft
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Batal</a>
</div>
