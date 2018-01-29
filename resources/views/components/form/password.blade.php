<div class="form-group">

    {{--find asterisk--}}
    @php($name = explode(' ', $name))
    {{--if found remove it--}}
    @if(in_array('*', $name))
        @php($ast = true )
        @php($pos = array_search('*', $name))
        @php(array_splice($name, $pos, 1))
    @endif
    @php($name = implode(' ', $name))

    @if(!in_array('label', $attributes))
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    @endif
    {{--replace with red asterisk if found--}}
    @isset($ast)
        <span class="text-red">*</span>
    @endisset
     {{--@todo this code can be simplified... culprit was firefox PASSWORD REMEMBER--}}
    <input name="{{$name}}" id="{{$name}}" class="form-control" type="password"
           value="" placeholder="{{ isset($attributes['placeholder']) ? $attributes['placeholder'] : '' }}">
</div>