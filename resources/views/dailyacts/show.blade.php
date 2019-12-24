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
                    <table class="table">
                        @foreach ($dailyacts as $dailyact)
                            <tr>
                                <th>Date</th>
                                <td>{{$dailyact->dct_date}}</td>
                            </tr>
                            <tr>
                                <th>Day</th>
                                <td>{{$dailyact->day}}</td>
                            </tr>
                            <tr>
                                <th>Count</th>
                                <td>{{$dailyact->count}}</td>
                            </tr>
                            <tr>
                                <th>Activity</th>
                                <td>{{$dailyact->activity}}</td>
                            </tr>
                            <tr>
                                <th>Phase</th>
                                <td>{{$dailyact->phase}}</td>
                            </tr>
                            <tr>
                                <th>SR_NO</th>
                                <td>{{$dailyact->sr_no}}</td>
                            </tr>
                            <tr>
                                <th>IAEC_NO</th>
                                <td>{{$dailyact->iaec_no}}</td>
                            </tr>
                            <tr>
                                <th>Details</th>
                                <td>{{$dailyact->details}}</td>
                            </tr>
                            <tr>
                                <th>Short title</th>
                                <td>{{$dailyact->short_title}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="{{action('DailyactController@index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
                   
                </div>
                   

                    
                </div>
            </div>
        </div>
    </div>
@endsection
