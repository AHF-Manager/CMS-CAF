<?php

namespace App\Http\Controllers\API;
use App\Exports\BreedingsExport;
use App\Imports\BreedingsImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Breeding;
class BreedingController extends Controller
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
        return DB::table('breedings')->orderBy('id','DESC')->paginate(7);     
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
            'breed' => 'required',
            'start' => 'required',
            'male_id' => 'required',
            'female_id' => 'required',
            'seperate' => 'required',
            'delivery' => 'required',
            'del_male' => 'required',
            'del_female' => 'required',
            'tot' => 'required',
            'weaning' => 'required',
            'pup_male' => 'required',
            'pup_female' => 'required',
            'total' => 'required',
        ]);
       return Breeding::create($request->all());
    }
    public function import(Request $request){

        Excel::import(new BreedingsImport(),$request->pic);
       //  return redirect()->route('dailyacts.index');

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
        $brd = Breeding::findOrFail($id);
        $this->validate($request,[
            'breed' => 'required',
            'start' => 'required',
            'male_id' => 'required',
            'female_id' => 'required',
            'seperate' => 'required',
            'delivery' => 'required',
            'del_male' => 'required',
            'del_female' => 'required',
            'tot' => 'required',
            'weaning' => 'required',
            'pup_male' => 'required',
            'pup_female' => 'required',
            'total' => 'required',
        ]);
        $brd ->update($request->all());
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
        $user = Breeding::findOrFail($id);
        $user->delete();
       return ['message'=>'data deleted'];
    }
    public function search(){
        if($search = \Request::get('q')){
            $brds = Breeding::where(function($query) use ($search){
                $query->where('breed','LIKE',"%$search%")
                        ->orWhere('start','LIKE',"%$search%")
                        ->orWhere('male_id','LIKE',"%$search%")
                        ->orWhere('female_id','LIKE',"%$search%")
                        ->orWhere('weaning','LIKE',"%$search%");
            })->paginate(5);
        }else{
          $brds =  DB::table('breedings')->paginate(12);
        }
        return $brds;
    }
}
