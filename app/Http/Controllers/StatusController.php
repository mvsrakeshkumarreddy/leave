<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $crew_id = Auth::user()->crew_id;
  //       $users = DB::select('select * from applies');

//$usersstatus = DB::table('applies')->whereIn('crew_id', [$crew_id])->get();

        $latestPosts = DB::table('applies')
                   ->select('id','crew_id', DB::raw('(TIMESTAMPDIFF(DAY, fromdate,todate)+1) as days'))->distinct('id')->whereIn('crew_id', [$crew_id]);


$usersstatus = DB::table('applies')
        ->joinSub($latestPosts, 'latest_posts', function ($join) {
            $join->on('applies.id', '=', 'latest_posts.id');
        })->distinct('applies.id')->get();



    /*    

$first = DB::table('applies')
            ->whereNull('first_name');

$usersstatus = DB::table('applies')
            ->whereNull('last_name')
            ->union($first)
            ->get();

*/
        return view('status',['usersstatus'=>$usersstatus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
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
