<?php

namespace App\Http\Controllers;
use App\Stock;
use App\Exports\StocksExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = DB::table('stocks')->orderBy('id','DESC')->paginate(10);
        return view('stocks.index',['stocks'=>$stocks]);
    }

    public function search(Request $request )
    {
        $search = $request->get('search');
        $stocks = DB::table('stocks')->where('st_date','=',$search)->orWhere('species','LIKE','%'. $search. '%' )->paginate(5);
        return view('stocks.index',['stocks'=>$stocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export(){

        return Excel::download(new StocksExport(),'stocks.xlsx');

    }
    
    public function create()
    {
        $stocks = DB::table('stocks')->orderBy('id','DESC')->limit(1)->get();
        return view('stocks.create',['stocks'=>$stocks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $species =$request->get('species');
        $st_date =$request->get('st_date');
        $ob_m =$request->get('ob_m');
        $ob_f =$request->get('ob_f');
        $ob_t =$request->get('ob_t');
        $re_m =$request->get('re_m');
        $re_f =$request->get('re_f');
        $is_m =$request->get('is_m');
        $is_f =$request->get('is_f');
        $mt_m =$request->get('mt_m');
        $mt_f =$request->get('mt_f');
        $cb_m =$request->get('cb_m');
        $cb_f =$request->get('cb_f');
        $cb_t =$request->get('cb_t');
        $remarks =$request->get('remarks');


        $stocks = DB::insert('insert into stocks(species,st_date,ob_m,ob_f,ob_t,re_m,re_f,is_m,is_f,mt_m,mt_f,cb_m,cb_f,cb_t,remarks) value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        [$species,$st_date,$ob_m,$ob_f,$ob_t,$re_m,$re_f,$is_m,$is_f,$mt_m,$mt_f,$cb_m,$cb_f,$cb_t,$remarks]);
        if($stocks){
            $red = redirect('stocks')->with('success','data has been inserted');

        }else{
            $red = redirect('stocks/create')->with('warning','Something Went Wrong');
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
        $stocks= DB::select('select * from stocks where id=?',[$id]);
        return view('stocks.show',['stocks'=>$stocks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stocks = DB::select('select * from stocks where id=?',[$id]);
        return view('stocks.edit',['stocks'=>$stocks]);
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
        $species =$request->get('species');
        $st_date =$request->get('st_date');
        $ob_m =$request->get('ob_m');
        $ob_f =$request->get('ob_f');
        $ob_t =$request->get('ob_t');
        $re_m =$request->get('re_m');
        $re_f =$request->get('re_f');
        $is_m =$request->get('is_m');
        $is_f =$request->get('is_f');
        $mt_m =$request->get('mt_m');
        $mt_f =$request->get('mt_f');
        $cb_m =$request->get('cb_m');
        $cb_f =$request->get('cb_f');
        $cb_t =$request->get('cb_t');
        $remarks =$request->get('remarks');
        $stocks = DB::update('update stocks set species=?,st_date=?,ob_m=?,ob_f=?,ob_t=?,re_m=?,re_f=?,is_m=?,is_f=?,mt_m=?,mt_f=?,cb_m=?,cb_f=?,cb_t=?,remarks=? where id=?',
        [$species,$st_date,$ob_m,$ob_f,$ob_t,$re_m,$re_f,$is_m,$is_f,$mt_m,$mt_f,$cb_m,$cb_f,$cb_t,$remarks,$id]);
        if($stocks){
            $red = redirect('stocks')->with('success','Data has been updated');
        }else{
            $red = redirect('stocks/edit/'.$id)->with('warning','Something Went Wrong');
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
        $stocks = DB::delete('delete from stocks where id=?',[$id]);
        $red = redirect('stocks')->with('success','Data has been deleted.');
        return $red;
    }
}
