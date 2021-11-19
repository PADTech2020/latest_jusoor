@php
/**
 * @var string $value
 */
$value = isset($value) ? (array)$value : [];
@endphp
@if($categories)
    <ul>
        @foreach($categories as $category)
            @if($category->id != $currentId)
                 <li id="cat-{{ $category->id}}" @if( $category->id==67) style="display:none"  @endif value="{{ $category->id ?? '' }}"
                        {{ $category->id == $value ? 'selected' : '' }}>
                    {!! Form::customCheckbox([
                        [
                            $name, $category->id, $category->name, in_array($category->id, $value),
                        ]
                    ]) !!}
                    @include('plugins/blog::categories.categories-checkbox-option-line', [
                        'categories' => $category->child_cats,
                        'value' => $value,
                        'currentId' => $currentId,
                        'name' => $name
                    ])
                </li>
            @endif
        @endforeach
    </ul>
@endif
