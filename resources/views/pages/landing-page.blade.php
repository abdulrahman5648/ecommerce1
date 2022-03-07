<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Ecommerce Example</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body>

    <header class="with-background">

        <nav class="top-nav container">
            <div class="logo">Laravel Ecommerce</div>
            <ul>
                <li>
                    <a href="{{ route('shop.index') }}">Shop</a>
                </li>
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
                <li>
                    <a href="{{ route('cart.index') }}">
                        Cart
                        @if (Cart::instance('default')->count() > 0)
                            <span class="cart-count">
                                <span>{{ Cart::instance('default')->count() }}</span>
                            </span>
                        @endif
                    </a>
                </li>
            </ul>
        </nav>

        <div class="hero container">
            <div class="hero-copy">
                <h1>Laravel Ecommerce Demo</h1>
                <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration.</p>
                <div class="hero-buttons">
                    <a href="#" class="button button-white">Blog Post</a>
                    <a href="https://abdulrahman5648.github.io/abdulrahman5648/"
                        class="button button-white"
                        target="blank"
                    >
                        GitHub
                    </a>
                </div>
            </div>

            <div class="hero-image">
                <img src="img/macbook-pro-laravel.png" alt="hero image">
            </div>
        </div>

    </header>

    <div class="featured-section">
        <div class="container">

            <h1 class="text-center">Laravel Ecommerce</h1>

            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic.</p>

            <div class="text-center button-container">
                <a href="#" class="button">Featured</a>
                <a href="#" class="button">On Sale</a>
            </div>

         {{--   <div class="tabs">
                <div class="tab">
                    Featured
                </div>
                <div class="tab">
                    On Sale
                </div>
            </div> --}}

            <div class="products text-center">
                @foreach ($products as $product)
                    <div class="product">
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <img src="{{ $product->image }}" alt="product">
                        </a>
                        <a href="{{ route('shop.show', $product->slug) }}">
                            <div class="product-name">
                                {{ $product->name }}
                            </div>
                        </a>
                        <div class="product-price">{{ $product->price }}</div>
                    </div>
                @endforeach
            </div>

            <div class="text-center button-container">
                <a href="{{ route('shop.index') }}" class="button">View more products</a>
            </div>

        </div>
    </div>

    <div class="blog-section">
        <div class="container">
            <h1 class="text-center">From Our Blog</h1>

            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic.</p>

            <div class="blog-posts">
                <div class="blog-post" id="blog1">
                    <a href="#"><img src="/img/blog1.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 1</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
                <div class="blog-post" id="blog2">
                    <a href="#"><img src="/img/blog2.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 2</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
                <div class="blog-post" id="blog3">
                    <a href="#"><img src="/img/blog3.png" alt="Blog Image"></a>
                    <a href="#"><h2 class="blog-title">Blog Post Title 3</h2></a>
                    <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tenetur numquam ipsam reiciendis.</div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>

    @include('partials.footer')

</body>
</html>