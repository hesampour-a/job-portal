<div>
    @if ($allOption)
    <label for="{{$name}}" class="mb-1 flex items-center">
        <input type="radio" name="{{$name}}" value="" @checked(!request($name))>
        <span class="ml-1">All</span>
    </label>
    @endif

    @foreach ($options as $option)
    <label for="{{$name}}" class="mb-1 flex items-center">
        <input type="radio" name="{{$name}}" value="{{$option}}" @checked($option===request($name))>
        <span class="ml-1">{{Str::ucfirst($option)}}</span>
    </label>
    @endforeach

    @error($name)
    <div class="text-sm text-red-500 mt-2">
        {{ $message }}
    </div>
    @enderror

</div>