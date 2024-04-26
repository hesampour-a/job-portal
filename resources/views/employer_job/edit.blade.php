<x-layout>
    <x-breadcrumbs class="mb-4" :links="
[
    'My Jobs' => route('employer-jobs.index') ,
    $job->title => route('jobs.show',$job) ,
    'Edit' => route('employer-jobs.edit',$job) ,

 ]" />

    <x-card class="mb-10">
        <h2 class="mb-2 text-lg font-semibold text-black">Edit</h2>
        <form action="{{route('employer-jobs.update',$job)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title">Title</x-label>
                    <x-text-input name="title" :value="$job->title" />
                </div>

                <div>
                    <x-label for="location">Location</x-label>
                    <x-text-input name="location" :value="$job->location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary">Salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>
                <div class="col-span-2">
                    <x-label for="description">Description</x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description" />
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



            <x-button class="w-full">Edit</x-button>
        </form>
    </x-card>
</x-layout>