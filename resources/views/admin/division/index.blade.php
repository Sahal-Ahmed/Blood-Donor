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
								  <th style="width:20%;">Id</th>
								  <th style="width:50%;">Division</th>
								  <th style="width:20%;">Actions</th>
							  </tr>
						  </thead>
                          @foreach($divisions as $division)   
						  <tbody>
							<tr>
								<td>{{$division->id}}</td>
								<td class="center">{{$division->name}}</td>
								
								<td class="row">
                                    <div class="span3"></div>
                                    <div class="span2">
                                    
                                    </div>
                                    <div class="span2">
									<a class="btn btn-info" href="{{url('$divisions/'.$division->id.'/edit')}}">
										<i class="halflings-icon white edit"></i>  
									</a>
                                    </div>
                                    <div class="span2">
									<form action="{{url('/divisions/'.$division->id)}}" method="post">
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