<!-- Subdistrict Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subdistrict_id', 'Subdistrict Id:') !!}
    {!! Form::number('subdistrict_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('villages.index') !!}" class="btn btn-default">Cancel</a>
</div>
