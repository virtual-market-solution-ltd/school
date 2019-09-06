@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Add New School</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('class.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                
                                <input type="text" class="form-control" id="school_name" name="school_name" value="{!! $school->school_name !!}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="school_ID">School ID</label>
                                
                                <input type="text" class="form-control" id="school_id" name="school_id" value="{!! $school->school_id !!}" readonly required>

                                <input type="hidden" class="form-control" id="schools_id" name="schools_id" value="{!! $school->id !!}"  readonly required>
                            </div>
                            <div class="form-group">
                                <label for="name">Class Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="input class name" required>
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