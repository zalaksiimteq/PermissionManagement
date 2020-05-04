<html>
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

    <div class="mr-3 ml-3" id="main">
        <div class="card">
            <div class="card-header">
                <h4>Create Permission Group</h4>
            </div>
            <div class="card-body">
            {!! Form::open( ['route' => ['permission-group.update', $permission_group->permission_group_id], 'method' => 'PUT']) !!}
               
                <div class="row">
                    <div class="col-md-4">
                        <label >Name </label>
                        <input type="text" name="name" id="name" value="{{ $permission_group->name }}" >
                    </div>
                </div>
                <div class="row" style="margin-top:2%;">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-12">
                        
                        <button type="submit" > Save</button>
                        <a href="{{ route('permission-group.index') }}" >Discard</a>
                    </div>
                </div>
               {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>
</html>