<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $villages->id !!}</p>
</div>

<!-- Subdistrict Id Field -->
<div class="form-group">
    {!! Form::label('subdistrict_id', 'Subdistrict Id:') !!}
    <p>{!! $villages->subdistrict_id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $villages->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $villages->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $villages->updated_at !!}</p>
</div>

