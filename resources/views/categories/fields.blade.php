<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Nama Paket:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('price', 'Harga:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-12">
    {!! Form::label('departure_date', 'Keberangkatan:') !!}
    {!! Form::text('departure_date', null, ['class' => 'form-control']) !!}
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
