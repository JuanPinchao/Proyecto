@extends('layouts.welcome')

@section('content')
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($productos as $key => $producto)
            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="card-img-top" src="{{$producto->file}}" alt="" height="400px">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>{{$producto->nombre}}</b></h1>
                                <h3 class="h2">{{$producto->descripcion}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorías</h1>
                <p>Nuestro ecommerce ofrece una amplia variedad de categorías para satisfacer tus necesidades y preferencias.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($categorias as $categoria) 
            <div class="col-12 col-md-4 p-5 mt-3">
                <img src="{{$categoria->file}}" class="rounded-circle img-fluid border" style="width: 300px; height: 300px;">
                <h5 class="text-center mt-3 mb-3">{{$categoria->nombre}}</h5>
                <p>{{$categoria->descripcion}}</p>
                <p class="text-center"><a href="{{route('shop.showCategoria',$categoria->id)}}" class="btn btn-success">Go Shop</a></p>
            </div>
            @endforeach
        </div>
    </section>
    
    
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Productos Destacados</h1>
                    <p>Descubre nuestra selección de productos destacados, 
                        cuidadosamente elegidos para brindarte la mejor experiencia.
                        Explora nuestra colección destacada y déjate sorprender por lo que tenemos para ofrecerte.
                    </p>
                    
                </div>
            </div>
            <div class="row">
                @foreach ($productos2 as $producto)       
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('index.show',$producto->id) }}">
                            <img src="{{$producto->file}}" class="card-img-top" alt="{{$producto->descripcion}}" height="300px">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <?php
                                    $starCount = rand(4, 5); 
                                    for ($i = 0; $i < $starCount; $i++) {
                                        echo '<i class="text-warning fa fa-star"></i>';
                                    }
                                    for ($i = $starCount; $i < 5; $i++) {
                                        echo '<i class="text-muted fa fa-star"></i>';
                                    }
                                    ?>
                                </li>
                                <li class="text-muted text-right">{{$producto->precio}}</li>
                            </ul>
                            <a class="h2 text-decoration-none text-dark">{{$producto->nombre}}</a>
                            <p class="card-text mt-4">{{$producto->descripcion}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection