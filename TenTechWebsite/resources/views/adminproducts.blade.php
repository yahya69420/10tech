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
  <div class="container m-3">
    <h1>
      PRODUCTS TABLE
    </h1>
    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Add Product
    </button>
  </div>

  <div class="container-fluid">
    <table class="table caption-top table-bordered mb-4">
      <caption>List of products</caption>
      <thead>
        <tr>
          <th scope="col" class="table-dark">ID</th>
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
            <button class="btn btn-danger">Remove</button>
          </td>
        </tr>
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