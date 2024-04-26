<x-layout>
    <x-breadcrumbs class="mb-4" :links="
[
    'My Jobs' => route('employer-jobs.index') ,
'Create' => route('employer-jobs.create') ,

 ]" />

    <x-card class="mb-10">
        <h2 class="mb-2 text-lg font-semibold text-black">Create A new Job</h2>
        <form action="{{route('employer-jobs.store')}}" method="post">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title">Title</x-label>
                    <x-text-input name="title" />
                </div>

                <div>
                    <x-label for="location">Location</x-label>
                    <x-text-input name="location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary">Salary</x-label>
                    <x-text-input name="salary" type="number" />
                </div>
                <div class="col-span-2">
                    <x-label for="description">Description</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>
                <div>
                    <div class="mb-1 text-semibold">Experience</div>
                    <x-radio-group name="experience" :options="\App\Models\myJob::$experience" :all-option='false' />

                </div>
                <div>
                    <div class="mb-1 text-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\myJob::$category" :all-option='false' />

                </div>
            </div>



            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-layout>