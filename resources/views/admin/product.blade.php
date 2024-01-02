
<!DOCTYPE html>
<html lang="en">
    @include('admin.admincss')
    
    <style>
      .align{
        text-align: center;
        padding-top: 40px;
      }
      label{
        display: inline-block;
        width: 200px;
      }
      .font-size{
        font-size: 40px;
        color: white;
        margin-bottom: 10px;
      }
    </style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html  header -->
        
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              <div>
                  @if (session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" aria-hidden="true" data-dismiss="alert">x</button>
                  {{session()->get('message');}}
                </div>
                   @endif
              </div>
            
              <div class="Container-scroller align">
                
                <form action="{{url('/uploadProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="font-size"><h1>Add Your Product</h1></div>
                    <div class="mt-2">
                        <label >Title :</label>
                        <input type="text" style="color:black" name="title" value=""required placeholder="write a title">
                    </div>
                    <div class="mt-2">
                        <label >Description :</label>
                        <input type="text" style="color:black" name="description" value=""required placeholder="write a description">
                    </div>
                   
                    <div class="mt-2">
                      <label for="">Product Category :</label>
                        <select name="category" id="">
                          <option value="">Add Your Category</option>
                         @foreach ($category as $category)
                           <option value="{{$category->category}}">{{$category->category}}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label >Quantity :</label>
                        <input type="number" style="color:black" name="quantity" value="" required placeholder="product quantity">
                    </div>
                    <div class="mt-2">
                      <label >Price :</label>
                      <input type="number" style="color:black" name="price" value="" required placeholder="product price">
                  </div>
                  <div class="mt-2">
                    <label >Discount Price :</label>
                    <input type="number" style="color:black" name="discount_price" value=""  placeholder="Discount price">
                </div>
                 <div class="mt-2">
                          <label >Product Image :</label>
                          <input type="file"  name="image" required>
                        </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary ">Add Product</button>
                </div>
                    
                </form>
                
                </div>
        
        
            

            </div>
        </div>
      
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
        @include('admin.adminjs')
  </body>
</html>