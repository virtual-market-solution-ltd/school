@extends('layout.app')
@section('contents')

<div class="page-content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-30 header-title">Add New User</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('users.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password"  required>
                            </div>

                            <div class="form-group">
                                <label for="school_id">Role</label>
                                <select name="roles_id" id="roles_id" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{!! $role->id !!}">{!! $role->name !!}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                
                                @if(Auth::user()->roles_id == 1)
                                    
                                @else
                                    <label for="school_name">School Name</label>
                                    <input type="text" class="form-control" id="school_name" name="school_name" value="{{$school_id->school_name }}" readonly required>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                @if(Auth::user()->roles_id == 1)
                                    <label for="school_id">School ID</label>
                                    <select name="schools_id" id="schools_id" class="form-control">
                                        @foreach($schools as $school)
                                            <option value="{!! $school->id !!}">{!! $school->school_id !!}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label for="school_name">School ID</label>
                                    <input type="text" class="form-control" id="school_name" name="school_name" value="{{$school_id->school_id }}"  readonly required>
                                    <input type="hidden" class="form-control" id="schools_id" name="schools_id" value="{{$school_id->id }}" >
                                @endif
                            </div>

                                
                            


                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" id="email" name="email" value="test@gmail.com" required>
                            </div>

                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="01710000000" required>
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