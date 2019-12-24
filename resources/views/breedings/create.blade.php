@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ADD DATA</div>

                <div class="card-body">
                    <form action="{{action('BreedingController@store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Breed</label>
                            <input type="text" name="breed" class="form-control" placeholder="breed">
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Matting</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Cohabitation</label>
                                            <input type="date" name="start" class="form-control"
                                                placeholder="mm/dd/yyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Male ID</label>
                                            <input type="text" name="male_id" class="form-control"
                                                placeholder="male Animal ID">
                                        </div>
                                        <div class="form-group">
                                            <label>Female ID</label>
                                            <input type="text" name="female_id" class="form-control"
                                                placeholder="Female Animal ID">
                                        </div>
                                        <div class="form-group">
                                            <label>Seperation</label>
                                            <input type="date" name="seperate" class="form-control"
                                                placeholder="mm/dd/yyyy">
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
                                                placeholder="mm/dd/yyyy">
                                        </div>
                                        <div class="form-group">
                                            <label>Delivered Male</label>
                                            <input type="text" name="del_male" class="form-control"
                                                placeholder="Delivered male">
                                        </div>
                                        <div class="form-group">
                                            <label>Delivered Female</label>
                                            <input type="text" name="del_female" class="form-control"
                                                placeholder="Delivered Female">
                                        </div>
                                        <div class="form-group">
                                            <label>Delivered Total</label>
                                            <input type="text" name="tot" class="form-control" placeholder="Total">
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
                                                placeholder="Weaning">
                                        </div>
                                        <div class="form-group">
                                            <label>Pup Male</label>
                                            <input type="text" name="pup_male" class="form-control"
                                                placeholder="Pup_male">
                                        </div>
                                        <div class="form-group">
                                            <label>Pup Femlae</label>
                                            <input type="text" name="pup_female" class="form-control"
                                                placeholder="Pup Female">
                                        </div>
                                        <div class="form-group">
                                            <label>Died Male</label>
                                            <input type="text" name="m_male" class="form-control"
                                                placeholder="Died Male">
                                        </div>
                                        <div class="form-group">
                                            <label>Died Female</label>
                                            <input type="text" name="m_female" class="form-control"
                                                placeholder="Died Female">
                                        </div>
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="text" name="total" class="form-control" placeholder="Total">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                            <div class="mb-3"></div>
                            <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
