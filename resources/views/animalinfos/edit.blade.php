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
                    @foreach ($animalinfos as $animalinfo)


                    <form action="{{action('AnimalinfoController@update',$animalinfo->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Animal ID</label>
                            <input type="text" name="animal_id"
                            class="form-control @error('animal_id') is-invalid @enderror"
                            value="{{$animalinfo->animal_id}}">
                            @error('animal_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>SR NO</label>
                            <input type="text" name="sr_no" 
                            class="form-control @error('sr_no') is-invalid @enderror" 
                            value="{{$animalinfo->sr_no}}">
                            @error('sr_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="ai_date" 
                            class="form-control @error('ai_date') is-invalid @enderror"
                            value="{{$animalinfo->ai_date}}">
                            @error('ai_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Group</label>
                            <input type="text" name="group_id"
                            class="form-control @error('group_id') is-invalid @enderror"
                            value="{{$animalinfo->group_id}}">
                            @error('group_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Group Name</label>
                            <input type="text" name="group_name" 
                            class="form-control @error('group_name') is-invalid @enderror"
                                value="{{$animalinfo->group_name}}">
                                @error('group_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Death Details</label>
                            <input type="text" name="death_details"
                            class="form-control @error('death_details') is-invalid @enderror"
                                value="{{$animalinfo->death_details}}">
                                @error('death_details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Treatment details</label>
                            <input type="text" name="treatment_details" 
                            class="form-control @error('treatment_details') is-invalid @enderror"
                                value="{{$animalinfo->treatment_details}}">
                                @error('treatment_details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Organs For HP</label>
                            <input type="text" name="organs_hp" 
                            class="form-control @error('organs_hp') is-invalid @enderror"
                            value="{{$animalinfo->organs_hp}}">
                            @error('organs_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Blood Collection</label>
                            <input type="text" name="blood_collection" 
                            class="form-control @error('blood_collection') is-invalid @enderror"
                                value="{{$animalinfo->blood_collection}}">
                                @error('blood_collection')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Animals</label>
                            <input type="text" name="total_animals" 
                            class="form-control @error('total_animals') is-invalid @enderror"
                                value="{{$animalinfo->total_animals}}">
                                @error('total_animals')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Groups</label>
                            <input type="text" name="total_groups"
                            class="form-control @error('total_groups') is-invalid @enderror"
                                value="{{$animalinfo->total_groups}}">
                                @error('total_groups')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text" name="remarks" class="form-control" value="{{$animalinfo->remarks}}">
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i>&nbsp;
                            Update</button>
                        <a href="{{action('AnimalinfoController@index')}}" class="btn btn-primary"><i
                                class="fa fa-arrow-left"></i>&nbsp; Back</a>
                    </form>
                    @endforeach



                </div>



            </div>
        </div>
    </div>
</div>
@endsection
