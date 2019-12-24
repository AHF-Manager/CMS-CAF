<?php

namespace App\Http\Controllers;
use App\Animalinfo;
use App\Exports\AnimalinfosExport;
use App\Imports\AnimalinfosImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AnimalinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animalinfos = DB::table('animalinfos')->paginate(5);
        return view('animalinfos.index',['animalinfos'=>$animalinfos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animalinfos.create');
    }
    public function search(Request $request )
    {
        $search = $request->get('search');
        $animalinfos = DB::table('animalinfos')->where('ai_date','=',$search)->orWhere('animal_id','=',$search)->paginate(5);
        return view('animalinfos.index',['animalinfos'=>$animalinfos]);
    }

    public function export(){

        return Excel::download(new AnimalinfosExport(),'animalinfos.xlsx');

    }
    public function import(Request $request){

        Excel::import(new AnimalinfosImport(),$request->file('import_file'));
        return redirect()->route('animalinfos.index')->with('success','file has been uploaded.');

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
        $animal_id =$request->get('animal_id');
        $sr_no =$request->get('sr_no');
        $ai_date =$request->get('ai_date');
        $group_id =$request->get('group_id');
        $group_name =$request->get('group_name');
        $death_details =$request->get('death_details');
        $treatment_details =$request->get('treatment_details');
        $organs_hp =$request->get('organs_hp');
        $blood_collection =$request->get('blood_collection');
        $total_animals =$request->get('total_animals');
        $total_groups =$request->get('total_groups');
        $remarks =$request->get('remarks');
        $animalinfos = DB::insert('insert into animalinfos(sr_no,ai_date,group_id,group_name,death_details,treatment_details,organs_hp,blood_collection,total_animals,total_groups,remarks,animal_id) value(?,?,?,?,?,?,?,?,?,?,?,?)',
        [$sr_no,$ai_date,$group_id,$group_name,$death_details,$treatment_details,$organs_hp,$blood_collection,$total_animals,$total_groups,$remarks,$animal_id]);
        if($animalinfos){
            $red = redirect('animalinfos')->with('success','data has been inserted');

        }else{
            $red = redirect('animalinfos/create')->with('warning','Something Went Wrong');
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
        $animalinfos = DB::select('select * from animalinfos where id=?',[$id]);
        return view('animalinfos.show',['animalinfos'=>$animalinfos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animalinfos = DB::select('select * from animalinfos where id=?',[$id]);
        return view('animalinfos.edit',['animalinfos'=>$animalinfos]);
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
        $request->validate([
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
        $animal_id =$request->get('animal_id');
        $sr_no =$request->get('sr_no');
        $ai_date =$request->get('ai_date');
        $group_id =$request->get('group_id');
        $group_name =$request->get('group_name');
        $death_details =$request->get('death_details');
        $treatment_details =$request->get('treatment_details');
        $organs_hp =$request->get('organs_hp');
        $blood_collection =$request->get('blood_collection');
        $total_animals =$request->get('total_animals');
        $total_groups =$request->get('total_groups');
        $remarks =$request->get('remarks');
        $animalinfos = DB::update('update animalinfos set sr_no=?,ai_date=?,group_id=?,group_name=?,death_details=?,treatment_details=?,organs_hp=?,blood_collection=?,total_animals=?,total_groups=?,remarks=?,animal_id=? where id=?',
        [$sr_no,$ai_date,$group_id,$group_name,$death_details,$treatment_details,$organs_hp,$blood_collection,$total_animals,$total_groups,$remarks,$animal_id,$id]);
        if($animalinfos){
            $red = redirect('animalinfos')->with('success','Data has been updated');
        }else{
            $red = redirect('animalinfos/edit/'.$id)->with('warning','Something Went Wrong');
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
        $animalinfos = DB::delete('delete from animalinfos where id=?',[$id]);
        $red = redirect('animalinfos')->with('success','Data has been deleted.');
        return $red;
    }
}
