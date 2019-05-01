@extends('products.layout')
@section('title')
        บัญชีรายรับรายจ่าย :: CPE#02
@endsection
@section('content')
<br>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>สร้างรายการใหม่</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}">กลับหน้าหลัก</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>เอ๊ะ!</strong> มีปัญหาบางอย่างเกิดขึ้น.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('products.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>รายละเอียด:</strong>
                <textarea  name="detail" class="form-control" style="height:150px" placeholder="กรอกข้อมูลที่นี่"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
	<div class="form-group">
	  <label for="sel1"><strong>ประเภท:</strong></label>
	  <select class="form-control" name="type">
	    <option value="รายรับ">รายรับ</option>
	    <option value="รายจ่าย">รายจ่าย</option>
	  </select>
	</div>
        </div>
	 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>จำนวนเงิน:</strong>
                <input type="text" name="balance" class="form-control" placeholder="ระบุจำนวนเงิน">
            </div>
        </div>
 	<div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        </div>
	</div>
</form>
@endsection
