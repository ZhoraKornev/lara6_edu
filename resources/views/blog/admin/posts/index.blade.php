@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggler navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                @php /** @var \App\Models\BlogPost $item*/ @endphp
                                <tr @if(!$item->is_published) style="background: grey" @endif>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->category->title}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('blog.admin.posts.edit',$item->id) }}">{{$item->title}}</a>
                                </td>
                                <td>{{$item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M.Y H:i ') : 'Еще не опубликовано' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if ($items->total() > $items->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{$items->links()}}
                        </div>
                    </div>
                </div>
            </div>

        @endif

    </div>


@endsection

