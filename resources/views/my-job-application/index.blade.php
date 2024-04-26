<x-layout>
    <x-breadcrumbs class="mb-4" :links="
[
    'My Job Applications' => route('my-job-applications.index') ,
 ]" />

    @forelse ($applications as $application)

    <x-job-card :job="$application->my_job">
        <div class="flex items-center justify-between text-xs text-slate-500">
            <div>

                <div> Applied {{$application->created_at->diffForHumans()}}</div>
                <div>Other {{Str::plural('applicant',$application->my_job->job_applications_count) }} {{$application->my_job->job_applications_count}}</div>
                <div>your asking salary is ${{number_format($application->expected_salary) }}</div>
                <div>average asking salary ${{number_format($application->my_job->job_applications_avg_expected_salary)}}</div>
            </div>
            <div>
                <form action="{{route('my-job-applications.destroy',$application)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-button>Delete</x-button>
                </form>
            </div>
        </div>
    </x-job-card>
    @empty
    <p>you have no application</p>
    @endforelse
</x-layout>