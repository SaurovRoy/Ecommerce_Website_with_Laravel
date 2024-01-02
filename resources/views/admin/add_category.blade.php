
<!DOCTYPE html>
<html lang="en">
  
    @include('admin.admincss')
    <style>
      .add{
        text-align: center;
        padding: 10px;
      }
      .div_center{
        text-align: center;
        padding: 20px;
        
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
            <div id="appear">

               @if(session()->has('message'))
            <div class="alert alert-success" >
               <button type="button" class="close"  data-dismiss="alert" aria-hidden="true" >
                x </button>
              {{session()->get('message')}}
             
            </div>
            @endif

            </div>
           
            <div class="add" style="font-size: 40px">
              <h2>Add Category</h2>
            </div>
            <div class='div_center'>
              <form action="{{url('/add_category')}}" method="post">
              @csrf

                <input type="text" placeholder="Add Your Category" name="category" style="color: black">
               <input type="submit" name="" id="" value="Add" class="btn btn-success">

              </form>
              
            </div>
           <div class="container " style="width:70%">
          {{-- @if (session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" aria-hidden="true" data-dismiss="alert">x</button>
            {{session()->get("message")}}
          </div>
            
          @endif --}}
              <div class="container ">
                <div class="card">
                    <div class="card-header">
                        <h1 style="text-align: center">Category Information</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped bg-seccondary">
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($data as $data )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->category}}</td>
                                <td>
                                  <a href="{{url('/DeleteCategoryName',$data->id)}}" onclick="return confirm('Are you sure to delete it?')" class="btn btn-danger" type="button"></a>
                                </td>
                                
                              
                            </tr>
                            @endforeach
                        </table>
                    </div>
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

