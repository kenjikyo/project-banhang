@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Chi Tiết Sản Phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>Chi Tiết Sản Phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sp->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
									@if ($sp->promotion_price != 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
								<p class="single-item-title"><h3>{{$sp->name}}</h3></p>
								<p class="single-item-price">
								@if ($sp->promotion_price == 0)
													<span class="flash-sale">{{$sp->unit_price}} VNĐ</span>
													@else
													<span class="flash-del">{{$sp->unit_price}} VNĐ</span>
													<span class="flash-sale">{{$sp->promotion_price}} VNĐ</span>   
																									
													@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sp->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số Lượng:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sp->description}}</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản Phẩm Tương Tự</h4>

						<div class="row">
							@foreach($sp_same as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
										@if ($sptt->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
									<div class="single-item-header">
										<a href="{{route('chi-tiet-san-pham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="150px" width="200"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price">
												@if ($sptt->promotion_price == 0)
												<span class="flash-sale">{{$sptt->unit_price}} VNĐ</span>
												@else
												<span class="flash-del">{{$sptt->unit_price}} VNĐ</span>
												<span class="flash-sale">{{$sptt->promotion_price}} VNĐ</span>   
																								
												@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$sptt->id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row">{{$sp_same->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Bán Chạy</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/2.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/3.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/4.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản Phẩm Mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach ($new_product as $item)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chi-tiet-san-pham',$item->id)}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
									<div class="media-body">
											{{$item->name}}
											@if ($item->promotion_price == 0)
												<span class="flash-sale" style="font-size:15px;" >{{$item->unit_price}} VNĐ</span>
												@else
												<span class="flash-del" style="font-size:15px;">{{$item->unit_price}} VNĐ</span>
												<span class="flash-sale" style="font-size:15px;">{{$item->promotion_price}} VNĐ</span>   
																								
												@endif

									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection