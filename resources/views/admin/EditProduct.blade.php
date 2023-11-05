<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<body class="sb-nav-fixed" style="padding-top: 50px">
    <!-- Thanh Navbar-->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('indexAdmin') }}">Papyrus</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

<div id="layoutSidenav">
<!-- thanh sidebar-->
<div id="layoutSidenav_nav">
                
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('indexAdmin') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="{{ route('usersHome') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Registered Users
                            </a>

                            <a class="nav-link" href="{{ route('ProductsManagement') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Product Management
                            </a>
            
                            
            
            
                            
                </nav>
            </div> 
<!-- phần body-->
    
<div class="container-fluid px-4">
    
    <div class="row mt-4">
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product 
                        <a href="{{ route('ProductsManagement') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('products.update', $product->id) }}" method="post">
                    @csrf
                    @method('put') 
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Name</label>
                                <input value="{{$product->name}}" required type="text" name ="name" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Image</label>
                                <input value="{{$product->image}}" required type="file" name ="image" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Price</label>
                                <input value="{{$product->price}}" required type="number" name ="price" class="form-control">
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="">Quantity</label>
                                <input value="{{$product->quantity}}" required type="number" name ="quantity" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Category</label>
                                <select value="{{$product->category_id}}" required name="category_id" class="form-control">
                                    <option >--Select Role--</option>
                                    <option  value="1">Birthday</option>
                                    <option  value="2">thanksgiving</option>
                                    <option  value="3">halloween</option>
                                    <option  value="4">Anniversary<option>
                                    <option  value="5">New Year</option>
                                    <option  value="6">Mother’s Day </option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button name="add-product" type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>  
</div>
<!-- Thanh footer-->
   <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- các thành phần javascripts-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>
</html> 
</body>
</html>