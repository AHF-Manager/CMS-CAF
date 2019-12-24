@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ADD DATA</div>

                <div class="card-body">
                    <form action="{{action('AnimalinfoController@store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Animal ID</label>
                            <input type="text" name="animal_id" placeholder="Animal id"
                                class="form-control @error('animal_id') is-invalid @enderror"
                                value="{{ old('animal_id') }}">
                            @error('animal_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>SR NO</label>
                            <input type="text" name="sr_no" placeholder="CAF/###"
                                 class="form-control  @error('sr_no') is-invalid @enderror"
                                 value="{{ old('sr_no') }}">
                                 @error('sr_no')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                                </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="ai_date" placeholder="12/12/2012" 
                            class="form-control @error('ai_date') is-invalid @enderror"
                            value="{{ old('ai_date') }}">
                            @error('ai_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Group</label>
                            <input type="text" name="group_id" placeholder="G1" 
                            class="form-control @error('group_id') is-invalid @enderror"
                            value="{{ old('group_id') }}">
                            @error('group_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Group Name</label>
                            <input type="text" name="group_name" placeholder="Normal controls" 
                            class="form-control @error('group_name') is-invalid @enderror"
                            value="{{ old('group_name') }}">
                            @error('group_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Death Details</label>
                            <input type="text" name="death_details" placeholder="sacrifice" 
                            class="form-control @error('death_details') is-invalid @enderror"
                            value="{{ old('death_details') }}">
                            @error('death_details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Treatment details</label>
                            <input type="text" name="treatment_details" placeholder="Applicable" 
                            class="form-control @error('treatment_details') is-invalid @enderror"
                            value="{{ old('treatment_details') }}">
                            @error('treatment_details')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Organs For HP</label>
                            <input type="text" name="organs_hp" placeholder="Liver,kidney" 
                            class="form-control @error('organs_hp') is-invalid @enderror"
                            value="{{ old('organs_hp') }}">
                            @error('organs_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Blood Collection</label>
                            <input type="text" name="blood_collection" placeholder="Yes" 
                            class="form-control @error('blood_collection') is-invalid @enderror"
                            value="{{ old('blood_collection') }}">
                            @error('blood_collection')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Animals</label>
                            <input type="text" name="total_animals" placeholder="3" 
                            class="form-control @error('total_animals') is-invalid @enderror"
                            value="{{ old('total_animals') }}">
                            @error('total_animals')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Groups</label>
                            <input type="text" name="total_groups" placeholder="4"
                            class="form-control @error('total_groups') is-invalid @enderror"
                            value="{{ old('total_groups') }}">
                            @error('total_groups')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" name="remarks" placeholder="Remarks" class="form-control">
                        </div>


                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"
                                aria-hidden="true"></i>&nbsp; Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
