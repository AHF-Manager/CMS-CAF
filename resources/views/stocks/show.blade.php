@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detailed view
                </div>

                <div class="card-body">
                    @foreach ($stocks as $stock)
                    <h3 class="d-inline">Species:</h3>&nbsp; <h4 class="d-inline">{{$stock->species}}</h4>
                    <div class="mb-3"></div>
                    <h3 class="d-inline">Date:</h3>&nbsp; <h4 class="d-inline">{{$stock->st_date}}</h4>
                    <div class="mb-3"></div>
                    <div class="row justify-content-center">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Opening Balance
                                </div>
                                <div class="card-body">
                                    
                                        <table class="table">
                                            <tr>
                                                <th>Male</th>
                                                <td>{{$stock->ob_m}}</td>
                                            </tr>
                                            <tr>
                                                <th>Female</th>
                                                <td>{{$stock->ob_f}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td>{{$stock->ob_t}}</td>
                                            </tr>
                                        </table>
                                    
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Closing Balance
                                </div>
                                <div class="card-body">
                                    
                                        <table class="table">
                                            <tr>
                                                <th>Male</th>
                                                <td>{{$stock->cb_m}}</td>
                                            </tr>
                                            <tr>
                                                <th>Female</th>
                                                <td>{{$stock->cb_f}}</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td>{{$stock->cb_t}}</td>
                                            </tr>
                                        </table>
                                    

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <div class="row justify-content-center">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Issue
                            </div>
                            <div class="card-body">
                            
                                    <table class="table">
                                        <tr>
                                            <th>Male</th>
                                            <td>{{$stock->is_m}}</td>
                                        </tr>
                                        <tr>
                                            <th>Female</th>
                                            <td>{{$stock->is_f}}</td>
                                        </tr>

                                    </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">Rcepit</div>
                    <div class="card-body">
                    <table class="table">
                                        <tr>
                                            <th>Male</th>
                                            <td>{{$stock->re_m}}</td>
                                        </tr>
                                        <tr>
                                            <th>Female</th>
                                            <td>{{$stock->re_f}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Mortality</div>
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Male</th>
                                            <td>{{$stock->mt_m}}</td>
                                        </tr>
                                        <tr>
                                            <th>Female</th>
                                            <td>{{$stock->mt_f}}</td>
                                        </tr>
                                    </table>
                            

                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-3"></div>
                <h3 class="d-inline">Remarks:</h3>&nbsp; <h4 class="d-inline">{{$stock->remarks}}</h4>


                    @endforeach
                    <div class="m-3"></div>

                    <a href="{{action('StockController@index')}}" class="btn btn-primary"><i
                            class="fa fa-arrow-left"></i>&nbsp; Back</a>

                </div>



            </div>
        </div>
    </div>
</div>
@endsection
