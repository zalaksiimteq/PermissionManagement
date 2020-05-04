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
        
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{Session::get('success')}}</strong>
    </div>
@endif
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                    <h4>Create Permission Group</h4>
                    <a href="{{ route('permission-group.create') }}" class="btn btn-primary" >
                        <i class="fa fa-plus"></i> Add
                    </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="accordion">
                    <table class="table table-stripped" >
                    @foreach ($permission_groups as $permission_group)
                        <tr>
                            <td>{{ $permission_group->name }}</td>
                            <td>
                                <a href="{{URL::route('permission-group.edit', array($permission_group->permission_group_id))}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                               
                                <div style="display: inline-block">
                                    {!!Form::open(['route' => ['permission-group.destroy', $permission_group->permission_group_id], 'method' => 'DELETE', 'id' => "frm_$permission_group->permission_group_id"])!!}
                                    <button class="btn btn-danger btn-sm" id="{{$permission_group->permission_group_id}}" data-toggle="tooltip" onclick="javascript:confirmation(this)" title="Delete"><i class="fa fa-trash"></i></button>
                                    {!!Form::close()!!}
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>

        

    </div>
    </body>
    </html> 