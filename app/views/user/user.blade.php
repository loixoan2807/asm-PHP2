@extends("layout.main")
@section("content")
<main class="main">
	<div class="container-fluid">
		<div class="row">
			<!-- main title -->
			<div class="col-12">
				<div class="main__title">
					<h2>Comments</h2>

					<span class="main__title-stat">21,356 Total</span>

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
							</ul>
						</div>
						<!-- end filter sort -->

						<!-- search -->
						<form action="#" class="main__title-form">
							<input type="text" placeholder="Key word..">
							<button type="button">
								<i class="icon ion-ios-search"></i>
							</button>
						</form>
						<!-- end search -->
					</div>
				</div>
			</div>
			<!-- end main title -->

			<!-- comments -->
			<div class="col-12">
				<div class="main__table-wrap">
					<table class="main__table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Email</th>
								<th>Password</th>
                                <th>Username</th>
								<th>ACTIONS</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($products as $item => $value)
							<tr>
								<td>
									<div class="main__table-text">{{$value["id"]}}</div>
								</td>
								<td>
									<div class="main__table-text"><a href="#">{{$value["email"]}}</a></div>
								</td>
                                <td>
									<div class="main__table-text">{{$value["pass"]}}</div>
								</td>
								<td>
									<div class="main__table-text">{{$value["username"]}}</div>
								</td>
								<td>
									<div class="main__table-btns">
										<a href="./add-user" class="main__table-btn main__table-btn--view ">
											<i class="icon ion-ios-eye"></i>
										</a>
										<a href="./update-user-{{$value['id']}}" class="main__table-btn main__table-btn--edit">
											<i class="icon ion-ios-create"></i>
										</a>
										<a href="./delete-user-{{$value['id']}}" class="main__table-btn main__table-btn--delete ">
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
			<!-- end comments -->

			<!-- paginator -->
			<div class="col-12">
				<div class="paginator-wrap">
					<span>10 from 21 356</span>

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
@endsection