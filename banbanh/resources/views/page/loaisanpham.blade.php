@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$title->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>Loại Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu" style="font-size:20px;">
								@foreach ($loaisp as $loai)
								<li><a href="loai-san-pham/{{$loai->id}}">{{$loai->name}}</a></li>
								@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">							  
							<div class="beta-products-details">
								<p class="pull-left"></p>
								<div class="clearfix"></div>
							</div>
							
							<div class="row">
								@foreach($sp_type as $sp)
								<div class="col-sm-4">
									<div class="single-item">
											@if ($sp->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
													@if ($sp->promotion_price == 0)
													<span class="flash-sale">{{$sp->unit_price}} VNĐ</span>
													@else
													<span class="flash-del">{{$sp->unit_price}} VNĐ</span>
													<span class="flash-sale">{{$sp->promotion_price}} VNĐ</span>   
																									
													@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$sp->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
						<hr>
						<div class="beta-products-list">
							<h4>Sản Phẩm Khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}}</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($sp_khac as $item)
								<div class="col-sm-4">
									<div class="single-item">
											@if ($item->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
										<div class="single-item-header">
											<a href="{{route('chi-tiet-san-pham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$item->name}}</p>
											<p class="single-item-price">
													@if ($item->promotion_price == 0)
													<span class="flash-sale">{{$item->unit_price}} VNĐ</span>
													@else
													<span class="flash-del">{{$item->unit_price}} VNĐ</span>
													<span class="flash-sale">{{$item->promotion_price}} VNĐ</span>																								
													@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$item->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$item->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
									
								@endforeach
								</div>
								<div class="row">{{$sp_khac->links()}}</div>							
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    </div> <!-- .container -->
        
@endsection