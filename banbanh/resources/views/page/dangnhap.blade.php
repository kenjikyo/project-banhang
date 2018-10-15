@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			@if(Auth::check())
			Xin chào {{Auth::user()->full_name}}, Bạn đã đăng nhập! <br>
			<a href="index">Click vào đây để quay lại trang mua hàng</a>
			@else
			<form action="login" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if (Session::has('flag'))
					<div class="alert alert-{{Session::get('flag')}}">{{Session::get('thongbao')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" required name="email">
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="phone" required name="password">
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
			@endif
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection