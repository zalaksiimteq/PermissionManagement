<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <head> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>

    <body>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        

        <script >
            $(document).ready(function(){

                $(".btn-toggle-permission").on('click', function(){
                    var id = $(this).data('group-id')
                    $(".tr_"+id).toggle()
                })
            });
        </script>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{Session::get('success')}}</strong>
            </div>
        @endif
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    Create Permission Group
                </div>
                <div class="col-md-6" style="float:right;" >
                    <a href="{{ route('permission.create') }}" class="btn btn-primary" >
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion">
                        <table class="table table-stripped" >
                        <tr>
                            <td>#</td>
                            <td>Permission Title</td>
                            <td>Permission Key</td>
                        </tr>

                        @foreach ($permissions as $key => $permission_groups)
                        <tr>
                            <td> <button type="button" class="btn btn-primary btn-toggle-permission" id="btn_toggle_permission" data-group-id="{{ $permission_groups['permission_group_id'] }}" > > </button></td>
                            <td><span style="font-weight:bold;"> {{ $permission_groups['name'] }}</span></td>
                        </tr>
                            @foreach ($permission_groups['detail'] as $p_key => $permission)
                            <tr id="tr_{{ $permission_groups['permission_group_id'] }}_$p_key" class="tr_{{ $permission_groups['permission_group_id'] }}" style="display:none;" >
                                <td>{{ $permission['permission_key'] }} </td>
                                <td>{{ $permission['permission_title'] }} </td>
                            </tr>
                            @endforeach
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 