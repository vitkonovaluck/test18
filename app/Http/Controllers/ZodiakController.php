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
        $cnt= Prediction::count();
        if ($cnt >0) {
            $zodiaks = Zodiak::all();

            return view('index', compact('zodiaks'));
        }else{
            return redirect()->route('load');
        }

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
                $cnt = Prediction::count();
                $rand = random_int(1,$cnt);
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

            $predict = Prediction::whereIn('id', function ($query) use ($id) {
                    $query->select('prediction')
                        ->from('zodiak_predictions')
                        ->where('zodiak','=',$id)
                        ->where('dates', '=', date('Y-m-d'));
                })->first();
            return $predict->name;
        }

    }

}
