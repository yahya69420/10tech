<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>View all products</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('admin/dashboard') }}">TenTech: Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse show" id="navbarDark">
        <ul class="navbar-nav me-auto mb-2 mb-xl-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('admin/dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active bg-primary text-white rounded-pill" href="{{ url('admin/adminproducts') }}">Product View</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/admincust') }}">Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/orders') }}">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Go to customer shop</a>
          </li>
        </ul>
        <a href="{{ url('logout') }}">
          <!-- credit (even though it is not required) https://uiverse.io/kennyotsu-monochromia/spicy-quail-62 -->
          <button class="Btn">
            <div class="sign"><svg viewBox="0 0 512 512">
                <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
              </svg></div>
            <div class="text">Logout</div>
          </button>
        </a>
        <style>
          .Btn {
            --black: #000000;
            --ch-black: #141414;
            --eer-black: #1b1b1b;
            --night-rider: #2e2e2e;
            --white: #ffffff;
            --af-white: #f3f3f3;
            --ch-white: #e1e1e1;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: var(--af-white);
          }

          /* plus sign */
          .sign {
            width: 100%;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
          }

          .sign svg {
            width: 17px;
          }

          .sign svg path {
            fill: var(--night-rider);
          }

          /* text */
          .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: var(--night-rider);
            font-size: 1.2em;
            font-weight: 600;
            transition-duration: .3s;
          }

          /* hover effect on button width */
          .Btn:hover {
            width: 125px;
            border-radius: 5px;
            transition-duration: .3s;
          }

          .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
          }

          /* hover effect button's text */
          .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
          }

          /* button click effect*/
          .Btn:active {
            transform: translate(2px, 2px);
          }
        </style>
      </div>
    </div>
  </nav>
  <div class="container m-3">
    <h1>
      PRODUCTS TABLE
    </h1>
    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Add Product
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      View Removed Products
    </button>
  </div>

  <div class="collapse" id="collapseExample">
    <div class="card card-body">
      <!-- the removed products table -->
      <div class="container-fluid">
        <table class="table caption-top table-bordered mb-4">
          <caption>List of removed products <strong>({{ count($unavailableProducts) }} fetched)</strong></caption>
          <thead>
            <tr>
              <th scope="col" class="table-dark">ID</th>
              <th scope="col" class="table-dark">Availability in store?</th>
              <th scope="col" class="table-dark">Image</th>
              <th scope="col" class="table-dark">Name</th>
              <th scope="col" class="table-dark">Price</th>
              <th scope="col" class="table-dark">Stock</th>
              <th scope="col" class="table-dark">Category</th>
              <th scope="col" class="table-dark">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($unavailableProducts as $product)
            <tr class="table-danger">
              <th scope="row">{{ $product->id }}</th>
              <td>
                <span class="badge bg-danger" style="font-size: 15px; color:black;">
                  <i class="fas fa-ban"></i> Not available in store
                </span>
              </td>
              <td style="height: 100px; width:100px;"><img src="{{ asset($product->image) }}" alt="product image" class="img-fluid" style="width: 100%; height: 100%;"></td>
              <td><strong><a href="{{ url('productdetail/'.$product->id) }}">{{ $product->name }}</a></strong></td>
              <td><strong>£{{ $product->price }}</strong></td>
              <td>
                @if($product->stock == 0)
                <span class="badge bg-danger" style="font-size: 15px; color:black;">
                  <i class="fa-solid fa-circle-xmark"></i> Out of Stock
                </span>
                @elseif ($product->stock < 10) <span class="badge bg-warning" style="font-size: 15px; color:black;">
                  <i class="fas fa-exclamation-circle"></i> Low Stock ({{ $product->stock }})
                  </span>
                  @else
                  <span class="badge bg-success" style="font-size: 15px; color:black;">
                    <i class="fa-solid fa-check"></i> In Stock ({{ $product->stock }})
                  </span>
                  @endif
              </td>
              <td>
                @foreach ($productToCategory as $productCategory)
                @if($productCategory->product_id == $product->id)
                @if ($productCategory->category_id == 1)
                <span class="badge bg-info" style="font-size: 15px; color:black;">Mobile</span>
                @endif
                @if ($productCategory->category_id == 2)
                <span class="badge bg-info" style="font-size: 15px; color:black;">Console</span>
                @endif
                @if ($productCategory->category_id == 3)
                <span class="badge bg-info" style="font-size: 15px; color:black;">Monitor</span>
                @endif
                @if ($productCategory->category_id == 4)
                <span class="badge bg-info" style="font-size: 15px; color:black;">Tablet</span>
                @endif
                @if ($productCategory->category_id == 5)
                <span class="badge bg-info" style="font-size: 15px; color:black;">Laptop</span>
                @endif
                @endif
                @endforeach
              </td>
              <td>
                <!-- <button class="btn btn-secondary">Edit</button> -->
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">Edit</button>
                <!-- <button class="btn btn-danger">Remove</button> -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#makeAvailableProductModal{{ $product->id }}">Make available</button>
              </td>
            </tr>
            <!-- ############################################################## -->
            <!-- ############################################################## -->

            <!-- make available PRODUCT -->

            <div class="modal fade" id="makeAvailableProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="makeAvailableModalLabel{{ $product->id }}" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="makeAvailableModalLabel{{ $product->id }}">Make available {{ $product->name }} (ID: {{ $product->id }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="text-center mb-3">
                      <img src="{{ asset($product->image) }}" alt="product image" class="img-thumbnail" style="width:300px; height:300px;">
                    </div>
                    <p class="p-3 mb-2 bg-warning text-white">Are you sure you want to make this product available?</p>
                    <form method="POST" action="{{ url('admin/adminproducts/make-available') }}">
                      @csrf
                      <input hidden name="productID" value="{{ $product->id }}">
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Make available</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- ############################################################## -->
            <!-- ############################################################## -->
            <!-- edit product mdal -->
            <!-- Modal -->
            <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit {{ $product->name }} (ID: {{ $product->id }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ url('admin/adminproducts/edit-product') }}" enctype="multipart/form-data">
                      @csrf
                      <input hidden name="productID" value="{{ $product->id }}">
                      <!-- the exisitng image -->
                      <div class="text-center mb-3">
                        <img src="{{ asset($product->image) }}" alt="product image" class="img-thumbnail" style="width:300px; height:300px;">
                      </div>

                      <!-- the option to change the image -->
                      <div class="mb-3 form-floating">
                        <input type="file" accept="image/*" class="form-control" id="productImage" name="productImage">
                        <label for="productImage">Product Image</label>
                      </div>

                      <!-- the name of the pdicutc -->
                      <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="productName" name="productName" value="{{ $product->name }}">
                        <label for="productName" class="form-label">Product Name</label>
                      </div>


                      <!-- the price of the product -->

                      <div class="mb-3 form-floating">
                        <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter product price" value="{{ $product->price }}">
                        <label for="productPrice">Product Price</label>
                      </div>

                      <!-- the description of the product -->

                      <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="productDescription" name="productDescription" style="height: 100px">{{ $product->description }}</textarea>
                        <label for="productDescription">Product Description</label>
                      </div>

                      <!-- the stock of the product -->

                      <div class="mb-3 form-floating">
                        <input type="number" class="form-control" id="productStock" name="productStock" placeholder="Enter product stock" value="{{ $product->stock }}">
                        <label for="productStock">Product Stock</label>
                      </div>

                      <!-- the category of the product -->
                      <div class="form-floating mb-3">
                        <select class="form-select" id="categorySelection" name="categorySelection" aria-label="Floating label select example">
                          @foreach ($productToCategory as $category)
                          @if ($category->product_id == $product->id)
                          @php
                          $category = App\Models\Category::where('id', $category->category_id)->first();
                          $name = $category->name;
                          @endphp
                          <option selected class="bg-dark text-white">{{ $name }}</option>
                          @foreach($categories as $category)
                          @if($category->name !== $name)
                          <option value="{{$category->name}}">{{$category->name}}</option>
                          @endif
                          @endforeach
                          @endif
                          @endforeach
                        </select>
                        <label for="categorySelection">Category</label>
                      </div>

                      <!-- product brand -->
                      <div class="form-floating mb-3">
                        <select class="form-select" id="brandSelection" name="brandSelection" aria-label="Floating label select example">
                          <!-- <option>Select Brand</option> -->
                          <option selected class="bg-dark text-white">{{ $product->brand }}</option>
                          @foreach($brands as $brand)
                          @if($brand->brand !== $product->brand)
                          <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                          @endif
                          @endforeach
                        </select>
                        <label for="brandSelection">Brand</label>
                      </div>


                      <!-- product release year -->

                      <div class="form-floating mb-3">
                        <select class="form-select" id="yearSelection" name="yearSelection" aria-label="Floating label select example">
                          <option selected class="bg-dark text-white">{{ $product->release }}</option>
                          @for ($i = 2025; $i > 2017; $i--)
                          @if($i !== $product->release)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endif
                          @endfor
                        </select>
                        <label for="yearSelection">Release Year</label>
                      </div>
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button class="button" type="button" data-bs-dismiss="modal">
                          <span class="button-content">Close </span>
                        </button>
                        <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                        <!-- attribution is not required but regardless: https://uiverse.io/cssbuttons-io/massive-mayfly-74 -->
                        <button class="button" type="submit">
                          <span class="button-content">Edit </span>
                        </button>

                        <style>
                          .button {
                            position: relative;
                            overflow: hidden;
                            height: 3rem;
                            padding: 0 2rem;
                            border-radius: 1.5rem;
                            background: #3d3a4e;
                            background-size: 400%;
                            color: #fff;
                            border: none;
                            cursor: pointer;
                          }

                          .button:hover::before {
                            transform: scaleX(1);
                          }

                          .button-content {
                            position: relative;
                            z-index: 1;
                          }

                          .button::before {
                            content: "";
                            position: absolute;
                            top: 0;
                            left: 0;
                            transform: scaleX(0);
                            transform-origin: 0 50%;
                            width: 100%;
                            height: inherit;
                            border-radius: inherit;
                            background: linear-gradient(82.3deg,
                                rgba(150, 93, 233, 1) 10.8%,
                                rgba(99, 88, 238, 1) 94.3%);
                            transition: all 0.475s;
                          }
                        </style>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- MODAL END -->
            <!-- ############################################################## -->
            <!-- ############################################################## -->
            @endforeach
        </table>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <table class="table caption-top table-bordered mb-4">
      <caption>List of available products <strong>({{ $products->total() }} fetched)</strong></caption>
      <thead>
        <tr>
          <th scope="col" class="table-dark">ID</th>
          <th scope="col" class="table-dark">Availability in store?</th>
          <th scope="col" class="table-dark">Image</th>
          <th scope="col" class="table-dark">Name</th>
          <th scope="col" class="table-dark">Price</th>
          <th scope="col" class="table-dark">Stock</th>
          <th scope="col" class="table-dark">Category</th>
          <th scope="col" class="table-dark">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr class="table-dark">
          <th scope="row">{{ $product->id }}</th>
          <td>
            <span class="badge bg-success" style="font-size: 15px; color:black;">
              <i class="fas fa-thumbs-up"></i> Available in store
            </span>
          </td>
          <td style="height: 100px; width:100px;"><img src="{{ asset($product->image) }}" alt="product image" class="img-fluid" style="width: 100%; height: 100%;"></td>
          <td><strong><a href="{{ url('productdetail/'.$product->id) }}">{{ $product->name }}</a></strong></td>
          <td><strong>£{{ $product->price }}</strong></td>
          <td>
            @if($product->stock == 0)
            <span class="badge bg-danger" style="font-size: 15px; color:black;">
              <i class="fa-solid fa-circle-xmark"></i> Out of Stock
            </span>
            @elseif ($product->stock < 10) <span class="badge bg-warning" style="font-size: 15px; color:black;">
              <i class="fas fa-exclamation-circle"></i> Low Stock ({{ $product->stock }})
              </span>
              @else
              <span class="badge bg-success" style="font-size: 15px; color:black;">
                <i class="fa-solid fa-check"></i> In Stock ({{ $product->stock }})
              </span>
              @endif
          </td>
          <td>
            @foreach ($productToCategory as $productCategory)
            @if($productCategory->product_id == $product->id)
            @if ($productCategory->category_id == 1)
            <span class="badge bg-info" style="font-size: 15px; color:black;">Mobile</span>
            @endif
            @if ($productCategory->category_id == 2)
            <span class="badge bg-info" style="font-size: 15px; color:black;">Console</span>
            @endif
            @if ($productCategory->category_id == 3)
            <span class="badge bg-info" style="font-size: 15px; color:black;">Monitor</span>
            @endif
            @if ($productCategory->category_id == 4)
            <span class="badge bg-info" style="font-size: 15px; color:black;">Tablet</span>
            @endif
            @if ($productCategory->category_id == 5)
            <span class="badge bg-info" style="font-size: 15px; color:black;">Laptop</span>
            @endif
            @endif
            @endforeach
          </td>
          <td>
            <!-- <button class="btn btn-secondary">Edit</button> -->
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">Edit</button>
            <!-- <button class="btn btn-danger">Remove</button> -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeProductModal{{ $product->id }}">Remove</button>
          </td>
        </tr>
        <!-- ############################################################## -->
        <!-- ############################################################## -->

        <!-- REMOVE PRODUCT -->

        <div class="modal fade" id="removeProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="removeProductModalLabel{{ $product->id }}">Remove {{ $product->name }} (ID: {{ $product->id }})</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="text-center mb-3">
                  <img src="{{ asset($product->image) }}" alt="product image" class="img-thumbnail" style="width:300px; height:300px;">
                </div>
                <p class="p-3 mb-2 bg-danger text-white">Are you sure you want to remove this product?</p>
                <form method="POST" action="{{ url('admin/adminproducts/remove-product') }}">
                  @csrf
                  <input hidden name="productID" value="{{ $product->id }}">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- ############################################################## -->
        <!-- ############################################################## -->
        <!-- edit product mdal -->
        <!-- Modal -->
        <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit {{ $product->name }} (ID: {{ $product->id }})</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ url('admin/adminproducts/edit-product') }}" enctype="multipart/form-data">
                  @csrf
                  <input hidden name="productID" value="{{ $product->id }}">
                  <!-- the exisitng image -->
                  <div class="text-center mb-3">
                    <img src="{{ asset($product->image) }}" alt="product image" class="img-thumbnail" style="width:300px; height:300px;">
                  </div>

                  <!-- the option to change the image -->
                  <div class="mb-3 form-floating">
                    <input type="file" accept="image/*" class="form-control" id="productImage" name="productImage">
                    <label for="productImage">Product Image</label>
                  </div>

                  <!-- the name of the pdicutc -->
                  <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="productName" name="productName" value="{{ $product->name }}">
                    <label for="productName" class="form-label">Product Name</label>
                  </div>


                  <!-- the price of the product -->

                  <div class="mb-3 form-floating">
                    <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter product price" value="{{ $product->price }}">
                    <label for="productPrice">Product Price</label>
                  </div>

                  <!-- the description of the product -->

                  <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="productDescription" name="productDescription" style="height: 100px">{{ $product->description }}</textarea>
                    <label for="productDescription">Product Description</label>
                  </div>

                  <!-- the stock of the product -->

                  <div class="mb-3 form-floating">
                    <input type="number" class="form-control" id="productStock" name="productStock" placeholder="Enter product stock" value="{{ $product->stock }}">
                    <label for="productStock">Product Stock</label>
                  </div>

                  <!-- the category of the product -->
                  <div class="form-floating mb-3">
                    <select class="form-select" id="categorySelection" name="categorySelection" aria-label="Floating label select example">
                      @foreach ($productToCategory as $category)
                      @if ($category->product_id == $product->id)
                      @php
                      $category = App\Models\Category::where('id', $category->category_id)->first();
                      $name = $category->name;
                      @endphp
                      <option selected class="bg-dark text-white">{{ $name }}</option>
                      @foreach($categories as $category)
                      @if($category->name !== $name)
                      <option value="{{$category->name}}">{{$category->name}}</option>
                      @endif
                      @endforeach
                      @endif
                      @endforeach
                    </select>
                    <label for="categorySelection">Category</label>
                  </div>

                  <!-- product brand -->
                  <div class="form-floating mb-3">
                    <select class="form-select" id="brandSelection" name="brandSelection" aria-label="Floating label select example">
                      <!-- <option>Select Brand</option> -->
                      <option selected class="bg-dark text-white">{{ $product->brand }}</option>
                      @foreach($brands as $brand)
                      @if($brand->brand !== $product->brand)
                      <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                      @endif
                      @endforeach
                    </select>
                    <label for="brandSelection">Brand</label>
                  </div>


                  <!-- product release year -->

                  <div class="form-floating mb-3">
                    <select class="form-select" id="yearSelection" name="yearSelection" aria-label="Floating label select example">
                      <option selected class="bg-dark text-white">{{ $product->release }}</option>
                      @for ($i = 2025; $i > 2017; $i--)
                      @if($i !== $product->release)
                      <option value="{{ $i }}">{{ $i }}</option>
                      @endif
                      @endfor
                    </select>
                    <label for="yearSelection">Release Year</label>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button class="button" type="button" data-bs-dismiss="modal">
                      <span class="button-content">Close </span>
                    </button>
                    <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                    <!-- attribution is not required but regardless: https://uiverse.io/cssbuttons-io/massive-mayfly-74 -->
                    <button class="button" type="submit">
                      <span class="button-content">Edit </span>
                    </button>

                    <style>
                      .button {
                        position: relative;
                        overflow: hidden;
                        height: 3rem;
                        padding: 0 2rem;
                        border-radius: 1.5rem;
                        background: #3d3a4e;
                        background-size: 400%;
                        color: #fff;
                        border: none;
                        cursor: pointer;
                      }

                      .button:hover::before {
                        transform: scaleX(1);
                      }

                      .button-content {
                        position: relative;
                        z-index: 1;
                      }

                      .button::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        transform: scaleX(0);
                        transform-origin: 0 50%;
                        width: 100%;
                        height: inherit;
                        border-radius: inherit;
                        background: linear-gradient(82.3deg,
                            rgba(150, 93, 233, 1) 10.8%,
                            rgba(99, 88, 238, 1) 94.3%);
                        transition: all 0.475s;
                      }
                    </style>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL END -->
        <!-- ############################################################## -->
        <!-- ############################################################## -->

        @endforeach
      </tbody>
    </table>
  </div>
  <!--  Pagination -->
  <style>
    svg {
      width: 5%;
    }
  </style>
  <div class="text-center" style="font-size: 20px;">
    {{ $products->links() }}
  </div>

  <!-- ############################################################## -->

  <!-- ############################################################## -->


  <!--  add product odal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="text-center mb-3">
            <img src="https://via.placeholder.com/150" alt="product image" class="img-fluid">
          </div>
          <form method="POST" action="{{ url('admin/adminproducts/add-product') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 form-floating">
              <!-- <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" placeholder="Choose product image"> -->
              <input type="file" accept="image/*" class="form-control" id="productImage" name="productImage" required>
              <label for="productImage">Product Image</label>
            </div>

            <div class="mb-3 form-floating">
              <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
              <label for="productName">Product Name</label>
            </div>
            <div class="mb-3 form-floating">
              <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter product price" required>
              <label for="productPrice">Product Price</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Leave a comment here" id="productDescription" name="productDescription" style="height: 100px" required></textarea>
              <label for="productDescription">Product Description</label>
            </div>
            <div class="mb-3 form-floating">
              <input type="number" class="form-control" id="productStock" name="productStock" placeholder="Enter product stock" required>
              <label for="productStock">Product Stock</label>
            </div>
            <div class="form-floating mb-3">
              <select class="form-select" id="categorySelection" name="categorySelection" aria-label="Floating label select example" required>
                <option selected>Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
              <label for="categorySelection">Category</label>
            </div>

            <!-- product brand -->
            <div class="form-floating mb-3">
              <select class="form-select" id="brandSelection" name="brandSelection" aria-label="Floating label select example" required>
                <option selected>Brand</option>
                @foreach($brands as $brand)
                <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                @endforeach
              </select>
              <label for="brandSelection">Brand</label>
            </div>


            <!-- product release year -->
            <div class="form-floating mb-3">
              <select class="form-select" id="yearSelection" name="yearSelection" aria-label="Floating label select example" required>
                <option selected>Release Year</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
              </select>
              <label for="yearSelection">Release Year</label>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
              <button class="button" type="button" data-bs-dismiss="modal">
                <span class="button-content">Close </span>
              </button>
              <!-- <button type="submit" class="btn btn-primary" id="addTheProductButton">Add</button> -->
              <!-- attribution is not required but regardless: https://uiverse.io/cssbuttons-io/massive-mayfly-74 -->
              <button class="button" type="submit">
                <span class="button-content">Add </span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @if (session('error'))
  <script>
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "{{ session('error') }}",
    });
  </script>
  @endif
  @if (session('success'))
  <script>
    Swal.fire({
      icon: "success",
      title: "Great!",
      text: "{{ session('success') }}",
    });
  </script>
  @endif
  @if (session('successfulEdit'))
  <script>
    Swal.fire({
      icon: "success",
      title: "Great!",
      text: "{{ session('successfulEdit') }}",
    });
  </script>
  @endif
</body>

</html>