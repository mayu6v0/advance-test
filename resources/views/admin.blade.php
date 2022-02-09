@extends('layouts.default')

@section('title', '管理システム')

@section('content')
<div class="container">
  <div class="search-field">
    <form action="{{ route('search') }}" method="get">
      @csrf
      <table class="search-field__table">
        <tr>
          <th class="search-field__table--column1">お名前</th>
          <td>
            <input class="input--txt" type="text" name="fullname" value="{{ $keywords->fullname }}">
          </td>
          <th class="search-field__table--column3">性別</th>
          <td class="search-field__table--column4 flex-item">
            <label><input class="radio-btn" type="radio" name="gender" value="" @php echo ($keywords->gender == "") ? "checked" : ""; @endphp>全て</label>
            <label><input class="radio-btn" type="radio" name="gender" value="1" @php echo ($keywords->gender === "1") ? "checked" : ""; @endphp>男性</label>
            <label><input class="radio-btn" type="radio" name="gender" value="2" @php echo ($keywords->gender === "2") ? "checked" : ""; @endphp>女性</label>
          </td>
        </tr>
        <tr>
          <th>登録日</th>
          <td>
            <input class="input--txt" type="date" name="date_from" value="{{ $keywords->date_from }}">
          </td>
          <td colspan=" 2">
            〜 <input class="input--txt" type="date" name="date_until" value="{{ $keywords->date_until }}">
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input class="input--txt" type="text" name="email" value="{{ $keywords->email }}">
          </td>
        </tr>
      </table>
      <button class="search-btn">検索</button>
    </form>
    <a class="reset-btn" href="{{ route('search') }}">リセット</a>
  </div>

  {{ $items->appends(request()->input())->links() }}

  <table class="results__table">
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th class="results__table--column5">ご意見</th>
      <th></th>
    </tr>

    @foreach($items as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->fullname }}</td>

      @if($item->gender === 1)
      <td>男性</td>
      @else
      <td>女性</td>
      @endif
      </td>
      <td>{{ $item->email }}</td>
      <td class="results__table--column5-td">{{ $item->opinion }}</td>
      <td>
        <form action="{{ route('delete', ['id' => $item->id])}}" method="post">
          @csrf
          <button class="delete-btn" type="submit">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>

<style>
  .search-field {
    width: 1100px;
    margin: 10px auto 20px;
    padding: 15px;
    border: 1px solid black;
  }

  .ssearch-field__table {
    width: 80%;
  }

  .search-field__table th,
  .search-field__table td {
    text-align: left;
    padding: 15px;
  }

  .search-field__table--column1 {
    width: 180px;
  }

  .search-field__table--column3 {
    width: 80px;
  }

  .search-field__table--column4 {
    width: 350px;
  }

  .input--txt {
    line-height: 18px;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 200px;
  }

  .radio-btn {
    transform: scale(2.0);
    bottom: 4px;
    position: relative;
    margin-right: 15px;
  }

  .flex-item {
    display: flex;
    justify-content: space-around;
  }

  .search-btn {
    display: block;
    font-size: 20px;
    color: white;
    background-color: #0000ad;
    border: none;
    border-radius: 5px;
    padding: 5px 50px;
    margin: 20px auto 0;
  }

  .reset-btn {
    display: block;
    text-align: center;
    margin: 20px auto;
  }

  .flex_item-paginator {
    display: flex;
    justify-content: space-between;
  }

  svg.w-5.h-5 {
    width: 30px;
    height: 30px;
  }

  .results__table {
    width: 1100px;
    font-size: 14px;
    margin: 20px auto;
    text-align: center;
  }

  .results__table tr:first-of-type {
    border-bottom: 1px solid black;
  }

  .results__table th,
  .results__table td {
    padding: 15px;
    text-align: left;
  }

  .results__table--column5 {
    width: 37%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    max-width: 0;
  }

  .results__table--column5-td {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    max-width: 0;
  }

  .results__table--column5-td:hover {
    white-space: normal;
  }

  .delete-btn {
    display: block;
    font-size: 16px;
    color: white;
    background-color: #0000ad;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    margin: 20px auto 0;
  }
</style>

@endsection