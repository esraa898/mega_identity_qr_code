@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">{{Auth::user()->name}} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">\ Icons</span>
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
										<a class="modal-effect btn btn-outline-primary btn-block"   href="{{ url('icon/create')}}">  Add  Icon  </a>
									</div>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mg-b-0 text-md-nowrap">

										<thead>
											<tr>
												<th class=" border-bottom-0">ID</th>
												<th class=" border-bottom-0">icon name</th>
												<th class=" border-bottom-0">
													icon img
												</th>
												<th  class=" border-bottom-0" colspan="2"> Action</th>
											</tr>
										</thead>
										<tbody>
									@foreach($icons as $key => $icon)
											<tr>
												<th scope="row">{{++ $key}}</th>
												<td>{{$icon->name}}</td>
												<td><img src="{{asset('images/icons/'.$icon->icon)}}"/></td>
												<td class="pr-0">

                                          <a class=" btn btn-sm btn-info"  href="{{url('icon/edit',[$icon->id])}}"  title="update"><i class="las la-pen"></i></a>
												</td>
												<td class="my-0">
										  
                                                        <form method="post"  action="{{url('icon/delete') }}">
                                                            @csrf 
                                                            @method('DELETE')
                                                            <input type="hidden"name="icon_id" value="{{$icon->id}}">
                                                        <button class="btn  btn-sm btn-danger">   
														<i class="las la-trash"></i>
                                                        </button>
                                                     </form>
						
			 
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