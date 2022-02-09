@extends('layouts.default')

@section('title', '内容確認')

@section('content')

<form action="{{ route('create') }}" method="post">
  @csrf
  <table>
    <tr>
      <th class="row1">お名前</th>
      <td>{{ $form->lastname." ".$form->firstname }}</td>
      <input type="hidden" name="fullname" value="{{$form->lastname.$form->firstname}}">
    </tr>
    <tr>
      <th>性別</th>
      @if($form->gender === 1)
      <td>男性</td>
      @else
      <td>女性</td>
      @endif
      <input type="hidden" name="gender" value="{{ $form->gender }}">
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>{{ $form->email }}</td>
      <input type="hidden" name="email" value="{{ $form->email }}">
    </tr>
    <tr>
      <th>郵便番号</th>
      <td>{{ $form->postcode }}</td>
      <input type="hidden" name="postcode" value="{{ $form->postcode }}">
    </tr>
    <tr>
      <th>住所</th>
      <td>{{ $form->address }}</td>
      <input type="hidden" name="address" value=" {{ $form->address }}">
    </tr>
    <tr>
      <th>建物名</th>
      <td>{{ $form->building_name }}</td>
      <input type="hidden" name="building_name" value=" {{ $form->building_name }}">
    </tr>
    <tr>
      <th>ご意見</th>
      <td>{{ $form->opinion }}</td>
      <input type="hidden" name="opinion" value=" {{ $form->opinion }}">
    </tr>
  </table>
  <button class="submit-btn" type="submit">送信</button>
</form>
<a class="back-btn" href="#" onclick="history.back()">修正する</button>


  <style>
    table {
      width: 60%;
      margin: 0 auto;
    }

    th,
    td {
      padding: 25px;
      text-align: left;
      vertical-align: middle;
    }

    .row1 {
      width: 230px;
    }

    .submit-btn {
      display: block;
      font-size: 20px;
      color: white;
      background-color: #0000ad;
      border: none;
      border-radius: 5px;
      padding: 5px 50px;
      margin: 20px auto 0;
    }

    .back-btn {
      display: block;
      text-align: center;
      margin: 20px auto;
    }
  </style>
  @endsection