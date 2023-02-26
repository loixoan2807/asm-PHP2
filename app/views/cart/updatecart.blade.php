@extends("layout.main")
@section("content")
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Update item</h2>
                </div>
            </div>
            <!-- end main title -->

            <!-- form -->
            <div class="col-12">
                <form action="" method="post" class="form">
                    <div class="row row--form">
                        <div class="col-12 col-md-7 form__content">
                            <div class="row row--form">
                                <div class="col-12">
                                    <input type="text" id="quantity" class="form__input" placeholder="Số Lượng" name="soluong" value="{{$showUpdate['so_luong']}}">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form__input" placeholder="ID Sản Phẩm" name="id_sp" value="{{$showUpdate['id_nameproduct']}}">
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" disabled id="money" class="form__input" placeholder="Đơn Giá" name="dongia" value="{{$showUpdate['dongia']}}">
                                </div>
                                <div class="col-12">
                                    <div class="col-12">
                                        <button name="btn-updatecart" class="form__btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <!-- end form -->
        </div>
    </div>
</main>
<script>
    const quantity = document.querySelector("#quantity");
    const money = document.querySelector("#money");
    const item = money.value / quantity.value;
    $(document).ready(function() {
        $("#quantity").change(function() {
            const valueUpdate=item*quantity.value;
             document.getElementById("money").value=valueUpdate;
            
        })
    })
</script>
@endsection