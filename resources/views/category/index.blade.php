@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category list</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <a class="btn btn-primary" href="{!! url('category/create') !!}">Create category</a>
                @if(Session::has('category_update'))
                <div class="alert alert-success"><em>{!! session('category_update') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
                </div>
                @endif
                @if (count($categories) > 0)
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                <div>{!! $category->id !!}</div>
                            </td>
                            <td>
                                <div>{!! $category->name !!}</div>
                            </td>
                            <td><a href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a></td>
                            <td>
                                {!! Form::open(array('url'=>'category/'. $category->id, 'method'=>'DELETE')) !!}
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger delete">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                    $(".delete").click(function() {
                        var form = $(this).closest('form');
                        $('<div></div>').appendTo('body')
                            .html('<div><h6> are you sure ?</h6></div>')
                            .dialog({
                                modal: true,
                                title: 'Delete message',
                                zIndex: 10000,
                                autoOpen: true,
                                width: 'auto',
                                resizable: false,
                                buttons: {
                                    Yes: function() {
                                        $(this).dialog('close');
                                        form.submit();
                                    },
                                    No: function() {

                                        $(this).dialog("close");
                                        return false;
                                    }
                                },
                                close: function(event, ui) {
                                    $(this).remove();
                                }
                            });
                        return false;
                    });
                </script>
                @endif
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
@endsection