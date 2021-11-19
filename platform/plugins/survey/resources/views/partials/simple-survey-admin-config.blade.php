<div class="form-group">
    <label class="control-label">{{ trans('Survey') }}</label>
    <select name="id" class="form-control" data-shortcode-attribute="id">
        @foreach($survey as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>
