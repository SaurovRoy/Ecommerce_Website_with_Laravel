<!DOCTYPE html>
<html lang="en">
@include('admin.admincss')
<style>
    .center {

        text-align: center;
        width: 80%;
        border: 2px solid white;
        margin-top: 10px;
        color: white;

    }

    .th_color {

        width: 90%;
        background-color: skyblue;
    }

    .th_pad {
        padding: 2px;
    }

    .button_dis {
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
                    <div class="container col-12 mt-4">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" data-dismiss="alert" class="close" aria-hidden="true">x</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="" style="background-color:black;">
                            <h1 style="text-align: center; color:white; font-size:30px">Product Table Information</h1>
                        </div>
                        <div style="padding:10px;" class="mt-3">
                            <form action="{{ url('/search_order_data') }}" method="get">
                                @csrf
                                <input type="text"  name="search" placeholder="Search Here" >
                                <input type="submit" value="Search" class="btn btn-success">
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class=" center ">
                                <tr class="th_color">
                                    <th class="th_pad">Id</th>
                                    <th class="th_pad">name</th>
                                    <th class="th_pad">Email</th>
                                    <th class="th_pad">Address</th>
                                    <th class="th_pad">User Id</th>
                                    <th class="th_pad">Product title</th>
                                    <th class="th_pad">Quantity</th>
                                    <th class="th_pad">Price</th>
                                    <th class="th_pad">Product Id</th>
                                    <th class="th_pad">Payment Status</th>
                                    <th class="th_pad">Delevary Status</th>
                                    <th class="th_pad">product Image</th>
                                    <th class="th_pad" style="width: 60px; padding-right:10px;">Action</th>
                                    <th>print Details</th>
                                    <th class="th_pad">Send Email</th>
                                </tr>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td style="margin-left: 10px">{{ $data->adress }}</td>
                                        <td>{{ $data->user_id }}</td>
                                        <td>{{ $data->product_title }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>${{ $data->price }}</td>
                                        <td>{{ $data->product_id }}</td>
                                        <td>{{ $data->payment_status }}</td>
                                        <td>{{ $data->delivary_staus }}</td>

                                        <td>
                                            <img src="productimage/{{ $data->image }}" alt=""
                                                style="width: 100px;height:100px;margin:auto; margin-top:5px">
                                        </td>

                                        <td>

                                            @if ($data->delivary_staus == 'delivered')
                                                <a href="{{ url('/processing', $data->id) }}" type="button"
                                                    class="btn btn-danger" style="margin-top:5px; "
                                                    onclick="confirm('Are you sure its processing yet?')">Processing</a>
                                            @else
                                                <a href="{{ url('/delivered', $data->id) }}" type="button"
                                                    class="btn btn-danger"
                                                    style="padding-left: 15px; padding-right:15px"
                                                    onclick="confirm('Are you sure its delivered?')">Delivered</a>
                                            @endif


                                        </td>
                                        <td>
                                            <a href="{{ url('/print_pdf', $data->id) }}" type="button"
                                                class="btn btn-primary">
                                                Print</a>
                                        </td>
                                        <td>
                                            <a href="{{ url('send_email', $data->id) }}" class="btn btn-secondary"
                                                type="button" style="font-size: 10px;">
                                                Send Email</a>
                                        </td>
                                @endforeach
                            </table>
                        </div>
                    </div>


                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.adminjs')
</body>

</html>
