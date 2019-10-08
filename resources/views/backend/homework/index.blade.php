@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Homeworks <a href="{{ route('homework.create') }}"><button class="btn btn-sm btn-primary">New</button></a> </h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Assigned By</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Subject</th>
                                        <th>Deadline</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>File</th>
                                        <th>Posted on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($homeworks as $row)
                                    <tr>
                                        <td>{!! $row->teacher->fullname !!}</td>
                                        <td>{!! $row->school_classes->name !!}</td>
                                        <td>{!! $row->school_sections->name !!}</td>
                                        <td>{!! $row->school_subjects->name !!}</td>
                                        <td>{!! $row->deadline !!}</td>
                                        <td>{!! $row->name !!}</td>
                                        <td>{!! $row->description !!}</td>
                                        <td><a href="{!!$row->file_location!!}">Download</a></td>
                                        <td>{!! $row->created_at !!}</td>
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