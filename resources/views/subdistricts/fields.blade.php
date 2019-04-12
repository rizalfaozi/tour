<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'Kabupaten:') !!}
    <select id="district_id" name="district_id" class="form-control">
    	 <option value="0">Pilih Kabupaten</option>
    	 @foreach($districts as $district)
          @if(isset($subdistricts) ? $subdistricts->district_id == $district->id : true))

          <option value="{{ $district->id }}" selected>{{ $district->name  }} </option>

          @else
             <option value="{{ $district->id }}">{{ $district->name  }} </option>
          @endif
         @endforeach
    </select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Kecamatan:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subdistricts.index') !!}" class="btn btn-default">Batal</a>
</div>
