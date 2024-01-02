
<!DOCTYPE html>
<html lang="en">
    @include('admin.admincss')

    <style>
        .center{
            margin: auto;
            text-align: center;
            width: 90%;
           border: 2px solid white;
           margin-top: 10px;
           
        }   
        .th_color{
            width: 90%;
            background-color: skyblue;
        }
        .th_pad{
            padding: 12px;
        }
        .button_dis{
            padding-right: 19px;
            padding-left: 17px;
            margin-top: 10px;
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
                <div class="container mt-4">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" data-dismiss="alert" class="close" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                        <div class="" style="background-color:black;">
                            <h1 style="text-align: center; color:white; font-size:30px">Product Table Information</h1>
                        </div>
                        
                            <table class=" center " >
                                <tr class="th_color">
                                    <th  class="th_pad">Id</th>
                                    <th class="th_pad">Title</th>
                                    <th class="th_pad">Description</th>
                                    <th class="th_pad">Category</th>
                                    <th class="th_pad">Quantity</th>
                                    <th class="th_pad">Price</th>
                                    <th class="th_pad">Discount Price</th>
                                    <th class="th_pad">product Image</th>
                                    <th class="th_pad" style="width: 60px; padding-right:10px;">Action</th>
                                </tr>
                                @foreach ($data as $data )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->category}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->discount_price}}</td>
                                    <td>
                                        <img src="productimage/{{$data->image}}" alt="" style="width: 100px;height:100px;margin:auto; margin-top:5px">
                                    </td>
                                    <td>
                                        <a href="{{url('/deleteProduct',$data->id)}}" type="button" class="btn btn-danger" onclick="confirm('Are you sure to delete it?')">Delete</a>
                                        <a href="{{url('/editViewProduct',$data->id)}}" type="button" class="btn btn-success button_dis" >Edit</a>
                                    </td>
                                    
                                @endforeach
                            </table>
                        </div>
                   
      
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
        @include('admin.adminjs')
  </body>
</html>