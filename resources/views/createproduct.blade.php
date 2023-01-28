<!doctype html>
    <html lang="{{ app()->getLocale() }}">
    <head>
      <title>Create Product | Product Store</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    
      
    </head>
    <body style="width: 100%; height:100vh;">
        <div class="container d-flex justify-content-center align-items-center flex-column h-100">
                <form method="POST" action="{{ config('app.url')}}/products" class="w-50">
                    @csrf
                    <h4> Enter Details to create a product</h4>
                    <div class="form-input">
                        <label>Name</label> <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-input">
                        <label>Description</label> <input type="text" name="description" class="form-control">
                    </div>

                    <div class="form-input">
                        <label>Count</label> <input type="number" name="count" class="form-control">
                    </div>

                    <div class="form-input">
                        <label>Price</label> <input type="number" name="price" class="form-control">
                    </div>

                    <button class="mt-3" type="submit">Submit</button>
                </form>
        </div>
    </body>
    </html>