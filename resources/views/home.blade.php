@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @hasrole('admin')
                    <div class="col-md-4">
                    <div class="list-group">
                        <a  href="#" class=" list-group-item nav-link"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i>&nbsp; Dailyactivities</a>
                        
                        <a class="list-group-item  nav-link" href="#"><i class="fa fa-paw fa-fw" aria-hidden="true"></i>&nbsp; Animal Details</a>
                        <a class="list-group-item  nav-link" href="#"><i class="fa fa-venus-mars fa-fw" aria-hidden="true"></i>&nbsp; Breeding Details</a>
                        <a class="list-group-item  nav-link" href="#"><i class="fa fa-folder-open-o fa-fw" aria-hidden="true"></i>&nbsp; Stock Register</a>

                        {{-- <a class="list-group-item" href="#"><i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp; Applications</a>
                        <a class="list-group-item" href="#"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Settings</a> --}}
                      </div>
                    </div>
                    @endhasrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
