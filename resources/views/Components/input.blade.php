@props(['label' => 'Nama', 'required' => false, 'type' => 'text', 'value' => 'nama', 'placeholder' => 'John Doe', 'data' => null])

<div class="form-group @error($value) has-error @enderror">
  <label for="{{$value}}">
    {{$label}}
    @if($required)
      <span class="text-danger">*</span>
    @endif
  </label>
  <input type="{{$type}}" class="form-control" id="{{$value}}" name="{{$value}}" value="{{ $data ?? old($value) }}" placeholder="{{$placeholder}}">
  @error($value)
    <div class="help-block">
      {{ $message }}
    </div>
  @enderror
</div>