@extends('products.layout')
@section('title')
        บัญชีรายรับรายจ่าย :: CPE#02
@endsection
@section('content')
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ข้อมูลการบันทึก</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">กลับหน้าหลัก</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>รายละเอียด : </strong>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ประเภท : </strong>
                {{ $product->type }}
            </div>
        </div>
	<div class="col-xs-12 col-sm-12 col-md-12">
	    <div class="form-group">
		<strong>จำนวนเงิน : </strong>
		{{ $product->balance }}
	    </div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
	    <div class="form-group">
		<strong>วันที่บันทึก : </strong>
		{{ $product->created_at}}
	</div>
    </div>

@endsection
