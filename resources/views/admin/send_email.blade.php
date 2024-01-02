<!DOCTYPE html>
<html lang="en">
    <base href="/public">
<style>
    label{
        display: inline-block;
        width: 120px;
    }
   style="color:black;"
</style>
@include('admin.admincss')

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
                    <div class="container" style="color: white;">
                        <h1 style=" text-align:center; font-size:35px" class="mt-3">Send Email To : {{$order->email}}</h1>
                        <form action="{{url('send_user_email',$order->id)}}" method="POST" >
                        @csrf
                        <div style="padding-left:32%; padding-top:15px;">
                            <label for="">Email Greetinng </label>
                            :   <input type="text" name="greeting"  style="color:black;">
                        </div>
                        <div style="padding-left:32%; padding-top:15px;">
                            <label for="">Email Firstline </label>
                            :   <input type="text" name="firstline" style="color:black;">
                        </div>
                        <div style="padding-left:32%; padding-top:15px;">
                            <label for="">Email Body </label>
                            :   <input type="text" name="body" style="color:black;">
                        </div>
                        <div style="padding-left:32%; padding-top:15px;">
                            <label for="">Email Button </label>
                            :   <input type="text" name="button" style="color:black;">
                        </div>
                        <div style="padding-left:32%; padding-top:15px;">
                            <label for="">Email Url </label>
                            :   <input type="text" name="url" style="color:black;">
                        </div>
                        <div style="padding-left:32%; padding-top:15px;">
                            <label for="">Email Lastline </label>
                            :   <input type="text" name="lastline" style="color:black;">
                        </div>
                        <div style="padding-left:32%; padding-top:15px; font-size:35px ">
                            
                            <input type="submit" value="Send Email" class="btn btn-primary" >
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
