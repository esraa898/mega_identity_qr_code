@extends('layouts.master')

@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{Auth::user()->name}} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /Change Users Role</span>
						</div>
					</div>
					
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
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
							<d  iv class="card-header pb-0">

					
							<div class="card-header">
								<h4 class="card-title mb-1"> Change Role of User  </h4>
								
							</div>
							<div class="card-body pt-0">
								<form  method="POST"  action="{{url('admin/rolechange')}}" >
                                    @method  ('PUT')
                                    @csrf
                                    <div class="form-group">
									<input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                                    <label class="form-label mg-b-0"> Name</label>
										<input type="text" class="form-control" id="name" name="name"   value="{{$user->name}}">
									</div>

                                    <div class="form-group">
                                    <label class="form-label mg-b-0"> email</label>
									<input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
								
									</div>
									<div class="checkbox">
                                    <label class="form-label mg-b-0">		
								   <input type="checkbox" name="roles[]" value="Superadmin" {{ $user->hasRole('Superadmin') ?  'checked' : '' }}>
								  			Superadmin</label>
									</div>
									<div class="form-group">
                                     <label class="form-label mg-b-0">
									
								   <input type="checkbox" name="roles[]" value="user" {{$user->hasRole('user') ?  'checked' : '' }}>  user
								
								
								</label>
									</div>
							
							
				
									<button type="submit" class="btn btn-primary mt-3 mb-0">Update </button>
								</form>
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