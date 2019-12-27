@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ADD DATA</div>

                <div class="card-body">
                    <form action="{{action('DailyactController@store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" placeholder="YYYY-MM-DD" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                            @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Day</label>
                            <input type="text" name="day" placeholder="Monday" class="form-control @error('day') is-invalid @enderror" value="{{ old('day') }}">
                            @error('day')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Count</label>
                            <input type="text" name="count" placeholder="count" class="form-control @error('count') is-invalid @enderror" value="{{ old('count') }}">
                            @error('count')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Activity</label>
                            <input type="text" name="activity" placeholder="activity" class="form-control @error('activity') is-invalid @enderror" value="{{ old('activity') }}">
                            @error('activity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Phase</label>
                            <input type="text" name="phase" placeholder="phase" class="form-control @error('phase') is-invalid @enderror" value="{{ old('phase') }}">
                            @error('phase')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>SR_NO</label>
                            <input type="text" name="sr_no" placeholder="SR_NO" class="form-control @error('sr_no') is-invalid @enderror" value="{{ old('sr_no') }}">
                            @error('sr_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>IAEC_NO</label>
                            <input type="text" name="iaec_no" placeholder="IAEC_NO" class="form-control @error('iaec_no') is-invalid @enderror" value="{{ old('iaec_no') }}">
                            @error('iaec_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>details</label>
                            <input type="text" name="details" placeholder="details" class="form-control">
                        
                        </div>
                        <div class="form-group">
                            <label>Short Title</label>
                            <input type="text" name="short_title" placeholder="UTI" class="form-control @error('short_title') is-invalid @enderror"value="{{ old('short_title') }}">
                            @error('short_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
