@extends('admin.layouts.mainlayouts')
@extends('admin.layouts.navbar')
@section('title', 'Destination')

@section('content')
{{$packages->destination}}
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">{{$packages->name}}</h4>
                    <h6 class="card-subtitle">Support card subtitle</h6>
                </div>
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/samples/architecture1.jpg" class="d-block w-100"
                                alt="Image Architecture">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/samples/bg-mountain.jpg" class="d-block w-100" alt="Image Mountain">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/samples/jump.jpg" class="d-block w-100" alt="Image Jump">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt assumenda mollitia
                        officia dolorum eius quasi.Chocolate sesame snaps apple pie danish cupcake sweet roll
                        jujubes tiramisu.
                    </p>
                    <p class="card-text">
                        Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee
                        sugar
                        plum sugar
                        plum jelly-o jujubes bonbon dessert carrot cake.
                        Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping fruitcake.
                        Caramels liquorice
                        biscuit ice cream fruitcake cotton candy tart.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
