<x-layout>

    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index') , $job->title => route('jobs.show', $job)]" />

    <x-job-card :$job>
        <p class="text-slate-500 text-sm mb-4">{!! nl2br(e($job->description)) !!}</p>
        @can('apply' ,$job)
        <x-link-button :href="route('job.application.create', $job)">Apply</x-link-button>
        @else
        <p class="text-center text-brown-200">you alredy applied for this job!</p>
        @endcan
    </x-job-card>

    @foreach ($job->employer->my_job as $job)
    <x-job-card :$job>
        <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
    </x-job-card>
    @endforeach
</x-layout>