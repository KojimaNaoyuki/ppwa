<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; //追加
use App\Http\Requests\BaseRequest; //追加
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
      //ログインフォーム
      return view('display.index');
    }

    public function study_page(Request $request)
    {
      //学習ページ
      $items = DB::table('picture') -> get();
      $thread_id_send = $request -> thread_id;
      $uploaed = $request -> uploaed;

      if($uploaed == 1) {
        $msg = "ファイルのアップロードが完了しました";
      } else {
        $msg = "";
      }

      return view('display.study_page',['items' => $items,'thread_id_send' => $thread_id_send,'msg' => $msg]);
    }

    public function up_file(BaseRequest $request)
    {
      //ファイルをアップロード

      $request -> photo -> store('public/photo_images/origin/thread_' . $request -> thread_id_num); //これでstorage/app/public/photo_images/originの中に保存される
      $request -> photo -> store('public/photo_images/origin_del/thread_' . $request -> thread_id_num); //これでstorage/app/public/photo_images/originの中に保存される

      //exec()を使う時laravelではppwa/publicがパスのディフォルトになっている
      $command = "python resize.py"; //絶対パスを指定する
      print($command);
      print("<br>");
      print("////////////////////////////<br>");
      $result = exec($command, $output, $return_var); //パイソンを呼び出す(リサイズ)
      print_r($output);
      print("<br>");
      print("////////////////////////////<br>");
      print_r($return_var);
      print("<br>");
      print("////////////////////////////<br>");
      print_r($result);

      return redirect('db_studypage/studypage?thread_id=' . $request -> thread_id_num);
    }

    public function judg_page(Request $request)
    {
      //判定ページ
      return view('display.judg_page');
    }
}
