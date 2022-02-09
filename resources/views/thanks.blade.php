@extends('layouts.default')

@section('content')
<p >ご意見いただきありがとうございました。</p>
<button class="top-btn">トップページへ</button>

<style>
  p {
    font-size: 18px;
    text-align: center;
    margin-top: 200px
  }

  .top-btn {
    display: block;
    font-size: 20px;
    color: white;
    background-color: #0000ad;
    border: none;
    border-radius: 5px;
    padding: 5px 30px;
    margin: 50px auto;
  }
</style>
@endsection