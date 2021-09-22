
@extends('voyager::master')
@section('content')

<style>

  .table-container{
    background-color: #fff;
    border-radius: 4px;
    padding: 80px 20px 20px;
    margin: 10px 20px;
    position: relative;
    overflow: hidden;
  }

  .pagination{
    float: right;
  }

  .table{
    color: #292929;
    font-weight: 500;
  }
  .table > tfoot > tr > th, .table > thead > tr > th{
    font-weight: 900;
    color: #292929;
    padding: 15px 0px;
  }
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
    vertical-align: middle;
  }

  .top-button-container{
    margin-top: 80px;
    padding-left: 20px 
  }
</style>

{{-- Top Buttons --}}
<div class="top-button-container">
  <a href="#" class="btn btn-success btn-add-new">
    <i class="voyager-plus"></i> <span>Добавить</span>
  </a>
  <a href="#" class="btn btn-danger" id="bulk_delete_btn">
    <i class="voyager-trash"></i> <span>Удалить выбранное</span>
  </a>
<!-- /.modal -->
</div>
{{-- Table Container --}}
<div class="table-container">
  {{-- Table --}}
  <table class="table">
      @php
          $lang = app()->getLocale();
      @endphp
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">{{ $lang == "en" ? "Title" : ($lang == "uz" ? "Mavzu" : "Тема") }}</th>
          <th scope="col">{{ $lang == "en" ? "Region" : ($lang == "uz" ? "Viloyat" : "Область") }}</th>
          <th scope="col">{{ $lang == "en" ? "Route" : ($lang == "uz" ? "Yo'nalish" : "Направление") }}</th>
          <th scope="col">{{ $lang == "en" ? "Author" : ($lang == "uz" ? "Muallif" : "Автор") }}</th>
          <th scope="col">{{ $lang == "en" ? "Action" : ($lang == "uz" ? "Murojaat turi" : "Тип заявления") }}</th>
          <th scope="col">{{ $lang == "en" ? "Status" : ($lang == "uz" ? "Holati" : "Cтатус") }}</th>
          <th scope="col">{{ $lang == "en" ? "Actions" : ($lang == "uz" ? "Harakatlar" : "Действия") }}</th>
        </tr>
      </thead>
      <tbody>
          @forelse($appeals as $appeal)
              <tr>
                  {{-- @dd($appeal->user()->first()->name); --}}
                  <th scope="row">{{ $appeal->id }}</th>
                  <td>{{ $appeal->title }}</td>
                  <td>{{ ($appeal->region()->first() !== null) ? ($lang == "ru" ? $appeal->region()->first()->ru : $appeal->region()->first()->uz) : 'Deleted Region' }}</td>
                  <td>{{  ($appeal->routes()->first() !== null) ? ($lang == "ru" ? $appeal->routes()->first()->ru : $appeal->routes()->first()->uz) : 'Deleted Route' }}</td>
                  <td>{{  ($appeal->user()->first() !== null) ? $appeal->user()->first()->name : 'Deleted User' }}</td>
                  <td>{{ ($appeal->action()->first() !== null) ? ($lang == "ru" ? $appeal->action()->first()->ru : $appeal->action()->first()->uz) : 'Deleted User' }}</td>
                  <td style=" color: white; {{ $appeal->status==1 ? 'color: green; font-weight: 900;' : ($appeal->status==2 ? 'color: yellow; font-weight: 900;' : 'color: red; font-weight: 900;') }}">{{ $appeal->status==1 ? "Open" : 'Closed' }}</td>
                  <td scope="row"><a class="btn btn-primary" href="{{ route('voyager.appeals.show', $appeal->id) }}">Show</a>
                      @if(!Auth::user()->hasRole('user'))
                      {{-- @if(user()->role) --}}
                      @if(!Auth::user()->hasRole('moderator'))
                          <a class="btn btn-danger" href="{{ route('voyager.appeals.destroy', $appeal->id) }}">Delete</a>
                          <a class="btn btn-warning" href="{{ route('voyager.appeals.edit', $appeal->id) }}">Edit</a>
  
                      @endif
                      <a class="btn btn-primary" href="{{ route('answer.redirect', $appeal->id) }}">To EXpert</a>
                      <a class="btn btn-primary" href="{{ route('conversation.index', $appeal->id) }}">Chat</a>
                      @endif
  
                  </td>
               </tr>
          @endforeach
      </tbody>
  </table>
  {{-- Pagination --}}
  <div class="pagination">{{ $appeals->links('pagination::bootstrap-4') }}</div>
</div>
@endsection
