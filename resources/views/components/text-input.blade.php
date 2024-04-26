<div class="relative">
    @if ($formId)
    <button type="button" class="absolute top-0 right-0 h-full items-center pr-2" onclick="document.getElementById('{{$name}}').value = ''; document.getElementById('{{$formId}}').submit()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>

    </button>

    @endif

    @if ($type === "textarea")

    <textarea name="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}" id="{{$name}}" @class([ 'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1  placeholder:text-slate-400 focus:ring-2' , 'ring-slate-300'=> !$errors->has($name), 'ring-red-300'=> $errors->has($name)

    ]) ></textarea>

    @else

    <input type={{ $type }} name="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}" id="{{$name}}" @class([ 'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1  placeholder:text-slate-400 focus:ring-2' , 'ring-slate-300'=> !$errors->has($name), 'ring-red-300'=> $errors->has($name)

    ]) />

    @endif


    @error($name)
    <div class="text-sm text-red-500 mt-2">
        {{ $message }}
    </div>
    @enderror
</div>