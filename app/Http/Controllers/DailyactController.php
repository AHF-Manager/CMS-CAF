<?php

namespace App\Http\Controllers;
use App\Dailyact;
use App\Exports\DailyactsExport;
use App\Imports\DailyactsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DailyactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailyacts = DB::table('dailyacts')->paginate(10);
        return view('dailyacts.index',['dailyacts'=>$dailyacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dailyacts.create');
    }

    public function search(Request $request){
        $search = $request->get('search');
        $dailyacts = DB::table('dailyacts')->where('dct_date','=',$search)->paginate(5);
        return view('dailyacts.index',['dailyacts'=>$dailyacts]);
    }

    public function export(){

        return Excel::download(new DailyactsExport(),'dailyacts.xlsx');

    }

    
    public function import(Request $request){

         Excel::import(new DailyactsImport(),$request->file('import_file'));
         return redirect()->route('dailyacts.index')->with('success','file has been uploaded.');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'day' => 'required',
            'count' => 'required',
            'activity' => 'required',
            'phase' => 'required',
            'sr_no' => 'required',
            'iaec_no' => 'required',
            'short_title' => 'required',



        ]);
        $date = $request->get('date');
        $day = $request->get('day');
        $count = $request->get('count');
        $activity = $request->get('activity');
        $phase = $request->get('phase');
        $sr_no = $request->get('sr_no');
        $iaec_no = $request->get('iaec_no');
        $details = $request->get('details');
        $short_title = $request->get('short_title');
        $dailyacts = DB::insert('insert into dailyacts(dct_date,day,count,activity,phase,sr_no,iaec_no,details,short_title) value(?,?,?,?,?,?,?,?,?)',
        [$date,$day,$count,$activity,$phase,$sr_no,$iaec_no,$details,$short_title]);
        if($dailyacts){
            $red = redirect('dailyacts')->with('success','data has been inserted');

        }else{
            $red = redirect('dailyacts/create')->with('warning','Something Went Wrong');
        }
        return $red;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dailyacts = DB::select('select * from dailyacts where id=?',[$id]);
        return view('dailyacts.show',['dailyacts'=>$dailyacts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dailyacts = DB::select('select * from dailyacts where id=?',[$id]);
        return view('dailyacts.edit',['dailyacts'=>$dailyacts]);
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
        $date = $request->get('date');
        $day = $request->get('day');
        $count = $request->get('count');
        $activity = $request->get('activity');
        $phase = $request->get('phase');
        $sr_no = $request->get('sr_no');
        $iaec_no = $request->get('iaec_no');
        $details = $request->get('details');
        $short_title = $request->get('short_title');
        $dailyacts = DB::update('update dailyacts set  dct_date=?,day=?,count=?,activity=?,phase=?,sr_no=?,iaec_no=?,details=?,short_title=? where id=?',
        [$date,$day,$count,$activity,$phase,$sr_no,$iaec_no,$details,$short_title,$id]);
        if($dailyacts){
            $red = redirect('dailyacts')->with('success','Data has been updated');
        }else{
            $red = redirect('dailyacts/edit/'.$id)->with('warning','Something Went Wrong');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dailyacts = DB::delete('delete from dailyacts where id=?',[$id]);
        $red = redirect('dailyacts')->with('success','Data has been deleted.');
        return $red;
    }
}
