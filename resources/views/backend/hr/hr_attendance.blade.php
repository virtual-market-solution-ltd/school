@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        @if(session()->has('error'))
                            <div class="alert alert-warning">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <h4 class="mt-0 m-b-30 header-title">Employee Attendance Upload</h4>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap  table-condensed text-center" id="">
                            <tbody>
                            <form action="{{ route('hr.hr_attendance') }}" method="post" enctype='multipart/form-data'>
                                @csrf
                                <input type="hidden" name="entry_user" value="{!! Auth::user()->fullname !!}">
                                <input type="hidden" name="schools_id" value="{!! Auth::user()->schools_id !!}">

                                <tr>
                                    <td>Attendance CSV File</td>
                                    <td>
                                        <input class="form-control" type="file" name="attendance_csv">
                                    </td>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" type="submit">Submit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <hr>
                        <table class="table table-striped table-bordered now-wrap  table-condensed text-center" id="datatable-buttons">
                            <thead>
                                <tr>
                                    <th>EMP Code</th>
                                    <th>Login Date</th>
                                    <th>Login Time</th>
                                    <th>Logout Date</th>
                                    <th>Logout Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hr_attendance as $row)
                                <tr>
                                    <td>{!! $row->emp_code !!}</td>
                                    <td>{!! $row->login_date !!}</td>
                                    <td>{!! $row->login_time !!}</td>
                                    <td>{!! $row->logout_date !!}</td>
                                    <td>{!! $row->logout_time !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });
        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>

@endsection