<x-layout>
    <x-breadcrumbs class="mb-4" :links="
[
    'My Jobs' => route('employer-jobs.index') ,


 ]" />
    <div class="text-right">
        <x-link-button href="{{route('employer-jobs.create')}}">Add New</x-link-button>
    </div>
    @forelse ($jobs as $job)
    <x-job-card :$job>
        <div class="flex items-center justify-between mb-2">
            <div> <x-link-button :href="route('employer-jobs.edit', $job)">Edit</x-link-button></div>
            <div>
                <form action="{{route('employer-jobs.destroy',$job)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <x-button class="text-xs">Delete</x-button>
                </form>
            </div>
        </div>
        <div>
            @forelse ($job->JobApplications as $application)
            <div class="flex items-center justify-between mt-8">
                <div>
                    <div>{{$application->user->name}}</div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>Download CV</div>
                </div>

                <div>
                    <div>
                        ${{number_format($application->expected_salary) }}
                    </div>
                </div>
            </div>
            @empty
            <div>
                no applications yet
            </div>
            @endforelse
        </div>

    </x-job-card>
    @empty
    you have no jobs yet
    @endforelse

</x-layout>