@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Notices</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Posted On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($notices as $notice)
                                    <tr>
                                        <td>
                                            {!! $i!!}
                                        </td>
                                        <td>
                                            {!! $notice->title !!}
                                        </td>
                                        <td>
                                            {!! $notice->description !!}
                                        </td>
                                        <td>
                                            {!! $notice->created_at!!}
                                        </td>
                                        <td>
                                            <a href="/notice/{!! $notice->id !!}/edit">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
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