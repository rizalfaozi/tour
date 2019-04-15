@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Gaji Agen / Kordinator</h1>
        <?php if((Auth::user()->role_id ==1)) {?>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('salaries.create') !!}">Tambah</a>
        </h1>
    <?php } ?>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('salaries.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

