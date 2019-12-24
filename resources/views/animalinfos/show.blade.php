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
                        @foreach ($animalinfos as $animalinfo)
                            <tr>
                                <th>Animal ID</th>
                                <td>{{$animalinfo->animal_id}}</td>
                            </tr>
                            <tr>
                                <th>SR NO</th>
                                <td>{{$animalinfo->sr_no}}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{$animalinfo->ai_date}}</td>
                            </tr>
                            <tr>
                                <th>Group</th>
                                <td>{{$animalinfo->group_id}}</td>
                            </tr>
                            <tr>
                                <th>Group name</th>
                                <td>{{$animalinfo->group_name}}</td>
                            </tr>
                            <tr>
                                <th>Death details</th>
                                <td>{{$animalinfo->death_details}}</td>
                            </tr>
                            <tr>
                                <th>Treatment Details</th>
                                <td>{{$animalinfo->treatment_details}}</td>
                            </tr>
                            <tr>
                                <th>Organs For Hp</th>
                                <td>{{$animalinfo->organs_hp}}</td>
                            </tr>
                            <tr>
                                <th>Blood Collection</th>
                                <td>{{$animalinfo->blood_collection}}</td>
                            </tr>
                            <tr>
                                <th>Total Animals</th>
                                <td>{{$animalinfo->total_animals}}</td>
                            </tr>
                            <tr>
                                <th>Total Groups</th>
                                <td>{{$animalinfo->total_groups}}</td>
                            </tr>
                            <tr>
                                <th>Remarks</th>
                                <td>{{$animalinfo->remarks}}</td>
                            </tr>

                        @endforeach
                    </table>
                    <a href="{{action('AnimalinfoController@index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
                   
                </div>
                   

                    
                </div>
            </div>
        </div>
    </div>
@endsection
