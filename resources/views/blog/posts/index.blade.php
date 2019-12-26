@php
/** @var \App\Models\BlogPost $items */
@endphp

@foreach($items as $item)
    <table>
        <tr>
            <td>{{$item->title}}</td>
            <td>{{$item->id}}</td>
            <td>{{$item->excerpt}}</td>
        </tr>
    </table>

@endforeach
