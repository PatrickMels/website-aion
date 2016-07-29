@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center page-header">
                <h1>News</h1>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $article)
                        <tr>
                            <th scope="row">{{$article->id}}</th>
                            <td>{{$article->title}}</td>
                            <td>{{$article->creator->name}}</td>
                            <td>
                                <a class="btn btn-danger btn-xs" href="{{Route('admin.news.edit', $article->id)}}">
                                    <i class="fa fa-pencil-square-o"></i> Edit
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-xs" href="{{Route('admin.news.delete', $article->id)}}">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <a href="{{Route('admin.news.add')}}" class="btn btn-primary">Ajouter un article</a>
            </div>
        </div>
    </div>
@stop
