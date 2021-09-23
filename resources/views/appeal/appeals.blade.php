@extends('voyager::master')
@section('content')
@php

$lang = app()->getLocale();


@endphp
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">


{{-- Top Buttons --}}
<div class="container-fluid">
    <h1 class="page-title">
        <i class="voyager-receipt"></i> @lang('appeals.appeals')
    </h1>
    @if(Auth::user()->hasRole('user'))
    <a href="{{route('voyager.appeals.create')}}" class="btn btn-success btn-add-new">
        <i class="voyager-plus"></i> <span>@lang('appeals.add')</span>
    </a>
    @endif


    <!-- /.modal -->

    <script>
    window.onload = function() {
        // Bulk delete selectors
        var $bulkDeleteBtn = $('#bulk_delete_btn');
        var $bulkDeleteModal = $('#bulk_delete_modal');
        var $bulkDeleteCount = $('#bulk_delete_count');
        var $bulkDeleteDisplayName = $('#bulk_delete_display_name');
        var $bulkDeleteInput = $('#bulk_delete_input');
        // Reposition modal to prevent z-index issues
        $bulkDeleteModal.appendTo('body');
        // Bulk delete listener
        $bulkDeleteBtn.click(function() {
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
                $.each($checkedBoxes, function() {
                    var value = $(this).val();
                    ids.push(value);
                })
                // Set input value
                $bulkDeleteInput.val(ids);
                // Show modal
                $bulkDeleteModal.modal('show');
            } else {
                // No row selected
                toastr.warning(@lang('appeals.warning'));
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
          {{-- <th scope="col">@lang('appeals.title')</th> --}}
          <th scope="col">@lang('appeals.region')</th>
          <th scope="col">@lang('appeals.route')</th>
          <th scope="col">@lang('appeals.author')</th>
          <th scope="col">@lang('appeals.action')</th>
          <th scope="col">@lang('appeals.status')</th>
          <th scope="col">@lang('appeals.buttons')</th>
        </tr>
      </thead>
      <tbody>
          @forelse($appeals as $appeal)
              <tr>
                  {{-- @dd($appeal->user()->first()->name); --}}
                  <th scope="row">{{ $appeal->id }}</th>
                  {{-- <td>{{ $appeal->title }}</td> --}}
                  <td>{{ ($appeal->region()->first() !== null) ? ($lang == "ru"
                       ? $appeal->region()->first()->ru : $appeal->region()->first()->uz) : 'Deleted Region' }}</td>
                  <td>{{  ($appeal->routes()->first() !== null) ? ($lang == "ru" ? $appeal->routes()->first()->ru : $appeal->routes()->first()->uz) : 'Deleted Route' }}</td>
                  <td>{{  ($appeal->user()->first() !== null) ? $appeal->user()->first()->name : 'Deleted User' }}</td>
                  <td>{{ ($appeal->action()->first() !== null) ? ($lang == "ru" ? $appeal->action()->first()->ru : $appeal->action()->first()->uz) : 'Deleted User' }}</td>
                  <td scope="row" class="btn btn-primary" style="margin: 6px; color: white; display: flex; border-radius: 2px; justify-content: center; align-items: center;{{ $appeal->status==1 ? 'background: green;' : ($appeal->status==2 ? 'background: #FF8C00;' : 'background: red;') }}">
                   {{ $appeal->status==1 ? trans('appeals.open') : ($appeal->status==2 ? trans('appeals.moderating') : trans('appeals.closed'))}}

                </td>

                <td scope="row"><a class="btn btn-primary" style="margin:auto;"
                        href="{{ route('voyager.appeals.show', $appeal->id) }}">@lang('appeals.show')</a>
                    @if(!Auth::user()->hasRole('user'))

                    @if(!Auth::user()->hasRole('moderator'))
                    <a class="btn btn-danger"  style="margin:auto;" href="{{ route('voyager.appeals.destroy', $appeal->id) }}">@lang('appeals.delete')</a>
                    <a class="btn btn-warning" style="margin:auto;" href="{{ route('voyager.appeals.edit', $appeal->id) }}">@lang('appeals.edit')</a>

                    @endif
                    <a class="btn btn-primary" style="margin:auto;" href="{{ route('answer.redirect', $appeal->id) }}">@lang('appeals.redirect')</a>

                    @endif
                    <a class="btn btn-primary" style="margin:auto;" href="{{ route('conversation.index', $appeal->id) }}">Chat</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });
});
</script>
@endsection
