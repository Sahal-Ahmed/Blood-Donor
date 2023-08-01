@extends('admin.admin_master')
@section('content')
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
            <p class="alert-success">
                <?php
                 $message = Session::get('message');
                 if($message){
                    echo $message;
                    Session::put('message',null);
                 }
                ?>
            </p>
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Zone</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/zones/')}}" method="post">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Zone Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="date01">Division Name</label>
                            <div class="controls">
                                <select name="division" class="form-select" aria-label="Default select example">
                                    <option selected>Select Division</option>
                                    @foreach($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Zone</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection