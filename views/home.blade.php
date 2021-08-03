@extends('shared.master')

@section('title','Home')
@section('css')

@endsection
@section('content')
<div class="main-content side-content pt-0">
				<div class="container-fluid">
					<div class="inner-body">

		
						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Dashboard</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Home</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-download mr-2"></i> Import
									</button>
									<button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
									  <i class="fe fe-filter mr-2"></i> Filter
									</button>
									<button type="button" class="btn btn-primary my-2 btn-icon-text">
									  <i class="fe fe-download-cloud mr-2"></i> Download Report
									</button>
								</div>
							</div>
						</div>
						<!-- End Page Header -->
						@role('admin')
						<!-- Row -->
						<div class="row row-sm">
							<div class="col-sm-6 col-md-6 col-xl-4">
								<div class="card custom-card">
									<div class="card-body text-center">
									<?php
											$userss=\App\Models\User::where('role_id','=',2)->get();
											?>
										<div class="icon-service bg-primary-transparent rounded-circle text-primary">
											<i class="mdi mdi-account-multiple icon-size float-left text-primary"></i>
										</div>
										<p class="mb-1 text-muted">Total Users</p>
										<h3 class="mb-0">{{$userss->count()}}</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-4">
								<div class="card custom-card">
									<div class="card-body text-center">
									<?php
												$surveys=\App\Models\Survey::all();
												?>
										<div class="icon-service bg-secondary-transparent rounded-circle text-secondary">
											<i class="fe fe-check-square"></i>
										</div>
										<p class="mb-1 text-muted">Total Surveys</p>
										<h3 class="mb-0">{{$surveys->count()}}</h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-xl-4">
								<div class="card custom-card">
									<div class="card-body text-center">
									<?php
												$project=\App\Models\Project::all();
												?>
										<div class="icon-service bg-info-transparent rounded-circle text-info">
											<i class="fe fe-dollar-sign"></i>
										</div>
										<p class="mb-1 text-muted">Total Projetcs</p>
										<h3 class="mb-0">{{$project->count()}}</h3>
									</div>
								</div>
							</div>
							
							<!-- COL END -->
						</div>
						<!-- End Row -->

						<!-- row opened -->
						<div class="row row-sm">
							<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-header border-bottom-0">
										<label class="main-content-label my-auto pt-2">Revenue Overview</label>
										<span class="d-block tx-12 mb-0 mt-1 text-muted">An Overview. Revenue is the total amount of income generated by the sale of goods or services related to the company's primary operations.</span>
									</div>
									<div class="card-body">
										<div class="chart-wrapper">
										   <canvas id="revenuechart" class=""></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl-6 col-xl-6 col-md-12 col-lg-12">
								<div class="card custom-card">
									<div class="card-header border-bottom-0 pb-0">
										<label class="main-content-label mb-2 pt-1">Recent Orders</label>
										<p class="tx-12 mb-0 text-muted">An order is an investor's instructions to a broker or brokerage firm to purchase or sell</p>
									</div>
									<div class="card-body sales-product-info ot-0 pt-0 pb-0">
										<div id="recentorders" class="ht-150"></div>
										<div class="row sales-product-infomation pb-0 mb-0 mx-auto wd-100p">
											<div class="col-md-6 col justify-content-center text-center">
												<p class="mb-0 d-flex justify-content-center "><span class="legend bg-primary brround"></span>Delivered</p>
												<h3 class="mb-1 font-weight-bold">5238</h3>
												<div class="d-flex justify-content-center ">
													<p class="text-muted ">Last 6 months</p>
												</div>
											</div>
											<div class="col-md-6 col text-center float-right">
												<p class="mb-0 d-flex justify-content-center "><span class="legend bg-light brround"></span>Cancelled</p>
													<h3 class="mb-1 font-weight-bold">3467</h3>
												<div class="d-flex justify-content-center ">
													<p class="text-muted">Last 6 months</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl-6 col-xl-6 col-md-12 col-sm-12">
								<div class="card custom-card">
									<div class="card-header pb-0 border-bottom-0">
										<label class="main-content-label mb-2 pt-1">Tickets</label>
										<p class="tx-12 mb-0 text-muted">Sales activities are the tactics that salespeople use to achieve</p>
									</div>
									<div class="card-body">
										<ul class="visitor mb-0 d-block users-images list-unstyled list-unstyled-border">
											<li class="media d-flex mb-3 mt-0 pt-0">
												<img class="mr-3 rounded-circle avatar avatar-md" src="assets/img/users/3.jpg" alt="avatar">
												<div class="media-body mb-1">
													<div class="float-right"><small>10-9-2018</small></div>
													<h5 class="media-title tx-15 mb-0">Vanessa</h5>
													<span class="text-muted">sed do eiusmod </span>
												</div>
											</li>
											<li class="media d-flex mb-3">
												<img class="mr-3 rounded-circle avatar avatar-md" src="assets/img/users/5.jpg" alt="avatar">
												<div class="media-body mb-1">
													<div class="float-right"><small>15-9-2018</small></div>
													<h5 class="media-title tx-15 mb-0"> Rutherford</h5>
													<small class="text-muted">sed do eiusmod </small>
												</div>
											</li>
											<li class="media d-flex mb-3">
												<img class="mr-3 rounded-circle avatar avatar-md" src="assets/img/users/7.jpg" alt="avatar">
												<div class="media-body mb-1">
													<div class="float-right"><small>17-9-2018</small></div>
													<h5 class="media-title tx-15 mb-0">Elizabeth </h5>
													<small class="text-muted">sed do eiusmod </small>
												</div>
											</li>
											<li class="media d-flex mb-3">
												<img class="mr-3 rounded-circle avatar avatar-md" src="assets/img/users/4.jpg" alt="avatar">
												<div class="media-body mb-1">
													<div class="float-right"><small>19-9-2018</small></div>
													<h5 class="media-title tx-15 mb-0">Anthony</h5>
													<small class="text-muted">sed do eiusmod </small>
												</div>
											</li>
											<li class="media d-flex mb-0">
												<img class="mr-3 rounded-circle avatar avatar-md" src="assets/img/users/9.jpg" alt="avatar">
												<div class="media-body mb-1">
													<div class="float-right"><small>19-9-2018</small></div>
													<h5 class="media-title tx-15 mb-0">Anthony</h5>
													<small class="text-muted">sed do eiusmod </small>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- row closed -->

						<!-- row opened -->
						<!-- row closed -->


					</div>
				</div>
			</div>
@endrole
@endsection
@section('js')
@endsection