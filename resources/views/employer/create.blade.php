<x-layout>
    <x-breadcrumbs class="mb-4" :links="
[
    'Employer' => route('employer.create') ,
 ]" />

    <x-card class="mb-10">
        <h2 class="mb-2 text-lg font-semibold text-black">Creating A new Employer</h2>
        <form action="{{route('employer.store')}}" method="post">
            @csrf

            <div class=" mb-8">
                <x-label for="expected_salary">Company Name</x-label>
                <x-text-input name="company_name" />
            </div>


            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>