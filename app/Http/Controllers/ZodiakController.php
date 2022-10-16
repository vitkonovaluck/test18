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
        $cnt= Prediction::count();//Количестпо предсказаний в базе
        if ($cnt >0) {//виводим начальную страницу
            $zodiaks = Zodiak::all();

            return view('index', compact('zodiaks'));
        }else{//виводим страницу загрузки предсказаний
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
        //вывод предсказаний
        $id= $request->input('id'); //узнаем код знака зодиака
        if($id>0){
            $cnt= ZodiakPrediction::where('zodiak','=',$id)->where('dates','=',date('Y-m-d'))->count(); //есть ди предсказание на текущюю дату
            if ($cnt == 0){ //есали нету
                $cnt = Prediction::count();//узнаем количество предсказаний в базе
                $rand = random_int(1,$cnt);//выбираем случайное предсказание
                $cnt = Prediction::where('id','>',$rand)->whereNotIn('id', function ($query) {
                    $query->select('prediction')
                        ->from('zodiak_predictions')
                        ->where('dates', '=', date('Y-m-d'));
                })->first();//проверяем используется ли это предсказание сегодня
                            //если нет то берем его, если да то берем следующее свободное за ним
                $data = [];

                $data[]=[
                    'zodiak' =>$id,
                    'prediction' => $cnt->id,
                    'dates' =>date('Y-m-d'),
                ];
                \DB::table('zodiak_predictions')->insert($data);//записываем предсказание на текущую дату
            }

            $predict = Prediction::whereIn('id', function ($query) use ($id) {
                    $query->select('prediction')
                        ->from('zodiak_predictions')
                        ->where('zodiak','=',$id)
                        ->where('dates', '=', date('Y-m-d'));
                })->first(); //выводим предсказание для нужного знака зодиака
            return $predict->name;
        }

    }

}
