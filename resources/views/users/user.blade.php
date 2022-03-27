@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">{{Auth::user()->name}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">\User</span>
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
								<th>Name</th>
								<th>Jobtitle</th>
								<th>Email</th>
								<th>phonenumber</th>
								<th>photo</th>
								<th>links</th>
								<th> location</th>
								<th> View Card</th>
								<th colspan="2"> Action</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<th scope="row">1</th>
								<td>{{$user->name}}</td>
								<td> {{$user->title}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->phone_number}}</td>
								<td><img class="avatar-xl " src="{{asset('images/'.$user->name.'/'. $user->photo)}}" /></td>
								<td> <a href="{{url('/links')}}">{{$user->name}} links</a></td>
								<td> {{$user->location}}</td>
								<td>
									<a class="btn btn-info" href="{{url('enduser',[$user->id])}}"> View Card</a>
								</td>
								<td>
								<td>

									<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $user->id }}" data-name="{{ $user->name  }}" data-title="{{ $user->title }}" data-phone_number="{{ $user->phone_number }}" data-location="{{ $user->location }}" data-password="{{ $user->password }}" data-toggle="modal" href="#exampleModal2" title="update"><i class="las la-pen"></i></a>

									<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-toggle="modal" href="#modaldemo9" title="delete"><i class="las la-trash"></i></a>

								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>









	<!--  edit form  -->
	<div class="modal" id="exampleModal2">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title"> Edit </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{url('user/update',[$user->id])}}" autocomplete="off" enctype="multipart/form-data">
						@method('PUT')
						@csrf

						<div class="form-group">
							<input type="hidden" name="id" id="id" value="">
							<label class="form-label mg-b-0"> Name</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label class="form-label mg-b-0"> title</label>
							<input type="text" class="form-control" id="title" name="title">

						</div>
						<div class="form-group">
							<label class="form-label mg-b-0"> PhoneNumber</label>
							<input type="text" class="form-control" id="phone_number" name="phone_number">

						</div>

						<div class="form-group">
							<label class="form-label mg-b-0"> Photo</label>
							<input type="file" class="form-control" id="photo" name="photo">

						</div>
						<div class="form-group">
							<label class="form-label mg-b-0"> location</label>
							<input type="text" class="form-control" id="location" name="location">

						</div>
						<div class="form-group">
							<label class="form-label mg-b-0"> password</label>
							<input type="password" class="form-control" id="password" name="password">

						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-success">ok</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>



	<!--  delete form  -->
	<div class="modal" id="modaldemo9">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">Delete </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{url('user/delete',[$user->id])}}" autocomplete="off">
						@method('delete')
						@csrf
						<div class="modal-body">
							<p> {{$user->name}} Are you sure you want to delete your account ? </p><br>
							<input type="hidden" name="id" id="id" value="">

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
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
	$('#exampleModal2').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var name = button.data('name')
		var title = button.data('title')
		var phone_number = button.data('phone_number')
		var photo = button.data('photo')
		var location = button.data('location')
		var password = button.data('password')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #name').val(name);
		modal.find('.modal-body #title').val(title);
		modal.find('.modal-body #phone_number').val(phone_number);
		modal.find('.modal-body #photo').val(photo);
		modal.find('.modal-body #location').val(location);
		modal.find('.modal-body #password').val(password);
	})
</script>
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