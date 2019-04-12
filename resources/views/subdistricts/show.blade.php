@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subdistricts
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('subdistricts.show_fields')
                    <a href="{!! route('subdistricts.index') !!}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </div>
    </div>
@endsection
