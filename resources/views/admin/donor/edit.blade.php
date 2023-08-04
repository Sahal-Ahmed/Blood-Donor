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
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Blood Donor</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{url('/blood-donors/'.$donor->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" value="{{$donor->name}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Blood Group</label>
                            <div class="controls">
                                <select name="group" class="form-select" aria-label="Default select example">
                                    <option selected>{{$donor->bloodGroup}}</option>
                                    
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Age</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="age" value="{{$donor->age}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Phone Number</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="number" value="{{$donor->phone}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">NID Number</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="nid" value="{{$donor->nId}}" required>
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
                        <div class="control-group">
                            <label class="control-label" for="date01">Zone Name</label>
                            <div class="controls">
                                <select name="zone" class="form-select" aria-label="Default select example">
                                    <option selected>Select Zone</option>
                                    @foreach($zones as $zone)
                                    <option value="{{$zone->id}}">{{$zone->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Area</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="area" value="{{$donor->area}}" required>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Blood Donor</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection