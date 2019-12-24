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
                    @foreach ($breedings as $breeding)
                    <h3 class="d-inline">Breed:</h3>&nbsp; <h4 class="d-inline">{{$breeding->breed}}</h4>
                    <div class="mb-3"></div>
                    <div class="row justify-content-center">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Matting
                                </div>
                                <div class="card-body">
                                    
                                        <table class="table">
                                            <tr>
                                                <th>Cohabitation</th>
                                                <td>{{$breeding->start}}</td>
                                            </tr>
                                            <tr>
                                                <th>Male ID</th>
                                                <td>{{$breeding->male_id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Female ID</th>
                                                <td>{{$breeding->female_id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Seperation</th>
                                                <td>{{$breeding->seperate}}</td>
                                            </tr>
                                        </table>
                                    
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Delivery
                                </div>
                                <div class="card-body">
                                    
                                        <table class="table">
                                            <tr>
                                                <th>Delivery</th>
                                                <td>{{$breeding->delivery}}</td>
                                            </tr>
                                            <tr>
                                                <th>Delivered Male</th>
                                                <td>{{$breeding->del_male}}</td>
                                            </tr>
                                            <tr>
                                                <th>Delivered Female</th>
                                                <td>{{$breeding->del_female}}</td>
                                            </tr>
                                            <tr>
                                                <th>Delivered Total</th>
                                                <td>{{$breeding->tot}}</td>
                                            </tr>
                                        </table>
                                    

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mb-3"></div>
                    <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Weaning
                            </div>
                            <div class="card-body">
                            
                                    <table class="table">
                                        <tr>
                                            <th>Weaning</th>
                                            <td>{{$breeding->weaning}}</td>
                                        </tr>
                                        <tr>
                                            <th>Pup Male</th>
                                            <td>{{$breeding->pup_male}}</td>
                                        </tr>
                                        <tr>
                                            <th>Pup Femlae</th>
                                            <td>{{$breeding->pup_female}}</td>
                                        </tr>
                                        <tr>
                                            <th>Died Male</th>
                                            <td>{{$breeding->m_male}}</td>
                                        </tr>
                                        <tr>
                                            <th>Died Female</th>
                                            <td>{{$breeding->m_female}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>{{$breeding->total}}</td>
                                        </tr>
                                    </table>
                            

                            </div>
                        </div>
                    </div>
                </div>

                    @endforeach
                    <div class="m-3"></div>

                    <a href="{{action('BreedingController@index')}}" class="btn btn-primary"><i
                            class="fa fa-arrow-left"></i>&nbsp; Back</a>

                </div>



            </div>
        </div>
    </div>
</div>
@endsection
