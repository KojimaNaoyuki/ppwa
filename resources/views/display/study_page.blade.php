@extends('layouts.Base_workpage')

@section('title','Make AI')

@section('other')
  <div id="loding_display"></div>
@endsection

@section('header')
  <h1>みんなで作る<span>AI</span></h1>
@endsection

@section('right_bar')
  <div class="small_title">
    <h3>登録済みのスレッド</h3>
  </div>

  <div class="right_bar_content" onmousedown="thread_onclick()" id="thread_id">
    @php
      $ii = 0;
    @endphp
    @foreach($items as $item)
      @if($ii != 0)
        <div class="thread_content" id="thread_{{$ii}}">
          <p>{{$item -> thread}} ({{$item -> number}})</p>
        </div>
      @endif
      @php
        $ii++;
      @endphp
    @endforeach
  </div>

  <div class="small_title">
    <h3>新しくスレッドを作成</h3>
  </div>

  <form action="/db_studypage/post_thread" method="post">
    @csrf
    <p style="margin-top: 30px; margin-bottom: 40px;"><input type="text" name="thread_name" value="" placeholder="スレッド名を入力"></p>
    <input type="submit" name="" value="作成" class="submit_btn">
  </form>
@endsection

@section('center')
  <div class="text_in">
    <p>ファイルはjpgかpng形式をアップロードしてください。<br>
        画像は目的の物がなるべく中央に来ているものを使用してください。<br>
        プレビューに移っている形で学習されます。多少画像が崩れていても問題ありません。
    </p>
  </div>

  <div class="msg_area">
    <h3>{{$msg}}</h3>
  </div>

  <form method="post" action="/base/up_file" enctype="multipart/form-data" class="send_file_box">
    <h3>ファイルをアップロード</h3>
    @error('photo')
    <p>EROOR : {{$message}}</p>
    @enderror
    {{ csrf_field() }}
    <input type="hidden" name="thread_id_num" value="{{$thread_id_send}}">
    <input type="file" name="photo" id="img_id">
    <input type="submit">
  </form>
  <div class="img_area" id="img_area">
    <img src="" alt="" id="tg_img">
  </div>
@endsection

@section('sc')
  <script type="text/javascript">
    var threadElement = document.getElementById("thread_id");
    var interval; var eventID;
    var clicked_thread = 1;

    document.getElementById('img_id').addEventListener("change",event => {
      console.log("change img_id");

      ///////////////////////////////////////////
      var obj = document.images['tg_img']

      obj.height = 300;
      obj.width = 300;
      ///////////////////////////////////////////

      event.preventDefault();     // デフォルトイベントのキャンセル
      event.stopPropagation();    // イベントのバブリングを防ぐ

      var file = event.target.files[0];

      var reader = new FileReader(); //ローカルファイルを読み込む

      reader.addEventListener('load', event => {
        //FileReaderの読み込みが完了したら実行
        console.log("load FileReader");
        document.getElementById('tg_img').setAttribute('src',event.target.result);
      });
      reader.readAsDataURL(file); //ファイルを読み込む
    });

    //////////////////////////////////////////////////////////////////////////////////////

    window.onload = function() {
      console.log("javascript");

      document.getElementById("thread_{{$thread_id_send-1}}").style.background = "#66cdaa";
    }

    //////////////////////////////////////////////////////////////////////////////////////

    function thread_onclick()
    {
      var click_eventID;
      console.log("click MAX({{$ii}})");

      threadElement.addEventListener("click", function(event) {
        click_eventID = event.target.id;
        console.log("clicked = " + click_eventID);

        for(var i = 0; i < {{$ii}}; i++) {
          if(click_eventID == "thread_" + i) {
            location.href = "http://localhost:8000/base/studypage?thread_id=" + (i+1);
          }
        }
      },false);

    }
  </script>
@endsection
