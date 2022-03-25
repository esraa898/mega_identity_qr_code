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
											
												<th colspan="2"> Action</th>
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
												
												<td>

                                          <a class=" btn btn-sm btn-info"  href="{{url('links/edit',[$link->id])}}"
                                 title="update"><i class="las la-pen"></i></a>

								 <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
 data-id="{{ $link->id }}" data-name="{{ $link->platform_name }}" data-toggle="modal"
 href="#modaldemo9" title="delete"><i class="las la-trash"></i></a>

                                     </td>

						
			 
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>



			
				 <!--  delete form  -->
		 <div class="modal" id="modaldemo9" >
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Delete </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
                    <form   method="post" action="{{url('links/delete',[$link->id])}}" autocomplete="off">
					     @method('delete')
                         @csrf
						 <div class="modal-body">
                                        <p>    Are you sure you want to delete this link ?    </p><br>
                                        <input type="hidden" name="id" id="id">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                        <button type="submit" class="btn btn-danger">yes</button>
                                    </div>
                                    
					
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
<script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
@endsection