@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card m-b-20">
                    <div class="card-body">
                    <h4 class="mt-0 m-b-30 header-title">Update School Information</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{route('schools.update', $data->id)}}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="{!! $data->id !!}">
                            <div class="form-group">
                                <label for="school_id">School ID</label>
                                <input type="text" class="form-control" id="school_id" name="school_id" value="{!! $data->school_id !!}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                <input type="text" class="form-control" id="school_name" name="school_name" value="{!! $data->school_name !!}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="" rows="10"  required>{!! $data->school_description; !!}</textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit" >Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection