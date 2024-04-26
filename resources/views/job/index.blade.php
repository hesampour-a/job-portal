<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index') ]" />
    <x-card class="text-sm mb-4">
        <form action="{{ route('jobs.index') }}" method="get" id="filtering-form">
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <div class="mb-1 text-semibold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="search for any text" form-id="filtering-form" />
                </div>
                <div>
                    <div class="mb-1 text-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="from" />
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="to" />

                    </div>
                </div>
                <div>
                    <div class="mb-1 text-semibold">Experience</div>
                    <x-radio-group name="experience" :options="\App\Models\myJob::$experience" />

                </div>
                <div>
                    <div class="mb-1 text-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\myJob::$category" />

                </div>

            </div>
            <x-button class="w-full text-xl font-semibold" type='submit'>Filter</x-button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
    <x-job-card :$job>
        <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
    </x-job-card>
    @endforeach
</x-layout>