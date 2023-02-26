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
                                    <input type="text" class="form__input" placeholder="ID Người Dùng" name="id_ngdung">
                                    <label style="color: #fff;">{{isset($err["id_ngdung"])?$err["id_ngdung"]:''}}</label>
                                </div>

                                <div class="col-12">
                                    <textarea id="text"  class="form__textarea" placeholder="Bình Luận" name="binh_luan"></textarea>
                                    <label style="color: #fff;">{{isset($err["binh_luan"])?$err["binh_luan"]:''}}</label>
                                </div>
                                <div class="col-12">
                                    <div class="col-12">
                                        <button name="btn-addcomment" class="form__btn">Add</button>
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