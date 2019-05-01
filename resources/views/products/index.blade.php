@extends('products.layout')
@section('title')
	บัญชีรายรับรายจ่าย :: CPE#02
@endsection 
@section('content')
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>บัญชีรายรับรายจ่าย :: CPE#02</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> สร้างรายการใหม่</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-striped">
        <tr>
            <th>ลำดับ</th>
            <th>รายละเอียด</th>
            <th>ประเภท</th>
	    <th>จำนวนเงิน</th>
            <th width="280px">ตัวเลือก</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->type }}</td>
	    <td>{{ $product->balance }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">ดูข้อมูล</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">แก้ไข</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">ลบ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
	<div class="pull-right">
	<table class="table table-bordered">
		<tr>
			<td>ยอดเงินคงเหลือ</td>
			<td>{{$sums}}</td>
		</tr>
	</table>
  	</div>
<br><br>
@endsection
