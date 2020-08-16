@extends('layouts.Base_default')

@section('title','Make AI')

@section('top_content')
  <h1>みんなで作る<span>AI</span></h1>

  <p style="margin-top: 20%;">
    このAIは白黒のドット絵を判定するAIです。しかし、まだまだ学習不足です。<br>
    皆さんがこのAIに学習させていってください。何を学習させるかは自由です。<br>
    どんどん書き込み、AIの精度を高めていきましょう。
  </p>

  <div class="btn" id="judg_btn"><p>判定させる</p></div>
  <div class="btn" id="study_btn"><p>学習させる</p></div>
@endsection

@section('sc')
  <script type="text/javascript">
    document.getElementById('judg_btn').onclick = function() {
      location.href = "base/judgpage";
    }
    document.getElementById('study_btn').onclick = function() {
      location.href = "base/studypage?thread_id=1";
    }
  </script>
@endsection
