@php
/** @var \App\Models\BlogPost $items */
@endphp
@extends('layouts.app')

@section('content')
    @foreach($items as $item)
        <table>
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->id}}</td>
                <td>{{$item->excerpt}}</td>
            </tr>
        </table>

    @endforeach
@endsection

