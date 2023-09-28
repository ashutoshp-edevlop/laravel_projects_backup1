
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div class="container-fluid bg-dark">
        <div class="container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="navId">
                <li class="nav-item">
                <a href="/customer" class="nav-link active"><b>
                  @if (session()->has('user_name'))
                  {{session()->get('user_name')}}
                  @else
                  LaravelDB
                  @endif
                </b></a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link ">Home</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#tab2Id">Action</a>
                        <a class="dropdown-item" href="#tab3Id">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#tab4Id">Action</a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a href="{{url('/customer/create')}}" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/customer/view')}}" class="nav-link">Customer</a>
                </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
                <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
                <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
                <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
                <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
            </div>
            
            <script>
                $('#navId a').click(e => {
                    e.preventDefault();
                    $(this).tab('show');
                });
            </script>
        </div>
      </div>

      
       <div class="container">
       
       <a href="{{route('customer.create')}}" class="bg-primary text-white" style="border: 1px solid black; padding: 5px; box-sizing: border-box; float: left; height: 50px; width: 70px; font-size: 30px; margin:10px; border-radius:5px;">Add</a>
      <a href="{{url('customer/trash')}}" class="bg-danger text-white" style="border: 1px solid black; padding: 5px; box-sizing: border-box; float: right; height: 50px; width: 170px; font-size: 30px; margin:10px; border-radius:5px;">Go To Trash</a>
      <form action="">
          <div class="form-group">
            <input type="search" name="search" id="" class="form-control" placeholder="Search by name or email" value="{{$search}}">
            <button class="btn btn-primary">Search</button>
            <a href="{{url('/customer/view')}}">
              <button class="btn btn-primary" type="button">Reset</button>
            </a>
          </div>
          
    {{$customers->links()}}
        </form>

  <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Address</th>
            <th>State</th>
            <th>Country</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>@if($customer->gender == "")
              Not Mentioned
              @elseif($customer->gender == "M")
            Male
          @elseif($customer->gender == "F")
        Female
      @elseif($customer->gender == "O")
    Other
  @endif</td>
            <td>@if($customer->dob == "")
              Not Mentioned
              @else
              {{($customer->dob)}}
              @endif
            </td>
            <td>{{$customer->address}}</td>
            <td>{{$customer->state}}</td>
            <td>{{$customer->country}}</td>
            <td>
              @if($customer->status == "1")
                <a href="">
                <span class="badge badge-success">Active</span>
                </a>
              
              @else
              <a href="">
              <span class="badge badge-danger">Inactive</span>
              </a>
              @endif
            </td>
            <td>
              <!-- <a href="{{url('/customer/delete/')}}/{{$customer->customer_id}}"> -->
                <a href="{{route('customer.delete', ['id' => $customer->customer_id])}}">
              <button class="btn btn-danger">Trash</button>
              </a>
              <a href="{{route('customer.edit', ['id' => $customer->customer_id])}}">
              <button class="btn btn-primary">Edit</button>
              </a>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
  
  </div>
  </body>
</html>