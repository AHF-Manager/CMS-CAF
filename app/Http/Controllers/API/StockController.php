<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;

class StockController extends Controller
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
        return DB::table('stocks')->orderBy('id','DESC')->paginate(7);
        
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
            'species'=> 'required',
            'st_date'=> 'required',
            'ob_m'   => 'required',
            'ob_f'   => 'required',
            'ob_t'   => 'required',
            'cb_m'   => 'required',
            'cb_f'   => 'required',
            'cb_t'   => 'required',
        ]);
        return Stock::create($request->all());

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
        $stk = Stock::findOrFail($id);
        $this->validate($request,[
            'species'=> 'required',
            'st_date'=> 'required',
            'ob_m'   => 'required',
            'ob_f'   => 'required',
            'ob_t'   => 'required',
            'cb_m'   => 'required',
            'cb_f'   => 'required',
            'cb_t'   => 'required',
        ]);
        $stk ->update($request->all());
        return ['message'=>'Update use info'];
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Stock::findOrFail($id);
        $user->delete();
       return ['message'=>'data deleted'];
    
    }
    public function search(){
        if($search = \Request::get('q')){
            $stks = Stock::where(function($query) use ($search){
                $query->where('st_date','LIKE',"%$search%")
                        ->orWhere('species','LIKE',"%$search%")
                        ->orWhere('ob_t','LIKE',"%$search%");
            })->paginate(5);
        }else{
          $stks =  DB::table('stocks')->paginate(12);
        }
        return $stks;
    }
}
