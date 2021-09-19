@extends('voyager::master')
@section('content')
<div class="page-content browse container-fluid">
        <div class="alerts">
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                                                <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="dataTable" class="table table-hover dataTable no-footer" role="grid" aria-describedby="dataTable_info">
                                <thead>
                                    <tr role="row"><th class="dt-not-orderable sorting_disabled" rowspan="1" colspan="1" aria-label="
                                                
                                            " style="width: 12.8px;">
                                                <input type="checkbox" class="select_all">
                                            </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Id
                                                                                    : activate to sort column ascending" style="width: 12.4875px;">
                                                                                        Id
                                                                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Название
                                                                                    : activate to sort column ascending" style="width: 112.488px;">
                                                                                        Название
                                                                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Область
                                                                                    : activate to sort column ascending" style="width: 115.55px;">
                                                                                        Область
                                                                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Направление
                                                                                    : activate to sort column ascending" style="width: 132px;">
                                                                                        Направление
                                                                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Написано
                                                                                    : activate to sort column ascending" style="width: 90.975px;">
                                                                                        Написано
                                                                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Действия
                                                                                    : activate to sort column ascending" style="width: 75.125px;">
                                                                                        Действия
                                                                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Полное имя
                                                                                    : activate to sort column ascending" style="width: 90.975px;">
                                                                                        Полное имя
                                                                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        To Expert
                                                                                    : activate to sort column ascending" style="width: 45.1625px;">
                                                                                        To Expert
                                                                                    </th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="
                                                                                        Status
                                                                                    : activate to sort column ascending" style="width: 56.6375px;">
                                                                                        Status
                                                                                    </th><th class="actions text-right dt-not-orderable sorting_disabled" style="width: 200px;" rowspan="1" colspan="1" aria-label="Actions ">Actions </th></tr>
                                </thead>
                                <tbody>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                    <tr role="row" class="odd">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_149" value="149">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>149</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>lnjfwkjnwr</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Республика Каракалпакстан</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Оценка качество почвы</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Жалоба</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    Open

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="149" id="delete-149">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/149/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/149" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/149" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/149" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/149" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="even">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_148" value="148">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>148</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>fefekg</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Хорезмская область</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Землепользование</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Жалоба</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="148" id="delete-148">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/148/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/148" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/148" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/148" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/148" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="odd">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_147" value="147">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>147</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>frjn</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Хорезмская область</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Льготы и субсидии</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Вопрос</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="147" id="delete-147">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/147/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/147" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/147" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/147" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/147" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="even">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_146" value="146">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>146</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>fenfrmkf</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Хорезмская область</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Льготы и субсидии</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Жалоба</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="146" id="delete-146">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/146/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/146" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/146" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/146" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/146" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="odd">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_145" value="145">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>145</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>efg</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Республика Каракалпакстан</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Оценка качество почвы</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Жалоба</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="145" id="delete-145">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/145/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/145" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/145" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/145" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/145" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="even">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_144" value="144">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>144</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>dejng</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Андижанская область</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Оценка качество почвы</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Жалоба</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="144" id="delete-144">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/144/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/144" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/144" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/144" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/144" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="odd">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_143" value="143">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>143</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>njlesfnjv</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Республика Каракалпакстан</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Льготы и субсидии</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Вопрос</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="143" id="delete-143">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/143/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/143" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/143" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/143" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/143" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="even">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_142" value="142">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>142</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>defenrf</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Хорезмская область</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Льготы и субсидии</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Вопрос</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="142" id="delete-142">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/142/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/142" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/142" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/142" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/142" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="odd">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_141" value="141">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>141</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>fefee</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Республика Каракалпакстан</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Землепользование</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Жалоба</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="141" id="delete-141">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/141/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/141" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/141" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/141" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/141" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr><tr role="row" class="even">
                                                                                    <td>
                                                <input type="checkbox" name="row_id" id="checkbox_140" value="140">
                                            </td>
                                                                                                                                                                        <td>
                                                                                                                                                        <div>140</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>frgtgtgt</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Республика Каракалпакстан</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Землепользование</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Muhammad</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                    <p>Предложение</p>
                
            
        
    
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        <div>Muhammad</div>
                                                                                            </td>
                                                                                                                                <td>
                                                                                                                                                        0
                                                                                                                                                </td>
                                                                                                                                <td>
                                                
                                                    

                                                                                            </td>
                                                                                <td class="no-sort no-click bread-actions" style="width: 200px !important; display:flex">
                                                                                                                                                <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="140" id="delete-140">
            <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Delete</span>
        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/140/edit" title="Edit" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Edit</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeals/140" title="View" class="btn btn-sm btn-warning pull-right view">
            <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">View</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/answer/appeal/140" title="Answer" class="btn btn-sm btn-primary pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Answer</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/redirect/appeal/140" title="ToExpert" class="btn btn-sm btn-warning pull right">
            <i class="voyager-double-right"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">ToExpert</span>
        </a>
                                                                                                                                                                                                    <a href="http://127.0.0.1:8000/admin/appeal/chat/140" title="Chat" class="btn btn-sm btn-primary pull left">
            <i class="voyager-chat"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg hidden-xl ">Chat</span>
        </a>
                                                                                                                                        </td>
                                    </tr></tbody>
                            </table></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 140 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="dataTable" tabindex="0" id="dataTable_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="dataTable" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="dataTable" tabindex="0"><a href="#">2</a></li><li class="paginate_button " aria-controls="dataTable" tabindex="0"><a href="#">3</a></li><li class="paginate_button " aria-controls="dataTable" tabindex="0"><a href="#">4</a></li><li class="paginate_button " aria-controls="dataTable" tabindex="0"><a href="#">5</a></li><li class="paginate_button disabled" aria-controls="dataTable" tabindex="0" id="dataTable_ellipsis"><a href="#">…</a></li><li class="paginate_button " aria-controls="dataTable" tabindex="0"><a href="#">14</a></li><li class="paginate_button next" aria-controls="dataTable" tabindex="0" id="dataTable_next"><a href="#">Next</a></li></ul></div></div></div></div>
                        </div>
                                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection