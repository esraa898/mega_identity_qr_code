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
							<h4 class="content-title mb-0 my-auto">{{Auth::user()->name}} </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /Edit link</span>
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
								<h4 class="card-title mb-1"> Editlink   </h4>
								
							</div>
							<div class="card-body pt-0">
								<form  method="POST"  action="{{url('links/update',[$link->id])}}"  enctype="multipart/form-data">
                                    @method  ('PUT')
                                    @csrf
									<div class="form-group">
										<div class="form-group">

										<input type="hidden" class="form-control" id="user_id" name="user_id" value={{$link->user_id}} >
										</div>
											<label >platform_url </label>
											<input type="text" class="form-control" id="platform_url" name="platform_url" value={{$link->platform_url}} >
										</div>
                                        <div class="form-group">
											<label >platform name </label>
											<input type="text" class="form-control" id="platform_name" name="platform_name" value={{$link->platform_name}} >
										</div>
                                        <div class="form-group">
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref"></label>
        
                                        <select name="icon_id" id="icon_id" class="form-control" required>
                                            <option value="{{$link->icon->id}}" selected >  {{$link->icon->name}}  </option>
                                              @foreach($icons as $icon)
                                                <option value="{{ $icon->id }}">{{ $icon->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
										
                                      
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
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection