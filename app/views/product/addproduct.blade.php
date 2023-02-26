@extends("layout.main")
@section("content")
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Add new item</h2>
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
                                    <input type="text" class="form__input" placeholder="Đơn Giá" name="dongia_product">
                                    <h3 style="color: #fff;" align="center">{{$_COOKIE["err_price"]}}</h3>
                                </div>

                                <div class="col-12">
                                    <textarea id="text"  class="form__textarea" placeholder="Tên Sản Phẩm" name="name_product"></textarea>
                                    <h3 style="color: #fff;">{{$_COOKIE["err_name"]}}</h3>
                                </div>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <input type="text" class="form__input" placeholder="Parent ID" name="parent_id">
                                    <h3 style="color: #fff;" align="center">{{$_COOKIE["err_id"]}}</h3>
                                </div>
                                <div class="col-12">
                                    <div class="col-12">
                                        <button name="btn-addproduct" class="form__btn">Add</button>
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
@endsection