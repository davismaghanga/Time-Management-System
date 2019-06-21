

<table id="userTable" class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>User name</th>
        <th>Work done</th>
        <th>Duration</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <th scope="row">{{$task->id}}</th>
            <td>{{$task->user->name}}</td>
            <td>{{$task->workDone}}</td>
            <td>{{$task->duration}}</td>
            <td>{{$task->date}}</td>
            <td>
                @permission("delete-users")
                <a href="javascript:;" onclick="deleteTask({{$task->id}})"><i class="fa fa-trash"></i></a>
                @endpermission
                @permission("update-users")
                <a href="{{url('jobs/updateTask/' . $task->id)}}"><i class="fa fa-pencil"></i></a>
                @endpermission
            </td>

        </tr>
    @endforeach

    </tbody>
</table>
