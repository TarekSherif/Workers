

@extends('layouts.index')

@section('ScriptContent')
               


<script type="text/javascript">
$(function () {

        $('#jtableContainer').jtable({
            title: '<i class="fa fa-file-text  " style="color: orange;" aria-hidden="true"></i>	 @lang("messages.LicenseType")',
            paging: true,
            pageSize: 10,
            sorting: true,
            defaultSorting: 'SOrder ASC',
            columnResizable: true,
            columnSelectable: true,
            saveUserPreferences: true,
            //openChildAsAccordion: true, //Enable this line to show child tabes as accordion style
            actions: {
				listAction:   '{{url("/")}}/api/ListOfLicenseTypes?_token={{ csrf_token() }}',
                
                @if ($Permission["InsertData"])
                createAction: '{{url("/")}}/api/CreateLicenseType?_token={{ csrf_token() }}',
                @endif
                @if ($Permission["UpdateData"])
                updateAction: '{{url("/")}}/api/UpdateLicenseType?_token={{ csrf_token() }}',
				@endif
                @if ($Permission["DeleteData"])
                deleteAction: '{{url("/")}}/api/DeleteLicenseType?_token={{ csrf_token() }}'
                @endif
            }
            ,@include('layouts.inc.JtableToolbar'),
            fields: {
                
                LicenseID: {
                    key: true,
                    list: false
				},
				SOrder: {
						title:'@lang("messages.SOrder")',
							visibility: 'visible',
							width: '10%',
						input: function (data) {
								if (data.record) {
									return '<input type="number"  placeholder=" @lang("messages.SOrder")"   class=" form-control validate[required]"   autocomplete="off"   name="SOrder"   value="' + data.record.SOrder + '" />';
								} else {
									return '<input type="number"  placeholder=" @lang("messages.SOrder")"     class="form-control validate[required]"  autocomplete="off"   name="SOrder"     />';
								}
							}  
					},

                LicenseType: {
                    title: '@lang("messages.LicenseType")',
					inputClass:"form-control validate[required]"
					
				},
				
            }
            @include('layouts.inc.JtableEvent')
        });
 
        //Load student list from server
        $('#jtableContainer').jtable('load');
 
    });
 


</script>


@endsection
