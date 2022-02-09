@extends('layouts.default')

@section('title', 'お問い合わせ')

@section('content')
<form action="{{ route('confirm') }}" method="post" class="h-adr" id="contact-form">
  @csrf
  <table>
    <tr>
      <th class="column1">
        <label for="lastname">お名前 <span>※</span></label>
      </th>
      <td class="column2">
        <input class="input--narrow" id="lastname" type="text" name="lastname" required>
      </td>
      <td class="column3">
        <input class="input--narrow" id="firstname" type="text" name="firstname" required>
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <small class="error" id="error--lastname"></small>
      </td>
      <td>
        <small class="error" id="error--firstname"></small>
      </td>
    </tr>
    <tr>
      <th></th>
      <td class="example">例）山田</td>
      <td class="example">例）太郎</td>
    </tr>
    <tr>
      <th>性別 <span>※</span></th>
      <td class="flex-item">
        <label><input class="radio-btn" type="radio" name="gender" value="1" checked> 男性</label>
        <label><input class="radio-btn" type="radio" name="gender" value="2"> 女性</label>
      </td>
    </tr>
    <tr>
      <th>
        <label for="email">メールアドレス <span>※</span></label>
      </th>
      <td colspan="2">
        <input class="input--wide" id="email" type="email" name="email" required><br>
        <small class="error" id="error--email"></small>
      </td>
    </tr>
    <tr>
      <th></th>
      <td class="example">例）test@example.com</td>
    </tr>
    <tr>
      <th>
        <label for="postcode">郵便番号 <span>※</span></label>
      </th>
      <td colspan="2">
        <span class="p-country-name" style="display:none;">Japan</span>
        〒 <input class="input--wide2 p-postal-code" id="postcode" type="text" name="postcode" pattern="^\d{3}-\d{4}$" oninput="value = onlyNumbers(value)" required><br>
        <small class="error" id="error--postcode"></small>
      </td>
    <tr>
      <th></th>
      <td class="example">例）123-4567</td>
    </tr>
    <tr>
      <th>
        <label for="address">住所 <span>※</span></label>
      </th>
      <td colspan="2">
        <input class="input--wide p-region p-locality p-street-address p-extended-address" id="address" type="text" name="address" required><br>
        <small class="error" id="error--address"></small>
      </td>
    </tr>
    <tr>
      <th></th>
      <td class="example">例）東京都渋谷区千駄ヶ谷1-2-3</td>
    </tr>
    <tr>
      <th>
        <label for="building_name">建物名</label>
      </th>
      <td colspan="2">
        <input class="input--wide" id="building_name" type="text" name="building_name">
      </td>
    </tr>
    <tr>
      <th></th>
      <td class="example">例）千駄ヶ谷マンション101</td>
    </tr>
    <tr>
      <th>
        <label for="opinion">ご意見 <span>※</span></label>
      </th>
      <td colspan="2">
        <textarea class="input--wide" id="opinion" name="opinion" rows="4" maxlength="120" required></textarea><br>
        <small class="error" id="error--opinion"></small>
      </td>
    </tr>
  </table>
  <input class="submit-btn" id="submit-btn" type="submit" value="確認">
</form>

<style>
  table {
    width: 70%;
    margin: 50px auto;
  }

  th,
  td {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
  }

  .column1 {
    width: 200px;
  }

  .column2,
  .column3 {
    width: 300px;
    padding-bottom: 0;
  }

  input,
  textarea {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  input {
    line-height: 18px;
  }

  .input--narrow {
    width: 250px;
  }

  .input--wide {
    width: 550px;
  }

  .input--wide2 {
    width: 530px;
  }

  span {
    color: red;
  }

  .error {
    font-size: 12px;
    color: red;
    margin-top: 0;
  }

  .example {
    color: gray;
    font-size: 14px;
    padding-top: 0;
  }

  .flex-item {
    display: flex;
    justify-content: space-around;
  }

  .radio-btn {
    transform: scale(2.0);
    bottom: 4px;
    position: relative;
    margin-right: 15px;
  }

  .submit-btn {
    display: block;
    font-size: 20px;
    color: white;
    background-color: #0000ad;
    border: none;
    border-radius: 5px;
    padding: 10px 50px;
    margin: 50px auto;
  }
</style>
@endsection