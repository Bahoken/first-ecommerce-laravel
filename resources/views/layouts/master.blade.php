<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application E-Commerce développée avec le Framework Laravel par Yves Bahoken">
    <meta name="author" content="Yves Bahoken">
    @yield('extra-meta')

    <title>
      {{ config('app.name', 'Laravel') }}
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('extra-script')

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- FontAwesome 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ecommerce App CSS -->
    <link rel="stylesheet" href="{{ asset('css/ecommerce.css') }}">
  </head>

  <body>
<div>
  <div class="container">
    <header class="blog-header pt-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="text-muted" href="{{ route('cart.index') }}">Panier <span class="badge badge-pill badge-info text-white">{{ Cart::count() }}</span></a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo" style="color: #17a2b8 !important;" href="{{ route('products.index') }}"><img src="{{ asset('img/logo.png') }}" width="200" alt=""></a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          @include('partials.search')
          @include('partials.auth')
        </div>
      </div>
    </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @foreach (App\Category::all() as $category)
      <a class="p-2 text-muted" href="{{ route('products.index', ['categorie' => $category->slug]) }}">{{ $category->name }}</a>
      @endforeach
    </nav>
  </div>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul class="mb-0 mt-0">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif

  @if (request()->input('q'))
    <h6>{{ $products->total() }} résultat(s) pour la recherche "{{ request()->q }}"</h6>
  @endif
  <div class="row mb-2">
  @yield('content')
  </div>
</div>

<footer class="blog-footer">
  <p>
    <a href="#">By Yves Bahoken</a> - 🛒 Application E-Commerce avec Laravel
  </p>
</footer>
</div>
@yield('extra-js')
</body>
</html>
