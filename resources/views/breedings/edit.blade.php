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
                    @foreach ($breedings as $breeding)


                    <form action="{{action('BreedingController@update',$breeding->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Breed</label>
                            <input type="text" name="breed" class="form-control" value="{{$breeding->breed}}">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Matting</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Cohabitation</label>
                                            <input type="date" name="start" class="form-control"
                                                value="{{$breeding->start}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Male ID</label>
                                            <input type="text" name="male_id" class="form-control"
                                                value="{{$breeding->male_id}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Female ID</label>
                                            <input type="text" name="female_id" class="form-control"
                                                value="{{$breeding->female_id}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Seperation</label>
                                            <input type="date" name="seperate" class="form-control"
                                                value="{{$breeding->seperate}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Delivery</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Delivery</label>
                                            <input type="date" name="delivery" class="form-control"
                                                value="{{$breeding->delivery}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Delivered Male</label>
                                            <input type="text" name="del_male" class="form-control"
                                                value="{{$breeding->del_male}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Delivered Female</label>
                                            <input type="text" name="del_female" class="form-control"
                                                value="{{$breeding->del_female}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Delivered Total</label>
                                            <input type="text" name="tot" class="form-control"
                                                value="{{$breeding->tot}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                            <div class="card-header">Weaning</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Weaning</label>
                                    <input type="date" name="weaning" class="form-control"
                                        value="{{$breeding->weaning}}">
                                </div>
                                <div class="form-group">
                                    <label>Pup Male</label>
                                    <input type="text" name="pup_male" class="form-control"
                                        value="{{$breeding->pup_male}}">
                                </div>
                                <div class="form-group">
                                    <label>Pup Femlae</label>
                                    <input type="text" name="pup_female" class="form-control"
                                        value="{{$breeding->pup_female}}">
                                </div>
                                <div class="form-group">
                                    <label>Died Male</label>
                                    <input type="text" name="m_male" class="form-control"
                                        value="{{$breeding->m_male}}">
                                </div>
                                <div class="form-group">
                                    <label>Died Female</label>
                                    <input type="text" name="m_female" class="form-control"
                                        value="{{$breeding->m_female}}">
                                </div>
                                <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" name="total" class="form-control"
                                        value="{{$breeding->total}}">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp;
                            Update</button>
                        <a href="{{action('BreedingController@index')}}" class="btn btn-primary"><i
                                class="fa fa-arrow-left"></i>&nbsp; Back</a>
                    </form>
                    @endforeach



                </div>



            </div>
        </div>
    </div>
</div>
@endsection
