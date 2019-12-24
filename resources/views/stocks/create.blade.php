@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ADD DATA</div>

                <div class="card-body">
                        @foreach ($stocks as $stock)
                        <form action="{{action('StockController@store')}}" method="POST">
                            @csrf
                           
                            <div class="form-group">
                                <label>Species</label>
                            <input type="text" name="species" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="st_date" class="form-control" placeholder="mm/dd/yyyy">
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">Yesterday's Closing Balance</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Male</label>
                                                <input type="text" name="ob_m" class="form-control"
                                                    value="{{$stock->cb_m}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Female</label>
                                                <input type="text" name="ob_f" class="form-control"
                                                value="{{$stock->cb_f}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input type="text" name="ob_t" class="form-control"
                                                    value="{{$stock->cb_t}}">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">Today's Closing Balance</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Male</label>
                                                <input type="text" name="cb_m" class="form-control"
                                                placeholder="00">
                                            </div>
                                            <div class="form-group">
                                                <label>Female</label>
                                                <input type="text" name="cb_f" class="form-control"
                                                placeholder="00">
                                            </div>
                                            <div class="form-group">
                                                <label>Total</label>
                                                <input type="text" name="cb_t" class="form-control"
                                                placeholder="00">
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
                                                placeholder="0">
                                            </div>
                                            <div class="form-group">
                                                <label>Female</label>
                                                <input type="text" name="is_f" class="form-control"
                                                placeholder="0">
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
                                                placeholder="0">
                                            </div>
                                            <div class="form-group">
                                                <label>Female</label>
                                                <input type="text" name="re_f" class="form-control"
                                                placeholder="0">
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
                                                placeholder="0">
                                            </div>
                                            <div class="form-group">
                                                <label>Female</label>
                                                <input type="text" name="mt_f" class="form-control"
                                                placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <input type="text" name="remarks" class="form-control" placeholder="remarks">
                            </div>
                            <div class="mb-3"></div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                        @endforeach
    
                    
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
