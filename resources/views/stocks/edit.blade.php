@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Update Data
                </div>
                <div class="card-body">
                    @foreach ($stocks as $stock)


                    <form action="{{action('StockController@update',$stock->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Species</label>
                            <input type="text" name="species" class="form-control" value="{{$stock->species}}">
                        </div>
                        <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="st_date" class="form-control" value="{{$stock->st_date}}">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Opening Balance</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Male</label>
                                            <input type="text" name="ob_m" class="form-control"
                                                value="{{$stock->ob_m}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Female</label>
                                            <input type="text" name="ob_f" class="form-control"
                                                value="{{$stock->ob_f}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="text" name="ob_t" class="form-control"
                                                value="{{$stock->ob_t}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Closing Balance</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Male</label>
                                            <input type="text" name="cb_m" class="form-control"
                                                value="{{$stock->cb_m}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Female</label>
                                            <input type="text" name="cb_f" class="form-control"
                                                value="{{$stock->cb_f}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="text" name="cb_t" class="form-control"
                                                value="{{$stock->cb_t}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Issue</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Male</label>
                                            <input type="text" name="is_m" class="form-control"
                                                value="{{$stock->is_m}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Female</label>
                                            <input type="text" name="is_f" class="form-control"
                                                value="{{$stock->is_f}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Recepit</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Male</label>
                                            <input type="text" name="re_m" class="form-control"
                                                value="{{$stock->re_m}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Female</label>
                                            <input type="text" name="re_f" class="form-control"
                                                value="{{$stock->re_f}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Mortality</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Male</label>
                                            <input type="text" name="mt_m" class="form-control"
                                                value="{{$stock->mt_m}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Female</label>
                                            <input type="text" name="mt_f" class="form-control"
                                                value="{{$stock->mt_f}}">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="mb-3"></div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" name="remarks" class="form-control" value="{{$stock->remarks}}">
                        </div>
                        <div class="mb-3"></div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp;
                            Update</button>
                        <a href="{{action('StockController@index')}}" class="btn btn-primary"><i
                                class="fa fa-arrow-left"></i>&nbsp; Back</a>
                    </form>
                    @endforeach



                </div>



            </div>
        </div>
    </div>
</div>
@endsection
