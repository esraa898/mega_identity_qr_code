@extends('layouts.master')

@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{Auth::user()->name}} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">  /genrate Qr </span>
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
             
               @if (session()->has('errors'))
                     <div class="alert alert-success">
                        {{session()->get('errors')}}     
                    </div>
    
               @endif
    
                
		
				<div class="col-xl-12">
						<div class="card">
							<d  iv class="card-header pb-0">

					
							<div class="card-header">
								
								<h4> {{Auth::user()->name}} Qr</h4>
							</div>
							<div class="card-body pt-0">
								
							      <img src="{{$qrname}}"/>



							
				
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