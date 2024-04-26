<x-layout>

    <h1 class="text-4xl my-16 text-center text-slate-600 font-medium">Sign in to your account</h1>

    <x-card>
        <form action="{{route('auth.store')}}" method="post">
            @csrf

            <div class="mb-8">
                <label class="mb-2 block text-slate-700 font-medium" for="email">E-mail</label>
                <x-text-input name="email" />
            </div>

            <div class="mb-8">
                <label class="mb-2 block text-slate-700 font-medium" for="password">Password</label>
                <x-text-input name="password" type="password" />
            </div>

            <div class="flex justify-between">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="rounded-sm border border-slate-400">
                    <label class="text-slate-700 font-medium" for="remember">Remember Me</label>
                </div>
                <div><a href="#" class="text-indigo-600 hover:underline">Forget Password?</a></div>
            </div>
            <x-button class="w-full mt-4 bg-green-50">Sign In</x-button>
        </form>
    </x-card>
</x-layout>