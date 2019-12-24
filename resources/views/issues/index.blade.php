{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">

                        <form action="/issues/search" method="GET">
                            @csrf
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit" title="Search" class="btn btn-primary"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <a href="{{action('IsssueController@create')}}" class="btn btn-primary float-right"><i
                            class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Data</a>
                </div>

                <div class="card-body">
                    <h2>Issue Register</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">DATE</th>
                                <th scope="col">IAEC NO</th>
                                <th scope="col">TITTLE</th>
                                <th scope="col">PI NAME</th>
                                <th scope="col">Approved Animals</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dailyacts as $dailyact)


                            <tr>
                                <td>{{$dailyact->dct_date}}</td>
                                <td>{{$dailyact->sr_no}}</td>
                                <td>{{$dailyact->count}}</td>
                                <td>{{$dailyact->activity}}</td>
                                <td>{{$dailyact->short_title}}</td>
                                <td>
                                    <form action="{{action('DailyactController@destroy',$dailyact->id)}}" method="POST">
                                        <a href="{{action('DailyactController@show',$dailyact->id)}}" title="Show"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a href="{{action('DailyactController@edit',$dailyact->id)}}" title="Edit"
                                            class="btn btn-outline-info btn-sm"><i class="fa fa-edit"
                                                aria-hidden="true"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Delete" class="btn btn-outline-danger btn-sm"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$dailyacts->links()}}

                </div>


                
            </div>
            <div class="mb-3"></div>
            <div class="card">
                <div class="card-header">
                    Export data to Excel Format
                    <a href="{{route('export')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-download"
                            aria-hidden="true"></i>&nbsp; Download</a>
                </div>
                <div class="card-body">
                    <p>Choose Excel file to import into Database</p>

                    <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <input type="file" name="import_file">
                            <span class="input-group-prepend">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"
                                        aria-hidden="true"></i>&nbsp; Upload</button>

                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}