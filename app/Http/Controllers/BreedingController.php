<?php

namespace App\Http\Controllers;
use App\Breeding;
use App\Exports\BreedingsExport;
use App\Imports\BreedingsImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BreedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breedings = DB::table('breedings')->paginate(5);
        return view('breedings.index',['breedings'=>$breedings]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('breedings.create');
        
    }

    public function search(Request $request )
    {
        $search = $request->get('search');
        $breedings = DB::table('breedings')->where('breed','LIKE','%'.$search.'%')
        ->orWhere('male_id','=',$search)
        ->orWhere('female_id','=',$search)
        ->orWhere('seperate','=',$search)
        ->orWhere('delivery','=',$search)
        ->orWhere('weaning','=',$search)
        ->orWhere('start','=',$search)
        ->paginate(5);
        return view('breedings.index',['breedings'=>$breedings]);
    }

    public function export(){

        return Excel::download(new BreedingsExport(),'breedings.xlsx');

    }

    public function import(Request $request){

        Excel::import(new BreedingsImport(),$request->file('import_file'));
        return redirect()->route('breedings.index')->with('success','file has been uploaded.');

   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $breed =$request->get('breed');
        $start =$request->get('start');
        $male_id =$request->get('male_id');
        $female_id =$request->get('female_id');
        $seperate =$request->get('seperate');
        $delivery =$request->get('delivery');
        $del_male =$request->get('del_male');
        $del_female =$request->get('del_female');
        $tot =$request->get('tot');
        $weaning =$request->get('weaning');
        $pup_male =$request->get('pup_male');
        $pup_female =$request->get('pup_female');
        $m_male =$request->get('m_male');
        $m_female =$request->get('m_female');
        $total =$request->get('total');


        $breedings = DB::insert('insert into breedings(breed,start,male_id,female_id,seperate,delivery,del_male,del_female,tot,weaning,pup_male,pup_female,m_male,m_female,total) value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        [$breed,$start,$male_id,$female_id,$seperate,$delivery,$del_male,$del_female,$tot,$weaning,$pup_male,$pup_female,$m_male,$m_female,$total]);
        if($breedings){
            $red = redirect('breedings')->with('success','data has been inserted');

        }else{
            $red = redirect('breedings/create')->with('warning','Something Went Wrong');
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
        $breedings= DB::select('select * from breedings where id=?',[$id]);
        return view('breedings.show',['breedings'=>$breedings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breedings = DB::select('select * from breedings where id=?',[$id]);
        return view('breedings.edit',['breedings'=>$breedings]);
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
        $breed =$request->get('breed');
        $start =$request->get('start');
        $male_id =$request->get('male_id');
        $female_id =$request->get('female_id');
        $seperate =$request->get('seperate');
        $delivery =$request->get('delivery');
        $del_male =$request->get('del_male');
        $del_female =$request->get('del_female');
        $tot =$request->get('tot');
        $weaning =$request->get('weaning');
        $pup_male =$request->get('pup_male');
        $pup_female =$request->get('pup_female');
        $m_male =$request->get('m_male');
        $m_female =$request->get('m_female');
        $total =$request->get('total');
        $breedings = DB::update('update breedings set breed=?,start=?,male_id=?,female_id=?,seperate=?,delivery=?,del_male=?,del_female=?,tot=?,weaning=?,pup_male=?,pup_female=?,m_male=?,m_female=?,total=? where id=?',
        [$breed,$start,$male_id,$female_id,$seperate,$delivery,$del_male,$del_female,$tot,$weaning,$pup_male,$pup_female,$m_male,$m_female,$total,$id]);
        if($breedings){
            $red = redirect('breedings')->with('success','Data has been updated');
        }else{
            $red = redirect('breedings/edit/'.$id)->with('warning','Something Went Wrong');
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
        $breedings = DB::delete('delete from breedings where id=?',[$id]);
        $red = redirect('breedings')->with('success','Data has been deleted.');
        return $red;
    }
}
