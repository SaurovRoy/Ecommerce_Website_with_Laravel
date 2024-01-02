
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
               
                         <div class="" style="background-color:black;">
                            <h1 style="text-align: center; color:white; font-size:30px">User Table Information</h1>
                        </div>
                        
                            <table class=" center " >
                                <tr class="th_color">
                                    <th  class="th_pad">Id</th>
                                    <th class="th_pad">Name</th>
                                    <th class="th_pad">Email</th>
                                    <th class="th_pad">Address</th>
                                    <th class="th_pad">Email Verified Date</th>
                                    
                                    <th class="th_pad" style="width: 60px; padding-right:10px;">Action</th>
                                </tr>
                                @foreach ($user as $user )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->adress}}</td>
                                    <td>{{$user->email_verified_at}}</td>
                                   
                                    <td>
                                        <a href="{{url('/deleteProduct',$user->id)}}" type="button" class="btn btn-danger" onclick="confirm('Are you sure to delete it?')">Delete</a>
                                      
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