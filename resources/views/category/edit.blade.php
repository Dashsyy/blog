@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('category_update'))
                <p>{!! session('category_update') !!}</p>
                @endif
                <a class="btn btn-primary" href="{!! url('category') !!}">Goto list</a>
                {!! Form::model($category , array('route' => array('category.update', $category->id), 'method'=>'PUT')) !!}
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>
                <br>
                @if(Session::has('category_delete'))
                <div class="alert alert-success"><em>{!! session('category_delete') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
                </div>
                @endif
                {!! Form::submit('Update', array('class'=>'secondary-cart-btn')) !!}
                {!! Form::close() !!}
                <br>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
@endsection