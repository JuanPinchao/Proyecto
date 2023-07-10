@extends('layouts.welcome')

@section('content')
        <!-- Start Content -->
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3">
                    <h1 class="h2 pb-4">Categorias</h1>
                    <h1 class="h2 pb-4">
                      <a class="h3 text-decoration-none" href="{{ route('shop.index') }}" style="color: inherit;">all</a>
                    </h1>
                    @foreach ($categorias as $categoria) 
                      <ul class="list-unstyled templatemo-accordion">
                        <li class="pb-3">
                          <div class="d-flex justify-content-between align-items-center">
                            <a class="collapsed h3 text-decoration-none" href="{{ route('shop.showCategoria', $categoria->id) }}">
                              {{$categoria->nombre}}
                            </a>
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                          </div>
                          <ul class="collapse show list-unstyled pl-3">
                            @foreach ($categoria->subcategorias as $subcategoria)
                              <li><a class="text-decoration-none" href="{{ route('shop.showSubcategoria', $subcategoria->id) }}">{{$subcategoria->nombre}}</a></li>
                            @endforeach
                          </ul>
                        </li>
                      </ul>
                    @endforeach
                  </div>
    
                <div class="col-lg-9">
                    <div class="row">

                        <h1 class="pb-4">{{ $title->nombre }}</h1>
                        <p  class="pb-4">{{ $title->descripcion }}</p>

                        @foreach ($productos as $producto)
                               
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0"> 
                                    <a href="{{ route('index.show',$producto->id) }}">
                                        <img class="card-img rounded-0 img-fluid image-overlay" src="{{ asset($producto->file) }}" style="width: 300px; height: 280px;">
                                    </a>
                                    
                                </div>
                                <div class="card-body">
                                    <a class="h3 text-decoration-none">{{$producto->nombre}}</a>
                
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
                                </ul>
                                    <p class="text-center mb-0">${{$producto->precio}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                        <div div="row">
                            <ul class="pagination pagination-lg justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                                </li>
                            </ul>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!-- End Content -->
    
        <!-- Start Brands -->
        <section class="bg-light py-5">
            <div class="container my-4">
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto">
                        <h1 class="h1">Marcas</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                    <div class="col-lg-9 m-auto tempaltemo-carousel">
                        <div class="row d-flex flex-row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="{{asset('img/brand_01.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="{{asset('img/brand_02.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="{{asset('img/brand_03.png')}}" alt="Brand Logo"></a>
                                    </div>
                                    <div class="col-3 p-md-5">
                                        <a href="#"><img class="img-fluid brand-img" src="{{asset('img/brand_04.png')}}" alt="Brand Logo"></a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection