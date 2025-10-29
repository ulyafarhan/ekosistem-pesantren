@props(['contentJson'])

@php
    $blocks = json_decode($contentJson, true) ?? [];
@endphp

@if (!empty($blocks))
    @foreach ($blocks as $block)
        @switch($block['type'])
            @case('heading') 
                @if ($block['data']['level'] == 1)
                    <h1>{!! $block['data']['text'] !!}</h1>
                @elseif ($block['data']['level'] == 2)
                    <h2>{!! $block['data']['text'] !!}</h2>
                @elseif ($block['data']['level'] == 3)
                    <h3>{!! $block['data']['text'] !!}</h3>
                @else
                    <h4>{!! $block['data']['text'] !!}</h4>
                @endif
                @break

            @case('paragraph')
                <p>{!! $block['data']['text'] !!}</p>
                @break

            @case('list')
                @if ($block['data']['style'] == 'ordered')
                    <ol>
                        @foreach ($block['data']['items'] as $item)
                            <li>{!! $item !!}</li>
                        @endforeach
                    </ol>
                @else
                    <ul>
                        @foreach ($block['data']['items'] as $item)
                            <li>{!! $item !!}</li>
                        @endforeach
                    </ul>
                @endif
                @break
        @endswitch
    @endforeach
@endif