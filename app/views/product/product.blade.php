@extends("layout.main")
@section("content")
<main class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- main title -->
            <div class="col-12">
                <div class="main__title">
                    <h2>Catalog</h2>

                    <span class="main__title-stat">14,452 Total</span>

                    <div class="main__title-wrap">
                        <!-- filter sort -->
                        <div class="filter" id="filter__sort">
                            <span class="filter__item-label">Sort by:</span>

                            <div class="filter__item-btn dropdown-toggle" role="navigation" id="filter-sort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="Date created">
                                <span></span>
                            </div>

                            <ul class="filter__item-menu dropdown-menu scrollbar-dropdown" aria-labelledby="filter-sort">
                                <li>Date created</li>
                                <li>Rating</li>
                                <li>Views</li>
                            </ul>
                        </div>
                        <!-- end filter sort -->

                        <!-- search -->
                        <form action="" method="post" class="main__title-form">
                            <input name="key-search" type="text"  placeholder="Find movie / tv series..">
                            <button name="btn-search">
                                <i class="icon ion-ios-search"></i>
                            </button>
                        </form>
                        <!-- end search -->
                    </div>
                </div>
            </div>
            <!-- end main title -->

            <!-- users -->
            <div class="col-12">
                <div class="main__table-wrap">
                    <table class="main__table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>T??n SP</th>
                                <th>????n Gi??</th>
                                <th>Parend ID</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $item => $value)
                            <tr>
                                <td>
                                    <div class="main__table-text">{{$value["id"]}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text"><a href="#">{{$value["name"]}}</a></div>
                                </td>                                
                                <td>
                                    <div class="main__table-text "><i class="icon ion-ios-star"></i> {{$value["dongia"]}}</div>
                                </td>
                                <td>
                                    <div class="main__table-text"><a href="#">{{$value["parent_id"]}}</a></div>
                                </td>
                                <td>
                                    <div class="main__table-btns">
                                        <a href="#modal-status" class="main__table-btn main__table-btn--banned open-modal">
                                            <i class="icon ion-ios-lock"></i>
                                        </a>
                                        <a href="./add-product" class="main__table-btn main__table-btn--view">
                                            <i class="icon ion-ios-eye"></i>
                                        </a>
                                        <a href="./update-product-{{$value['id']}}" class="main__table-btn main__table-btn--edit">
                                            <i class="icon ion-ios-create"></i>
                                        </a>
                                        <a href="./delete-product-{{$value['id']}}" class="main__table-btn main__table-btn--delete">
                                            <i class="icon ion-ios-trash"></i>
                                        </a>

                                    </div>
                                </td>

                            </tr>
                           
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

            <!-- end users -->

            <!-- paginator -->
            <div class="col-12">
                <div class="paginator-wrap">
                    <span>10 from 14 452</span>

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            <a href="#"><i class="icon ion-ios-arrow-back"></i></a>
                        </li>
                        <li class="paginator__item"><a href="#">1</a></li>
                        <li class="paginator__item paginator__item--active"><a href="#">2</a></li>
                        <li class="paginator__item"><a href="#">3</a></li>
                        <li class="paginator__item"><a href="#">4</a></li>
                        <li class="paginator__item paginator__item--next">
                            <a href="#"><i class="icon ion-ios-arrow-forward"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end paginator -->
        </div>
    </div>
</main>
<!-- end main content -->

<!-- modal status -->
<div id="modal-status" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Status change</h6>

    <p class="modal__text">Are you sure about immediately change status?</p>

    <div class="modal__btns">
        <button class="modal__btn modal__btn--apply" type="button">Apply</button>
        <button class="modal__btn modal__btn--dismiss" type="button">Dismiss</button>
    </div>
</div>
<!-- end modal status -->

<!-- modal delete -->

@endsection