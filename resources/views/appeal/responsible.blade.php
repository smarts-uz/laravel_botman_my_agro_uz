@extends('voyager::master')
@section('content')
    <div class="side-body padding-top">
        <h1 class="page-title">
            <i class=""></i>
            Redirect appeal to expert
        </h1>
        <div id="voyager-notifications"></div>
        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bor dered">
                        <!-- form start -->
                        <form role="form" class="form-edit-add" action="{{ route('answer.update', $appeal) }}"
                              method="GET">
                            <!-- PUT Method if we are editing -->
                            @csrf
                        <!-- CSRF TOKEN -->

                            <div class="panel-body">


                                <!-- Adding / Editing -->

                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group col-md-12 ">

                                    <label class="control-label" for="name">Select responsible person</label>
                                    <select name="responsible">
                                        @foreach(\App\Models\User::all() as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input name="responsible" value="8"/> --}}



                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->



                            </div><!-- panel-body -->

                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary save">Save</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-danger" id="confirm_delete_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"><i class="voyager-warning"></i> Are you sure</h4>
                    </div>

                    <div class="modal-body">
                        <h4>Are you sure you want to delete '<span class="confirm_delete_name"></span>'</h4>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirm_delete">Yes, Delete it!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Delete File Modal -->
    </div>
    <!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'richtexttext' );
</script> -->
@endsection
