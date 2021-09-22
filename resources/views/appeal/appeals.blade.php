
@extends('voyager::master')
@section('content')
@php
          if(json_decode(Auth::user()->settings)!=null){
            $lang = json_decode(Auth::user()->settings)->locale;
          } else
          $lang = app()->getLocale();

      @endphp
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
<div class="container-fluid">
  <h1 class="page-title">
      <i class="voyager-person"></i> {{$lang == "ru" ? "Пользователи" : ($lang == "uz" ? "Arizalar" : "Appeals")}}
  </h1>
  @if(Auth::user()->hasRole('user'))
  <a href="{{route('voyager.appeals.create')}}" class="btn btn-success btn-add-new">
    <i class="voyager-plus"></i> <span>Добавить</span>
  </a>
  @endif


<!-- /.modal -->

  <script>
    window.onload = function () {
    // Bulk delete selectors
    var $bulkDeleteBtn = $('#bulk_delete_btn');
    var $bulkDeleteModal = $('#bulk_delete_modal');
    var $bulkDeleteCount = $('#bulk_delete_count');
    var $bulkDeleteDisplayName = $('#bulk_delete_display_name');
    var $bulkDeleteInput = $('#bulk_delete_input');
    // Reposition modal to prevent z-index issues
    $bulkDeleteModal.appendTo('body');
    // Bulk delete listener
    $bulkDeleteBtn.click(function () {
      var ids = [];
      var $checkedBoxes = $('#dataTable input[type=checkbox]:checked').not('.select_all');
      var count = $checkedBoxes.length;
      if (count) {
          // Reset input value
          $bulkDeleteInput.val('');
          // Deletion info
          var displayName = count > 1 ? 'Пользователи' : 'User';
          displayName = displayName.toLowerCase();
          $bulkDeleteCount.html(count);
          $bulkDeleteDisplayName.html(displayName);
          // Gather IDs
          $.each($checkedBoxes, function () {
              var value = $(this).val();
              ids.push(value);
          })
          // Set input value
          $bulkDeleteInput.val(ids);
          // Show modal
          $bulkDeleteModal.modal('show');
      } else {
          // No row selected
          toastr.warning('Вы ничего не выбрали для удаления!');
      }
    });
    }
  </script>
</div>
{{-- Table Container --}}
<div class="table-container">
  {{-- Table --}}
  <table class="table">

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
                  <td class="mt-2 btn" style=" color: white; {{ $appeal->status==1 ? 'background: green; margin-top: 18%;' : ($appeal->status==2 ? 'background: yellow;' : 'background: red; margin-top: 18%;') }}">
                    {{$lang == "ru" ?  ($appeal->status==1 ? "Открытый" : ($appeal->status==2 ? "Модерирование" : 'закрытый' )) : ($lang == "uz" ?  ($appeal->status==1 ? "Ochiq" : ($appeal->status==2 ? "Ko'rilmoqda" : 'yopilgan' )):  ($appeal->status==1 ? "Open" : ($appeal->status==2 ? "Moderating" : 'Closed' )))}}

                  </td>
                  <td scope="row"><a class="btn btn-primary" href="{{ route('voyager.appeals.show', $appeal->id) }}">Show</a>
                      @if(!Auth::user()->hasRole('user'))

                      @if(!Auth::user()->hasRole('moderator'))
                          <a class="btn btn-danger" href="{{ route('voyager.appeals.destroy', $appeal->id) }}">Delete</a>
                          <a class="btn btn-warning" href="{{ route('voyager.appeals.edit', $appeal->id) }}">Edit</a>

                      @endif
                      <a class="btn btn-primary" href="{{ route('answer.redirect', $appeal->id) }}">To EXpert</a>

                      @endif
<a class="btn btn-primary" href="{{ route('conversation.index', $appeal->id) }}">Chat</a>
                  </td>
               </tr>
          @endforeach
      </tbody>
  </table>
  {{-- Pagination --}}
  <div class="pagination">{{ $appeals->links('pagination::bootstrap-4') }}</div>
</div>
@endsection
