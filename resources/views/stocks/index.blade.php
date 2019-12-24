@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">

                        <form action="/stocks/search" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit" title="Search" class="btn btn-primary"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <a href="{{action('StockController@create')}}" class="btn btn-primary float-right"><i
                            class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Data</a>
                </div>

                <div class="card-body">
                    <h2>Stock Register</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                    <th rowspan="2" width="100">Species</th>
                                    <th rowspan="2" width="115">Date</th>
                                
                                <th colspan="3">Opening Balance</th>
                                <th colspan="3">Closing balance</th>
                                <th rowspan="2" width="125">Action</th>
                            </tr>
                            <tr>
                                
                                <th scope="col">Male</th>
                                <th scope="col">Female</th>
                                <th scope="col">Total</th>
                                <th scope="col">Male</th>
                                <th scope="col">Female</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)


                            <tr>
                                <td>{{$stock->species}}</td>
                                <td>{{$stock->st_date}}</td>
                                <td>{{$stock->ob_m}}</td>
                                <td>{{$stock->ob_f}}</td>
                                <td>{{$stock->ob_t}}</td>
                                <td>{{$stock->cb_m}}</td>
                                <td>{{$stock->cb_f}}</td>
                                <td>{{$stock->cb_t}}</td>
                                <td>
                                    <form action="{{action('StockController@destroy',$stock->id)}}" method="POST">
                                        <a href="{{action('StockController@show',$stock->id)}}" title="Show"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a href="{{action('StockController@edit',$stock->id)}}" title="Edit"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Delete" class="btn btn-outline-danger btn-sm"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$stocks->links()}}

                </div>



            </div>
            <div class="mb-3"></div>
            <div class="card">
                    <div class="card-header">
                        Export data to Excel Format
                        <a href="{{route('stockexport')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-download"
                                aria-hidden="true"></i>&nbsp; Download</a>
                    </div>
                    
                </div>
        </div>
    </div>
</div>
            
            @endsection