<div class="row justify-content-lg-center">
    <select class="selectpicker" multiple data-live-search="true" data-selected-text-format="count" data-width="75%" name="{{$name}}">
        @foreach ($data as $item)
            <option value="{{$item->id}}" data-tokens="{{$item->id.','.$item->name}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>