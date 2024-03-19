<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\CustomerMessage;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
 
class AdminController extends Controller
{
 
    public function index()
    {
            return view('layouts.dashboard');
       
    }
 
    public function securityCheck()
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'You are not logged in!');
        } else if (auth()->user()->is_admin == 0) {
            return redirect('/shop')->with('error', 'You are not an administrator of this site!');
        }
    }
 
    public function admincust()
    {
        $response = $this->securityCheck();
        if ($response) {
            return $response;
        }
        $data = User::where('is_admin', 0)->get();
        $datamess = CustomerMessage::all();
        return view('layouts.admincust', ['data' => $data], ['datamess' => $datamess]);
    }
 
    /**
     * Add a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addUser(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'], // Adjust password rules as needed
        ]);
 
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 
        // Create the user
        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
 
        // Redirect back with success message
        return redirect()->back()->with('success', 'User added successfully!');
    }
 
    public function removeUser($id)
    {
        // Find the user by id
        $user = User::findOrFail($id);
 
        // Delete the user
        $user->delete();
 
        // Redirect back with success message
        return Redirect::back()->with('success', 'User removed successfully!');
    }
 
    public function editUser(Request $request, $id)
    {
        // Find the user by id
        $user = User::findOrFail($id);
 
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'edit_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);
 
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 
        // Update the user's email
        $user->email = $request->input('edit_email');
        $user->save();
 
        // Redirect back with success message
        return Redirect::back()->with('success', 'User email updated successfully!');
    }
 
    public function adminproducts()
    { {
            // // clear the session
            // session()->forget('success');
            // session()->forget('error');
            $products = Product::simplePaginate(10);
            // get all of the bransd from the porducts table
            $brands = Product::select('brand')->distinct()->get();
            // dd($brands);
            $categories = Category::all();
 
            // get all of the contents of the pivot table for the category and product
            $productToCategory = DB::table('category_product')->get();
            // dd($productToCategory);
 
            // dd($categories);
            return view('adminproducts', ['products' => $products, 'categories' => $categories, 'brands' => $brands, 'productToCategory' => $productToCategory]);
        }
    }
 
    public function addNewProduct(Request $request)
    {
        // $response = $this->securityCheck();
        // if ($response) {
        //     return $response;
        // }
        // we need to validate the data frist
        $request->validate([
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'productName' => 'required',
            'productPrice' => 'required | numeric | min:0 |',
            'productDescription' => 'required | max:255 | string',
            'productStock' => 'required | numeric | min:0 |',
        ]);
 
        // we need to check that an actual category is selected, not the null value, same for the brand and the year
        if ($request->categorySelection == "Category") {
            return redirect()->back()->with('error', 'Please select a valid category!');
        }
 
        if ($request->brandSelection == "Brand") {
            return redirect()->back()->with('error', 'Please select a valid brand!');
        }
 
        if ($request->yearSelection == "ReleaseYear") {
            return redirect()->back()->with('error', 'Please select a valid release year!');
        }
 
        // lets make a new product that is currently empty
        $product = new Product();
        // lets sstore hte respective dat afrom the request payload into the product object
        $product->name = $request->productName;
        $product->price = $request->productPrice;
        $product->description = $request->productDescription;
        // we need to to sabe the image into a var
        $image = $request->file('productImage');
        // lets change the name of the image to the current time and the original name of the image
        $imageName = time() . '.' . $image->extension();
        // lets move the image to the public folder
        $image->move(public_path('/'), $imageName);
        // lets store the image name in the product object
        $product->image = $imageName;
        // lets store hte stock of the product
        $product->stock = $request->productStock;
        // let fix the brand right now
        $product->brand = $request->brandSelection;
        // lets sotre the release yr  of the product
        $product->release = $request->yearSelection;
        // lets save the product
        $product->save();
 
        // lets get the category that the product is in
        $category = Category::find($request->categorySelection);
 
        // lets attach the category to the product
 
        $product->categories()->attach($category);
 
        // lets redirect back with a success message
        return redirect()->back()->with('success', $product->name . ' added successfully!');
    }
 
    public function editNewProduct(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'productImage' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'productPrice' => 'numeric | min:0 |',
            'productDescription' => 'max:255 | string',
            'productStock' => 'numeric | min:0 |',
        ]);
 
        // we need to check that an actual category is selected
 
        if ($request->categorySelection == "Category") {
            return redirect()->back()->with('error', 'Please select a valid category!');
        }
 
        if ($request->brandSelection == "Brand") {
            return redirect()->back()->with('error', 'Please select a valid brand!');
        }
 
        if ($request->yearSelection == "ReleaseYear") {
            return redirect()->back()->with('error', 'Please select a valid release year!');
        }
 
 
        // lets fetch the current product form the database
        $product = Product::find($request->productID);
 
 
        // if nothing was changed, we dont need to update the product
        if ($request->productName == $product->name && $request->productPrice == $product->price && $request->productDescription == $product->description && $request->productStock == $product->stock && $request->brandSelection == $product->brand && $request->yearSelection == $product->release && !$request->file('productImage')) {
            return redirect()->back()->with('error', 'No changes were made to the product!');
        }
 
        // lets store the old name of the product, or the new name if it was changed
        if ($request->productName != $product->name) {
            $product->name = $request->productName;
        }
 
        // lets store the old price of the product, or the new price if it was changed
        if ($request->productPrice != $product->price) {
            $product->price = $request->productPrice;
        }
 
        // lets store the old description of the product, or the new description if it was changed
 
        if ($request->productDescription != $product->description) {
            $product->description = $request->productDescription;
        }
 
        // lets store the old stock of the product, or the new stock if it was changed
 
        if ($request->productStock != $product->stock) {
            $product->stock = $request->productStock;
        }
 
        // lets store the old brand of the product, or the new brand if it was changed
 
        if ($request->brandSelection != $product->brand) {
            $product->brand = $request->brandSelection;
        }
 
        // lets store the old release year of the product, or the new release year if it was changed
 
        if ($request->yearSelection != $product->release) {
            $product->release = $request->yearSelection;
        }
 
        // lets store the old image of the product, or the new image if it was changed
 
        if ($request->file('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('/'), $imageName);
            $product->image = $imageName;
        }
 
        // lets save the product
 
        $product->save();
 
        // lets get the categfigr that the product is in
 
        $category = Category::find($request->categorySelection);
 
        // lets attach the category to the product
        $product->categories()->attach($category);
 
        // lets redirect back with a success message
        return redirect()->back()->with('successfulEdit', $product->name . ' updated successfully!');
 
    }
}