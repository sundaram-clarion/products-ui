<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My shop store</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Arial', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="">
            <div class="container">
				<h2>Products</h2>
				@if ($data['products']['status'] == 200 && isset($data['products']['list']->data) && count($data['products']['list']->data))
					@foreach ($data['products']['list']->data as $product)
						<a href="/details/{{ $product->id }}" style="color: #000000; padding: 15px; text-decoration: none;">
							<div style="border: 1px solid #ddd; padding: 15px;">
								<h3>{{ $product->name }}</h3>
								<p>{{ $product->size }} inch</p>
								<p>{{ $product->processor }}</p>
								<p>{{ $product->category }}</p>
							</div>
						</a>
					@endforeach
				@endif
            </div>
        </div>
    </body>
</html>
