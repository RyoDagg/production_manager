@extends('layouts.dashboard')
@section('head')
<title>Roles</title>
<link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
<link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
<link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
<link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
<script src="assets/js/scrollspyNav.js"></script>

<script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage')
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')

</script>
<script src="plugins/table/datatable/datatables.js"></script>
<script>
    /* Custom filtering function which will search data in column four between two values */
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = parseInt($('#min').val(), 10);
            var max = parseInt($('#max').val(), 10);
            var age = parseFloat(data[3]) || 0; // use data for the age column

            if ((isNaN(min) && isNaN(max)) ||
                (isNaN(min) && age <= max) ||
                (min <= age && isNaN(max)) ||
                (min <= age && age <= max)) {
                return true;
            }
            return false;
        }
    );
    $(document).ready(function() {
        var table = $('#range-search').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>'
                    , "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                }
                , "sInfo": "Showing page _PAGE_ of _PAGES_"
                , "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>'
                , "sSearchPlaceholder": "Search..."
                , "sLengthMenu": "Results :  _MENU_"
            , }
            , "stripeClasses": []
            , "lengthMenu": [7, 10, 20, 50]
            , "pageLength": 7
        });
        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').keyup(function() {
            table.draw();
        });
    });

</script>
@endsection

@section('content')
<?php $active_menu = ''; ?>

<?php $active_item = ''; ?>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="px-6">
                <h1 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">{{ __('Update role') }}</h1>
                <a href="{{route('role.index')}}" class="btn btn btn-secondary mb-2 mr-2">{{ __('<< Back to all roles') }}</a>
                @if ($errors->any())
                <ul class="mt-3 list-none list-inside text-sm text-red-400">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="w-full px-6 py-4 bg-white overflow-hidden">

            </div>
            <form method="POST" action="{{ route('role.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="py-2">
                    <label for="name" class="block font-medium text-sm text-gray-700{{$errors->has('name') ? ' text-red-400' : ''}}">{{ __('Name') }}</label>
                    <input id="name" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('name') ? ' border-red-400' : ''}}" type="text" name="name" value="{{ old('name', $role->name) }}" />
                </div>
                <div class="flex justify-end mt-4">
                    <button type='submit' class='btn btn btn-secondary mb-2 mr-2'>
                        {{ __('Update') }}
                    </button>
                </div>
            </form>
            <div class="w-full px-6 py-4 bg-white overflow-hidden">
                <h2 class="font-semibold">Role Permissions</h2>
                @if($role->permissions)
                @foreach($role->permissions as $role_permission)

                <p> {{$role_permission->name}} </p>
                <form action="{{ route('role.permission.revoke', [$role->id,$role_permission->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn btn-secondary mb-2 mr-2 bg-red-600">
                        {{ __('Delete') }}
                    </button>
                </form>

                @endforeach
                @endif
            </div>
            <form method="POST" action="{{ route('role.permissions', $role->id) }}">
                @csrf
                <div class="py-2">
                    <label for="permission" class="block font-medium text-sm text-gray-700{{$errors->has('permission') ? ' text-red-400' : ''}}">{{ __('Permission') }}</label>
                    <select id="permission" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full{{$errors->has('permission') ? ' border-red-400' : ''}}" type="text" name="permission">
                        @foreach($permissions as $permission)
                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                        @endforeach

                    </select>

                </div>
                <div class="flex justify-end mt-4">
                    <button type='submit' class='btn btn btn-secondary mb-2 mr-2'>
                        {{ __('Assign') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
