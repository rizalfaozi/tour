@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 style="text-transform:capitalize; ">
            {{ $type }}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['url' => 'agents?type='.$type.'','enctype'=>'multipart/form-data']) !!}

                        @include('agents.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
