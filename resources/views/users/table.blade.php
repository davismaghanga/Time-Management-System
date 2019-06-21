

<table id="userTable" class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>User name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @permission("delete-users")
                @if(!$user->hasRole('superadministrator'))

                <a href="javascript:;" onclick="deleteUser({{$user->id}})"><i class="fa fa-trash"></i></a>
                @endif
                @endpermission
                @permission("update-users")
                <a href="{{url('users/update/' . $user->id)}}"><i class="fa fa-pencil"></i></a>
                @endpermission
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
