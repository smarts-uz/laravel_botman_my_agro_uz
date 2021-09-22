
@extends('voyager::master')
@section('content')
@php
          if(json_decode(Auth::user()->settings)!=null){
            $lang = json_decode(Auth::user()->settings)->locale;
          } else 
          $lang = app()->getLocale();
          
      @endphp
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap.min.css">
<!-- <style>

  tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style> -->

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
  <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                  <td class="btn mt-2" style=" color: white; {{ $appeal->status==1 ? 'background: green; margin-top: 18%;' : ($appeal->status==2 ? 'background: yellow;' : 'background: red; margin-top: 18%;') }}">
                    {{$lang == "ru" ?  ($appeal->status==1 ? "Открытый" : ($appeal->status==2 ? "Модерирование" : 'закрытый);' )) : ($lang == "uz" ?  ($appeal->status==1 ? "Ochiq" : ($appeal->status==2 ? "Ko'rilmoqda" : 'yopilgan' )):  ($appeal->status==1 ? "Open" : ($appeal->status==2 ? "Moderating" : 'Closed' )))}}
                 
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
      <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
      </thead>
 
 <tfoot>
     <tr>
         <th>Name</th>
         <th>Position</th>
         <th>Office</th>
         <th>Age</th>
         <th>Start date</th>
         <th>Salary</th>
     </tr>
 </tfoot>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>
@endsection
