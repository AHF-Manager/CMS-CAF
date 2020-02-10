<?php

namespace App\Http\Controllers\API;
use App\Exports\DailyactsExport;
use App\Imports\DailyactsImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


use App\Dailyact;

class DailyactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        return DB::table('dailyacts')->paginate(10);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'dct_date' => 'required',
            'day' => 'required',
            'count' => 'required',
            'activity' => 'required',
            'phase' => 'required',
            'sr_no' => 'required',
            'iaec_no' => 'required',
            'short_title' => 'required',

        ]);
       return Dailyact::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dct = Dailyact::findOrFail($id);
        $this->validate($request,[
            'dct_date' => 'required',
            'day' => 'required',
            'count' => 'required',
            'activity' => 'required',
            'phase' => 'required',
            'sr_no' => 'required',
            'iaec_no' => 'required',
            'short_title' => 'required',

        ]);
        $dct ->update($request->all());
        return ['message'=>'Update use info'];
    }
    public function import(Request $request){

        Excel::import(new DailyactsImport(),$request->pic);
       //  return redirect()->route('dailyacts.index');

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Dailyact::findOrFail($id);
        $user->delete();
       return ['message'=>'data deleted'];
    }
    public function search(){
        if($search = \Request::get('q')){
            $dcts = Dailyact::where(function($query) use ($search){
                $query->where('activity','LIKE',"%$search%")
                        ->orWhere('day','LIKE',"%$search%")
                        ->orWhere('dct_date','LIKE',"%$search%");
            })->paginate(5);
        }else{
          $dcts =  DB::table('dailyacts')->paginate(12);
        }
        return $dcts;
    }
}
