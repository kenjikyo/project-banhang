@extends('admin.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa Đơn
                    <small>Sửa hóa đơn</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" >
                @if (count($errors)>0)
                    <div class="alert alert-danger">@foreach ($errors->all() as $err)
                        {{ $err }} <br>
                    @endforeach</div>
                @endif
                <form action="admin/bills/sua/{{ $bill->id }}" method="post" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ $bill->customer->name }}"/>
                        </div>
                        <div class="form-group">
                                <label>Ngày đặt hàng</label>
                                <input type="date" class="form-control" name="date" value="{{ $bill->date_order }}">
                            </div>
                        <div class="form-group">
                            <label>Tổng tiền</label>
                            <input class="form-control" name="numTotal" placeholder="Please Enter Password" value="{{ $bill->total }}"/>
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" name="note" id="" rows="3">{{ $bill->note }}</textarea>
                        </div>
                        <div class="form-group">
                                <label>Hình thức thanh toán</label>
                                <ul>
									<li>
										<input id="payment_method_bacs" type="radio" class="input-radio" value="COD" name="payment" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div >
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li>
										<input id="payment_method_cheque" type="radio" class="input-radio" value="ATM" name="payment" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Sửa Hóa Đơn</button>
                        <button onclick="Redirect();" class="btn btn-default">Quay lại</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script>function Redirect() {
    window.location="admin/bills/danhsach";
 }</script>
@endsection