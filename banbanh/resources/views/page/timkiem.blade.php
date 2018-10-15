@extends('master')
@section('content')
<div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Tìm Kiếm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
    
                            <div class="row">
                                @foreach ($product as $item)       
                                <div class="col-sm-3">
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
                                            <a class="beta-btn primary" href="{{route('chi-tiet-san-pham',$item->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    
                                </div>   
                                @endforeach     
                            </div>                    
                            <div class="space40">&nbsp;</div> ---              
                        </div> <!-- .beta-products-list -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div>
@endsection