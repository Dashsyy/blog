@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Post list</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                @if(Session::has('post_delete'))
                <p>{!! session('post_delete') !!}</p>
                @endif
                <a class="btn btn-primary" href="{!! url('post/create') !!}">Create new</a>
                @if (count($posts) > 0)
                <table class="table table-striped task-table">
                    <thead>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </thead>

                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>
                                <div>{!! $post->title !!}</div>
                            </td>
                            <td>
                                <div>{!! $post->author !!}</div>
                            </td>
                            <td>
                                <div>{!! $post->name !!}</div>

                            </td>
                            <td>
                                <div>{!! Html::image("/img/posts/".$post->image, $post->title, array('width'=>'60')) !!}</div>
                            </td>
                            <td>
                                <div>{!! $post->short_desc !!}</div>
                            </td>

                            <td><a href="{!! url('post/' . $post->id . '/edit') !!}">Edit</a></td>

                            <td>
                                {!! Form::open(array('url'=>'post/'. $post->id, 'method'=>'DELETE')) !!}
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
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>
@endsection
