<div class="circuits-group form-group form-group-no-margin @if ($errors->has($name)) has-error @endif">
    <div class="multi-choices-widget list-item-checkbox blaaaa">
        @if(isset($options['choices']) && (is_array($options['choices']) || $options['choices'] instanceof \Illuminate\Support\Collection))
            @include('plugins/blog::circuits.circuits-checkbox-option-line', [
                'circuits' => $options['choices'],
                'value' => $options['value'],
                'currentId' => null,
                'name' => $name
            ])
        @endif
    </div>
</div>
