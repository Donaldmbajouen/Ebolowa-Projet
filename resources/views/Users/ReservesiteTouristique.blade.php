@extends('layouts.UsersHome')
@section('content')

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="{{ asset('img/UserImages/nav-ebolowa.png') }}" class="d-block w-120" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
		</div>
		<div class="carousel-item">
			<img src="{{ asset('img/UserImages/site2.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
		</div>
		<div class="carousel-item">
			<img src="{{ asset('img/UserImages/img-tourisme') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
		</div>
	</div>
	<a class="carousel-control-prev" data-bs-target="#carouselExampleFade" role="button" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</a>
	<a class="carousel-control-next" data-bs-target="#carouselExampleFade" role="button" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</a>
    <div class="d-flex  form-content justify-content-center p-2 mt-0">
        <form action="">
            <div class="row py-2 bg-dark rounded-3 ">
                <div class="col-sm-3  mx-1 form-header">
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" class="form-control" id="firstName" placeholder="Ebolowa" value="" required>
                </div>
                <div class="col-sm-2 mx-1 form-header">
                    <input type="date" class="form-control bg-light" id="firstName" placeholder="" value="" required>
                </div>
                <div class="col-sm-2 mx-1 form-header">
                    <input type="date" class="form-control" id="firstName" placeholder="" value="" required>
                </div>
                <div class="col-sm-2 mx-1 form-header">
                    <i class="fa fa-users"></i>
                    <input type="number" class="form-control" id="firstName" placeholder="2 adultes, 1 room" value="" required>
                </div>
                <div class="col-sm-2 py-1">
                    <input type="submit" class="form-control btn btn-primary px-1 py-2 " id="firstName" value="Search" required>
                </div>
            </div>
        </form>

    </div>
</div><br>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-4">
            <img src="{{ asset('img/UserImages/nav-ebolowa.png') }}"style="height: 700px; width:850px;"  >
        </div>
        <div class="col-md-4">
            <img src="{{ asset('img/UserImages/nav-ebolowa.png') }}"style="height: 345px;width:400px; margin-bottom:10px;">
            <img src="{{ asset('img/UserImages/nav-ebolowa.png') }}" style="height: 345px;width:400px;" >
        </div>
    </div>
</div><br>

<div class="container p-5">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row">
                <div class="col-md-7 ">
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (2.3k vues)
                    </p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae est, perferendis quis cupiditate velit
                        accusantium alias eos suscipit vel natus! Eaque, ipsa mollitia! Porro ad, consequuntur illum molestiae
                        necessitatibus expedita quo.
                        Possimus culpa natus aspernatur vel ea ipsum iusto laudantium reiciendis
                        assumenda dolorem libero aut recusandae itaque corrupti, rerum temporibus soluta
                        veniam. Non placeat ea, accusantium velit architecto harum commodi mollitia necessitatibus exercitationem
                        dolores ipsa illo facere temporibus in. Aliquam nobis dolores aut impedit, soluta deleniti, iusto enim, nam
                        suscipit repellendus animi fugit omnis id amet dolorum ut sunt? Vitae optio quia at, eum perspiciatis accusamus
                        aperiam voluptatem impedit, amet qui quisquam nam facilis quae pariatur! Quasi quaerat sint voluptatem? Suscipit
                         et repudiandae blanditiis quas doloremque veritatis ut sed nulla voluptas accusantium explicabo, autem ipsam eius
                         iure eum consectetur sint vero repellendus harum in. Illo quae neque corrupti optio reprehenderit molestias amet!
                    </p>
                    <div class="details">
                        <p><span class="title_details">Destination  </span> :Zurich, Switzerland</p>
                        <p><span class="title_details">Destination  </span> :Zurich, Switzerland</p>
                        <p><span class="title_details">Destination  </span> :Zurich, Switzerland</p>
                        <p><span class="title_details">Destination  </span> :Zurich, Switzerland</p>
                        <p><span class="title_details">Destination  </span> :Zurich, Switzerland</p>
                        <p><span class="title_details">Destination  </span> :Zurich, Switzerland</p>
                        <p><span class="title_details">Destination  </span> :Zurich, Switzerland</p>
                    </div>
                </div>
                <div class="col-md-5 p-5">
                    <div class="p-5 bg-light">
                        <h1>Book This Tour</h1>
                        <p>Ex optio sequi et quos praesentium in nostrum
                            labore nam rerum iusto aut magni nesciunt? Quo
                            quidem neque iste expedita est dolo.
                            </p>
                        <form>
                            <div class="row mb-3">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3">
                              </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputPassword3">
                                </div>
                            </div><br>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div><br>
                              <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="1">
            <div class="col-md-5 p-5">
                <div class="p-5 bg-light">
                    <h1>Book This Tour</h1>
                    <p>Ex optio sequi et quos praesentium in nostrum
                        labore nam rerum iusto aut magni nesciunt? Quo
                        quidem neque iste expedita est dolo.
                        </p>
                    <form>
                        <div class="row mb-3">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3">
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword3">
                            </div>
                        </div><br>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div><br>
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>

                    </form>
                </div>
            </div>
            <div class="col-md-7">
                
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">3</div>
    </div>

</div><br><br>

<!-- Button trigger modal -->


@endsection

