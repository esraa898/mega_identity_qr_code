@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">{{Auth::user()->name}} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">\ UserLinks</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content') 
 @if ($errors->any())
		             
                 <div class="alert alert-danger">
					 <ul>
						 @foreach($errors->all() as $error )
						 <li>
							  {{$error}} 
						 </li>
						 		@endforeach
					 </ul>
                       
                </div>
		

           @endif

				<!-- row -->
				<div class="row">
         
           @if (session()->has('done'))
                 <div class="alert alert-success">
                    {{session()->get('done')}}     
                </div>

           @endif

		   <div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
								<div class="col-sm-6 col-md-4 col-xl-3">
									
									</div>

								
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mg-b-0 text-md-nowrap">

										<thead>
											<tr>
												<th>ID</th>
												<th>platform_url</th>
												<th>platform_name</th>
												<th>icon</th>
												<th>user</th>
											
												
											</tr>
										</thead>
										<tbody>
									@foreach($links as $key => $link)
											<tr>
												<th scope="row">{{++ $key}}</th>
												<td>{{$link->platform_url}}</td>
												<td> {{$link->platform_name}}</td>
												<td><img src="{{asset('images\icons'.'/'.$link->icon->icon)}}"/></td>
												<td>{{Auth::user()->name}}</td>
												
												

								
											
						
			 
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>



			

     


		
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

@endsection