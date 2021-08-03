@extends('shared.master')

@section('title','Device Details')
@section('items','Devices')
@section('css')
<link href="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Dashboard</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">@yield('items')</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
		</ol>
	</div>
	<div class="d-flex">
		<div class="justify-content-center">
			<button type="button" class="btn btn-white btn-icon-text my-2 mr-2"> <i class="fe fe-download mr-2"></i> Import</button>
			<button type="button" class="btn btn-white btn-icon-text my-2 mr-2"> <i class="fe fe-filter mr-2"></i> Filter</button>
			<button type="button" class="btn btn-primary my-2 btn-icon-text"> <i class="fe fe-download-cloud mr-2"></i> Download Report</button>
		</div>
	</div>
</div>
<!-- End Page Header -->
</div>
<!-- Row -->
<div class="row square">
	<div class="col-lg-12 col-md-12">
		<div class="card custom-card">
			<div class="card-body">
				<h3 class="h3">{{$info->device_name}}</h3>
				<div class="profile-tab tab-menu-heading">
					<nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100"> <a class="nav-link  active" data-toggle="tab" href="#about">Detail</a>
						<a class="nav-link" data-toggle="tab" href="#edit">Historical</a>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->
<!-- Row -->
<div class="row row-sm">
	<div class="col-lg-12 col-md-12">
		<div class="card custom-card main-content-body-profile">
			<div class="tab-content">
				<div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
					<div class="card-body p-0 border p-0 rounded-10">
						<div class="border-top"></div>
						<div class="p-4">
							<label class="main-content-label tx-13 mg-b-20">Contact</label>
							<div class="d-sm-flex">
								<div class="mg-sm-r-20 mg-b-10">
									<div class="main-profile-contact-list">
										<div class="media">
											<div class="media-icon bg-primary-transparent text-primary"></div>
											<div class="media-body"> <span>Device Name</span>
												<div>{{$info->device_name}}</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mg-sm-r-20 mg-b-10">
									<div class="main-profile-contact-list">
										<div class="media">
											<div class="media-icon bg-success-transparent text-success"></div>
											<div class="media-body"> <span>Device Brand</span>
												<div>{{$info->device_brand}}</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mg-sm-r-20 mg-b-10">
									<div class="main-profile-contact-list">
										<div class="media">
											<div class="media-icon bg-info-transparent text-info"></div>
											<div class="media-body"> <span>Device Model</span>
												<div>{{$info->device_model}}</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mg-sm-r-20 mg-b-10">
									<div class="main-profile-contact-list">
										<div class="media">
											<div class="media-icon bg-info-transparent text-info"></div>
											<div class="media-body"> <span>Device Serial Number</span>
												<div>{{$info->device_model}}</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mg-sm-r-20 mg-b-10">
									<div class="main-profile-contact-list">
										<div class="media">
											<div class="media-icon bg-info-transparent text-info"></div>
											<div class="media-body"> <span>Device IMEI ONE</span>
												<div>{{$info->imei1}}</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mg-sm-r-20 mg-b-10">
									<div class="main-profile-contact-list">
										<div class="media">
											<div class="media-icon bg-info-transparent text-info"></div>
											<div class="media-body"> <span>Device IMEI TWO</span>
												<div>{{$info->imei2}}</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="border-top"></div>
					</div>
				</div>
				<div class="main-content-body tab-pane p-4 border-top-0" id="edit">
					<div class="card-body border">
						<div class="mb-4 main-content-label">Device Historical</div>
						<div class="table-responsive table-condensed table-hover">
							<table class="table" id="DeviceListTable">
								<thead>
									<tr>
										<th class="wd-20p">Device Name</th>{{--
										<th class="wd-20p">Device Brand</th>--}}
										<th class="wd-20p">Device Model</th>
										<th class="wd-20p">Device S/N</th>
										<th class="wd-20p">Member</th>
										<th class="wd-20p">Received Date</th>
										<th class="wd-25p">Returned Date</th>{{--
										<th class="wd-20p">Action</th>--}}</tr>
								</thead>
								<tbody>@foreach($historicals as $historical)
									<tr>
										<td>{{$historical}}</td>
										<td>{{$historical}}</td>
										<td>{{$historical}}</td>
										<td>{{$historical}}</td>
										<td>{{$historical}}</td>
										<td>{{$historical}}</td>
									</tr>@endforeach</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="main-content-body tab-pane p-4 border-top-0" id="settings">
					<div class="card-body border" data-select2-id="12">
						<form class="form-horizontal" method="post" action="{{ route('profiles.updatePassword') }}" id="passwordForm" data-select2-id="11">@csrf
							<div class="mb-4 main-content-label">Change password</div>
							<div id="add-messages"></div>
							<div class="form-group ">
								<div class="row row-sm">
									<div class="col-md-3">
										<label class="form-label">Old Password</label>
									</div>
									<div class="col-md-9">
										<input type="password" id="oldp" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password" name="old_password" required>@error('old_password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
										@enderror</div>
								</div>
							</div>
							<div class="form-group ">
								<div class="row row-sm">
									<div class="col-md-3">
										<label class="form-label">New Password</label>
									</div>
									<div class="col-md-9">
										<input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="new Password" name="password" required>@error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
										@enderror</div>
								</div>
							</div>
							<div class="form-group ">
								<div class="row row-sm">
									<div class="col-md-3">
										<label class="form-label">Confirm Password</label>
									</div>
									<div class="col-md-9" data-select2-id="106">
										<input type="password" id="confirm" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="confirm password" name="confirm_password" required>@error('confirm_password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
										@enderror</div>
								</div>
							</div>
							<div class="form-group ">
								<div class="row row-sm">
									<div class="col-md-3"></div>
									<div class="col-md-9">
										<div class="mt-3">
											<input type="submit" id="btnSave" class="btn btn-primary mr-1" value="Change Password">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
    <!-- End Row -->



@endsection
@section('scripts')
    <!-- Internal Data Table js -->
    <script src="{{asset('/dashboard/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/fileexport/jszip.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
    <script src="{{asset('/dashboard/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('/dashboard/js/table-data.js')}}"></script>
	<script src="{{asset('/dashboard/plugins/model-datepicker/js/datepicker.js')}}"></script>
        <script src="{{asset('/dashboard/plugins/model-datepicker/js/main.js')}}"></script>

@endsection

