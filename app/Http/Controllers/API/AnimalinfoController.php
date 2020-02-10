<?php

namespace App\Http\Controllers\API;
use App\Exports\AnimalinfosExport;
use App\Imports\AnimalinfosImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Animalinfo;
class AnimalinfoController extends Controller
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
        return DB::table('animalinfos')->paginate(12);
        
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
            'animal_id' => 'required',
            'sr_no' => 'required',
            'ai_date' => 'required',
            'group_id' => 'required',
            'group_name' => 'required',
            'death_details' => 'required',
            'treatment_details' => 'required',
            'organs_hp' => 'required',
            'blood_collection' => 'required',
            'total_animals' => 'required',
            'total_groups' => 'required',
        ]);
       return Animalinfo::create($request->all());
    }
    public function import(Request $request){

        Excel::import(new AnimalinfosImport(),$request->pic);
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
        $ani = Animalinfo::findOrFail($id);
        $this->validate($request,[
            'animal_id' => 'required',
            'sr_no' => 'required',
            'ai_date' => 'required',
            'group_id' => 'required',
            'group_name' => 'required',
            'death_details' => 'required',
            'treatment_details' => 'required',
            'organs_hp' => 'required',
            // 'blood_collection' => 'required',
            'total_animals' => 'required',
            'total_groups' => 'required',
        ]);
        $ani ->update($request->all());
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
        $user = Animalinfo::findOrFail($id);
        $user->delete();
       return ['message'=>'data deleted'];
    }
    public function search(){
        if($search = \Request::get('q')){
            $anfs = Animalinfo::where(function($query) use ($search){
                $query->where('sr_no','LIKE',"%$search%")
                        ->orWhere('ai_date','LIKE',"%$search%")
                        ->orWhere('animal_id','LIKE',"%$search%");
            })->paginate(5);
        }else{
          $anfs =  DB::table('animalinfos')->paginate(12);
        }
        return $anfs;
    }
}
