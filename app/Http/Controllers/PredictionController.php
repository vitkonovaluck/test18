<?php

namespace App\Http\Controllers;
use App\Models\Prediction;
use Illuminate\Http\Request;
use File;

class PredictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prediction');//страница загрузки предсказаний
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){//проверяем метод запроса
            if($request->hasFile('files')) {//проверяем есть ли в запросе элемент files в запросе

                $file = $request->file('files');//присваиваем имя файла
                $file->move(public_path() . '/path','prediction.txt'); //сохраняем на сервере
                $contents = File::get(public_path() . '/path/prediction.txt');//читаем файл с предсказаниями
                $contents =  explode(".", $contents);//создаем из котекста масив
                $predict = [];
                foreach ($contents as $content){
                    $predict[]=['name'=>$content];//создает обьектный масив
                }

                \DB::table('predictions')->truncate();//очищаем таблицу с предсказаниями
                \DB::table('predictions')->insert($predict);//вносим предсказания из файла
                return redirect()->route('home');//переходим на начальную страницу
            }
        };
    }

}
