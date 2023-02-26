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
                                    <textarea id="text" class="form__textarea" placeholder="Tên Danh Mục" name="name_product">{{$showUpdate['name']}}</textarea>
                                    <label style="color: #fff;">{{isset($err["name"])?$err["name"]:''}}</label>
                                </div>
                                <div class="col-12">
                                    <div class="col-12">
                                        <button name="btn-updatecateproduct" class="form__btn">Update</button>
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