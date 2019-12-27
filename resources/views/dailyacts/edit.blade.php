@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Update Data
                </div>
                <div class="card-body">
                    @foreach ($dailyacts as $dailyact)
                        
                    
                        <form action="{{action('DailyactController@update',$dailyact->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" 
                                    class="form-control @error('date') is-invalid @enderror" value="{{$dailyact->dct_date}}">
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                        <label>Day</label>
                                        <input type="text" name="day"  class="form-control" value="{{$dailyact->day}}">
                                </div>
                                <div class="form-group">
                                        <label>Count</label>
                                        <input type="text" name="count"  class="form-control" value="{{$dailyact->count}}">
                                </div>
                                <div class="form-group">
                                        <label>Activity</label>
                                        <input type="text" name="activity"  class="form-control" value="{{$dailyact->activity}}">
                                </div>
                                    <div class="form-group">
                                            <label>Phase</label>
                                            <input type="text" name="phase"  class="form-control" value="{{$dailyact->phase}}">
                                    </div>
                                    <div class="form-group">
                                            <label>SR_NO</label>
                                            <input type="text" name="sr_no"  class="form-control" value="{{$dailyact->sr_no}}">
                                    </div>
                                <div class="form-group">
                                        <label>IAEC_NO</label>
                                        <input type="text" name="iaec_no"  class="form-control" value="{{$dailyact->iaec_no}}">
                                </div>
                                    <div class="form-group">
                                            <label>details</label>
                                            <input type="text" name="details"  class="form-control" value="{{$dailyact->details}}">
                                </div>
                                    <div class="form-group">
                                            <label>Short Title</label>
                                            <input type="text" name="short_title"  class="form-control" value="{{$dailyact->short_title}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp; Update</button>
                                    <a href="{{action('DailyactController@index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
                                </form>
                        @endforeach

                    
                   
                </div>
                   

                    
                </div>
            </div>
        </div>
    </div>
@endsection
