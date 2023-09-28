<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </head>
     
  <body class="bg-dark">
  <div class="container-fluid bg-dark">
        <div class="container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="navId">
                <li class="nav-item">
                <a href="/customer" class="nav-link active"><b>LaravelDB</b></a>
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
    <form action="{{url('/')}}/customer" method="post">
        @csrf
        <div class="contianer card p-3 bg-white">
            <h3 class="tect-center text-primary">
                
                CUSTOMER REGISTRATION
            </h3>
            <div class="row">
                <div class="form-group col-md-6 required">
                  <label for="">Name:-</label>
                  <input type="text" name="name" id="" class="form-control"  placeholder="Enter your name..." aria-describedby="helpId">
                  <span class="text-denger">
                    @error('name')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                <div class="form-group col-md-6 required">
                  <label for="">Email:-</label>
                  <input type="text" name="email" id="" class="form-control"  placeholder="Enter your email..." aria-describedby="helpId">
                  <span class="text-denger">
                    @error('email')
                    {{$message}}
                    @enderror
                  </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 required">
                  <label for="">Password:-</label>
                  <input type="text" name="password" id="" class="form-control"  placeholder="Enter the password..." aria-describedby="helpId">
                  <span class="text-denger">
                    @error('password')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                <div class="form-group col-md-6 required">
                  <label for="">Confirm Password:-</label>
                  <input type="text" name="confirm_password" id="" class="form-control"  placeholder="Confirm your password..." aria-describedby="helpId">
                  <span class="text-denger">
                    @error('confirm_password')
                    {{$message}}
                    @enderror
                  </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 required">
                  <label for="">Country:-</label>
                  <input type="text" name="country" id="" class="form-control"  placeholder="Enter your country name..." aria-describedby="helpId">
                  <span class="text-denger">
                    @error('country')
                    {{$message}}
                    @enderror
                  </span>
                </div>
                <div class="form-group col-md-6 required">
                  <label for="">State:-</label>
                  <input type="text" name="state" id="" class="form-control"   placeholder="Enter your state name..." aria-describedby="helpId">
                  <span class="text-denger">
                    @error('state')
                    {{$message}}
                    @enderror
                  </span>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12 required">
                  <label for="">Address:-</label>
                  <input type="text" name="address" id="" class="form-control"  placeholder="Enter your address..." aria-describedby="helpId">
                  <span class="text-denger">
                    @error('address')
                    {{$message}}
                    @enderror
                  </span>
                </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="">Gender:-</label>
                <br>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" id="male" value="M"/>
                  <label for="male" class="form-check-inline">
                    M
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" id="female" value="F"/>
                  <label for="female" class="form-check-inline">
                    F
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="radio" class="form-check-input" name="gender" id="other" value="O"/>
                  <label for="other" class="form-check-inline">
                    O
                  </label>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="">Date of birth:-</label>
                <input type="date" name="dob" class="form-control"/>
                <span class="text-danger">
                  @error('dob')
                  {{$message}}
                  @enderror
                </span>
              </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 required">
                    <input type="submit" value="submit" />
                </div>
            </div>
        </div>
    </form>
  
</body>
     
</html>
