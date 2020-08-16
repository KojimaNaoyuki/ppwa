<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">

    <style media="screen">
      body {
        margin: 0;
        font-family: "M PLUS 1p";
        text-align: center;
        background-color: #add8e6;
      }

      header {
        text-align: left;
        height: 10%;
        padding-left: 30px;
        padding-top: 20px;
        margin: 0;
        margin-bottom: 5%;
      }

      span {
        font-size: 1.2em;
        color: #dc143c;
      }

      .wf-mplus1p { font-family: "M PLUS 1p"; }
      
      /* ///////////////////////////////////////////////////////////// */

      .text_in {
        margin-left: 5%;
        margin-right: 5%;
        margin-bottom: 10%;
        font-size: 1.3em;
      }

      /* ///////////////////////////////////////////////////////////// */

      .send_file_box {
        width: 80%;
        margin-left: 10%;
        margin-right: 10%;

        text-align: center;

        border-radius: 5px;
        border: solid 2px black;
      }

      .send_file_box h3 {
        margin: 0;
        border-bottom: solid 2px black;
        padding: 20px 10px;
        background-color: #b0c4de;
      }

      .send_file_box input {
        margin: 5%;
      }

      /* ///////////////////////////////////////////////////////////// */

      .img_area {
        margin-top: 10%;
        margin-left: 20%;
        margin-right: 20%;
        width: 60%;
        height: 40%;
        background-color: #f0f8ff;
        text-align: center;
      }
    </style>
  </head>
  <body>
    @yield('other')
    <header>
      @yield('header')
    </header>

    <section>
      @yield('origin')
    </section>

    <section>
      @yield('judg')
    </section>

    @yield('sc')
  </body>
</html>
