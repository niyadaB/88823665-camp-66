@extends('layouts.default_with_menu')

@section('content')
<form action="{{ url('product') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="category" class="form-label">ชื่อหมวดหมู่</label>
                <input type="text" name="category" class="form-control" id="category" required>
            </div>
        </div>
    </div>

    <button type="button" id="btn-add-product" class="btn btn-primary mt-2">
        + เพิ่มสินค้า
    </button>

    <div class="row mt-3" id="add-product">
        <!-- ช่องใส่ชื่อสินค้าจะถูกเพิ่มตรงนี้ -->
    </div>

    <div class="mt-3 row">
        <div class="col-12">
            <button class="btn btn-success px-4" type="submit">บันทึก</button>
        </div>
    </div>
</form>

<table class="mt-3 table">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อหมวดหมู่</th>
            <th>ชื่อสินค้า</th>
            <th>ชื่อผู้ใช้</th>
        </tr>
    </thead>
    <tbody>
        $products = App\Models\Product::all();
        @foreach($products as $index => $product)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->user->name}}</td> <!-- แสดงชื่อผู้ใช้ -->
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var count = 1; // ตัวนับรายการสินค้า

        // ฟังก์ชันเพิ่มช่องใส่สินค้า
        $('#btn-add-product').on('click', function() {
            count = $('#add-product .product-item').length + 1; // คำนวณจำนวนสินค้าในปัจจุบัน

            $('#add-product').append(`
                <div class="col-6 mt-2 product-item">
                    <label class="form-label">${count}. ชื่อสินค้า:</label>
                    <div class="input-group">
                        <input type="text" name="product_name[]" class="form-control" placeholder="กรอกชื่อสินค้า" required>
                        <button type="button" class="btn btn-danger btn-delete-product">ลบ</button>
                    </div>
                </div>
            `);
        });

        // ฟังก์ชันลบสินค้า
        $(document).on('click', '.btn-delete-product', function() {
            $(this).closest('.product-item').remove();
        });
    });
</script>
@endsection