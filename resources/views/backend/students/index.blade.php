@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Students List &nbsp;<a href="/users/create"><button class="btn btn-sm btn-primary">New</button> </a></h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed" id="">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>School ID</th>
                                    <th>Role</th>
                                    <th>Full Name</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($students as $user)
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            {!! $user->schools->school_id !!}
                                        </td>
                                        <td>
                                            {!! $user->roles->name !!}
                                        </td>
                                        <td>
                                            {!! $user->fullname !!}
                                        </td>
                                        <td>
                                            {!! $user->username !!}
                                        </td>
                                        <td>
                                            {!! $user->phone !!}
                                        </td>
                                        <td>
                                            {!! $user->email !!}
                                        </td>

                                        <td>
                                            <a href="/students/{!! $user->id !!}/edit">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection


@section('footer')
<script>
    $(document).ready(function() {
    $('.table').DataTable({
        
    });
} );
</script>

@endsection
