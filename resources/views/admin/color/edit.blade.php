@extends('admin.admin_master')
@section('admin_content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <p class="alert_success">
                    <?php
                    $message=Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </p>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Color</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/colors/'.$color->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Colors</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="color" id="input" data-role="tagsinput" value="{{implode(',',Json_decode($color->color))}}" required>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update colors</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection