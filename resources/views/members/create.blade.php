@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jama'ah
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                   
                    {!! Form::open(['route' => 'members.store','enctype'=>'multipart/form-data']) !!}

                        @include('members.fields_create')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
