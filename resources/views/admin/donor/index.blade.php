@extends('admin.admin_master')

@section('content')
<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
                    <p class="alert-success">
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                        ?>
                    </p>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<div class="span9"></div>
							<div class="span3">
								<span class="btn btn-danger">
									<a href="{{url('/divisions-trash')}}">View Trash</a>
								</span>
							</div>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th style="width:5%;">Id</th>
								  <th style="width:20%;">Name</th>
								  <th style="width:5%;">Blood Group</th>
								  <th style="width:5%;">Age</th>
								  <th style="width:15%;">Mobile</th>
								  <th style="width:10%;">NID</th>
								  <th style="width:25%;">Address</th>
								  <th style="width:15%;">Action</th>
								  
							  </tr>
						  </thead>
                          @foreach($donors as $donor)   
						  <tbody>
							<tr>
								<td>{{$donor->id}}</td>
								<td class="center">{{$donor->name}}</td>
								<td class="center">{{$donor->bloodGroup}}</td>
								<td class="center">{{$donor->age}}</td>
								<td class="center">{{$donor->phone}}</td>
								<td class="center">{{$donor->nId}}</td>
								<td class="">{{$donor->area}}, {{$donor->zone->name}}, {{$donor->division->name}}</td>
					
								<td class="row">
                                    
                                    <div class="span6">
									<a class="btn btn-info" href="{{url('blood-donors/'.$donor->id.'/edit')}}">
										<i class="halflings-icon white edit"></i>  
									</a>
                                    </div>
                                    <div class="span6">
									<form action="{{url('/blood-donors/'.$donor->id)}}" method="post">
										@csrf
										@method('DELETE')
									<button class="btn btn-danger" type="submit" value="Trash">
										<i class="halflings-icon white trash"></i> 
									</button>
									</form>
                                    </div>
                                    <div class="span3"></div>
								</td>
							</tr>
							
							
						  </tbody>
                          @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>
@endsection