<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; //追加
use Illuminate\Http\Request;

class db_studypageController extends Controller
{
  public function update_number(Request $request)
  {
    //学習ページ 投稿数 update
    $select_number = DB::table('picture') -> where('id' , $request -> thread_id) -> first();
    $param = [
      'number' => $select_number -> number + 1
    ];

    DB::table('picture') -> where('id' , $request -> thread_id) -> update($param);

    // print($request -> thread_id);
    //print("<p>select_number = " . $select_number -> number . "</p>");

    return redirect('/base/studypage?thread_id=' . $request -> thread_id . '&uploaed=1');
  }

  public function post_thread(Request $request)
  {
    //学習ページ スレッドを作成
    $thread_name = $request -> thread_name;

    $param = [
      'thread' => $thread_name,
      'number' => 0
    ];

    DB::table('picture') -> insert($param);

    $select_id = DB::table('picture') -> where('thread' , $thread_name) -> first();

    return redirect('/base/studypage?thread_id=' . $select_id -> id);
  }
}
