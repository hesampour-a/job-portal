<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-200 from-10% via-sky-200 via-30% to-emerald-200 to-90% text-slate-700">
    <nav class="flex justify-between mb-8 text-lg font-medium">
        <ul>
            <li>
                <a href="/" class="hover:text-orange-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>
            </li>
        </ul>
        <ul class="flex space-x-2">
            @auth
            <li>
                <a href="{{route('my-job-applications.index')}}"> {{ auth()->user()->name ?? 'Anynomus'}}</a>
            </li>
            <li>
                <a href="{{route('employer-jobs.index')}}">Jobs</a>
            </li>
            <li>
                <form action="{{route('auth.destroy')}}" method="post">
                    @csrf
                    @method('delete')
                    <button>Logout</button>
                </form>
            </li>
            @else
            <li>
                <a href="{{route('auth.create')}}">Log In</a>
            </li>
            @endauth
        </ul>
    </nav>

    @if (session('success'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75 ">
        <p class="font-bold">Success!</p>
        <p>{{session('success')}}</p>
    </div>
    @endif
    @if (session('error'))
    <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75 ">
        <p class="font-bold">Error!</p>
        <p>{{session('error')}}</p>
    </div>
    @endif
    {{ $slot }}
</body>

</html>