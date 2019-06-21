

<table id="jobsTable" class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Job Description</th>
        <th>Duration in Minutes</th>
        <th>Date</th>
        <th>Action</th>
        <th>User</th>
    </tr>
    </thead>
    <tbody>
    @foreach($jobs as $job)
        <tr>
            <th scope="row">{{$job->id}}</th>
            <td>{{$job->workDone}}</td>
            <td>{{$job->duration}}</td>
            <td>{{$job->date}}</td>
            <td>
                @permission("delete-tasks")
                <a href="javascript:;" onclick="deleteJob({{$job->id}})"> <i class="fa fa-trash"></i></a>
                @endpermission
                @permission("update-tasks")
                <a href="{{url('jobs/update/' . $job->id)}}"><i class="fa fa-pencil"></i></a>
                @endpermission
            </td>
            <td> {{$job->user->name}} </td>

        </tr>
    @endforeach

    </tbody>
</table>
