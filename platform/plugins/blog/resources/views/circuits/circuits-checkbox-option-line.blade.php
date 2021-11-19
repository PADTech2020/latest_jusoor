@php
/**
* @var string $value
*/
$value = isset($value) ? (array)$value : [];
@endphp
@if($circuits)

    <ul style="padding-right: 10px;">
        @foreach($circuits as $circuit)
            @if($circuit->id != $currentId)
                <li id="cat-{{ $circuit->id}}" value="{{ $circuit->id ?? '' }}"
                        {{ $circuit->id == $value ? 'selected' : '' }}>
                    {!! Form::customCheckbox([
                        [
                            $name, $circuit->id, $circuit->name, in_array($circuit->id, $value),
                        ]
                    ]) !!}
                    @include('plugins/blog::circuits.circuits-checkbox-option-line', [
                        'circuits' => $circuit->child_cats,
                        'value' => $value,
                        'currentId' => $currentId,
                        'name' => $name
                    ])
                </li>
            @endif
        @endforeach
    </ul>
@endif
