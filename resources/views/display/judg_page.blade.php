@extends('layouts.Base_judgpage')

@section('title','Make AI')

@section('header')
  <h1>みんなで作る<span>AI</span></h1>
@endsection

@section('origin')
  <h2>判定させたい画像をアップロード</h2>
  <form method="post" action="judg_file" enctype="multipart/form-data" class="send_file_box">
    <h3>ファイルをアップロード</h3>
    @error('photo')
    <p>EROOR : {{$message}}</p>
    @enderror
    {{ csrf_field() }}
    <input type="file" name="photo" id="img_id">
    <input type="submit">
  </form>
  <div class="img_area" id="img_area">
    <img src="" alt="" id="tg_img">
  </div>
@endsection

@section('judg')
  <h2>判定結果</h2>
  <div class="msg_area">
    <p>{{$thread_name}}</p>
  </div>
@endsection

@section('sc')
  <script type="text/javascript">
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
  </script>
@endsection
