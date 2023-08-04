<?php

namespace App\Http\Controllers;
use App\Models\Division;
use App\Models\Zone;
use App\Models\BloodDonor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors=BloodDonor::all();
        return view('admin.donor.index',compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions=Division::all();
        $zones=Zone::all();
        return view('admin.donor.create',compact('divisions','zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donors=new BloodDonor;
        $donors->id = $request->division;
        $donors->name = $request->name;
        $donors->bloodGroup = $request->group;
        $donors->age = $request->age;
        $donors->phone = $request->number;
        $donors->nId = $request->nid;
        $donors->division_id = $request->division;
        $donors->zone_id = $request->zone;
        $donors->area = $request->area;
        
        $donors->save();
        return redirect()->back()->with('message','Blood Donor saved successfully');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodDonor $donor)
    {
        //$donor=BloodDonor::where('id',$id);
        $divisions=Division::all();
        $zones=Zone::all();
        return view('admin.donor.edit',compact('divisions','zones','donor'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
