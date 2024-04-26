<x-layout>
    <x-breadcrumbs class="mb-4" :links="
[
    'Jobs' => route('jobs.index') ,
 $job->title => route('jobs.show', $job) ,
 'Apply' => route('job.application.create',$job)
 ]" />
    <x-job-card :$job />
    <x-card class="mb-10">
        <h2 class="mb-2 text-lg font-semibold text-black">Your Job Application</h2>
        <form action="{{route('job.application.store',$job)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-8">
                <x-label for="expected_salary">Expected Salary</x-label>
                <x-text-input name="expected_salary" type="number" />
            </div>

            <div class="mb-8">
                <x-label for="cv">CV</x-label>
                <x-text-input name="cv" type="file" />
            </div>
            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>