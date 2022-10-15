<?php

namespace App\Http\Controllers;

use App\Models\Prediction;
use App\Models\Zodiak;
use App\Models\ZodiakPrediction;
use Illuminate\Http\Request;

class ZodiakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zodiaks = Zodiak::all();

        return view('index', compact('zodiaks'));

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
     * @param  \App\Models\Zodiak  $zodiak
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id= $request->input('id');
        if($id>0){
            $cnt= ZodiakPrediction::where('zodiak','=',$id)->where('dates','=',date('Y-m-d'))->count();
            if ($cnt == 0){
                $rand = random_int(1,300);
                $cnt = Prediction::where('id','>',$rand)->whereNotIn('id', function ($query) {
                    $query->select('prediction')
                        ->from('zodiak_predictions')
                        ->where('dates', '=', date('Y-m-d'));
                })->first();
                $data = [];

                $data[]=[
                    'zodiak' =>$id,
                    'prediction' => $cnt->id,
                    'dates' =>date('Y-m-d'),
                ];
                \DB::table('zodiak_predictions')->insert($data);
            }

            return view('show',[
                'zodiak' => Zodiak::find($id),
                'prediction' =>Prediction::whereIn('id', function ($query) use ($id) {
                    $query->select('prediction')
                        ->from('zodiak_predictions')
                        ->where('zodiak','=',$id)
                        ->where('dates', '=', date('Y-m-d'));
                })->first()
                    ////ZodiakPrediction::where('zodiak','=',$id)->where('dates','=',date('Y-m-d'))->first(),
            ]);
        }else {
            redirect('/');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zodiak  $zodiak
     * @return \Illuminate\Http\Response
     */
    public function edit(Zodiak $zodiak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zodiak  $zodiak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zodiak $zodiak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zodiak  $zodiak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zodiak $zodiak)
    {
        //
    }
}
