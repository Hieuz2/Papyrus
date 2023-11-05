<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/homeProduct.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <input type="checkbox" name="" id="toggler" />
    <label for="toggler" class="fas fa-bars"></label>

    <a href="{{ route('login') }}" class="logo"><img src="{{asset('img/qqq.png') }}" width="150px" height="80px" style="object-fit: cover;"><span></span></a>


    <nav class="navbar">
    <a class="font" href="{{ route('login') }}">HOME</a>
      <a class="font" href="./about.php">ABOUT</a>
      <a class="font" href="{{ route('home') }}">PRODUCTS</a>

    </nav>

    <div class="icons">
            <a href="{{ route('show.cart')}}" class="fas fa-shopping-cart"></a>
            @if (Auth::check())
                @if (Auth::user()->rollID === 'admin')
                    <a href="{{ route('admin') }}" class="font">System Management</a>
                @endif
                <a href="{{ route('logout') }}" class="font">Logout</a>
                <p class="font">Hello, {{ Auth::user()->username }}</p>
            @else
                <a href="#" id="login-popup" class="fas fa-user" onclick="login()"></a>
            @endif
        </div>
  </header>

  <div class="container">
  <div class="sidenav">
        <div class="product_type">
            <div class="Birthday ">
                <a class="font" href="#">Birthday</a>
            </div>
            <div class="thanksgiving">
                <a class="font" href="#">thanksgiving</a>
            </div>
            <div class="halloween">
                <a class="font" href="#">halloween</a>
            </div>
            <div class="Anniversary">
                <a class="font" href="#">Anniversary</a>
            </div>
            <div class="Friendship">
                <a class="font" href="#">Friendship</a>
            </div>
            <div class="New Year">
                <a class="font" href="#">New Year</a>
            </div>
            <div class="Mother’s Day ">
                <a class="font" href="#">Mother’s Day </a>
            </div>
        </div>
      </div>
      </div>

      <div class="main">

        <div class="topnav">
            <div class="filter">
                <a class="font" href="">cards</a>
            </div>
            <div class="filter">
                <a class="font" href="">gifts</a>
            </div>
            <div class="search-container">
                <form action="#">
                    <input class="font" type="text"placeholder="Search.." name="search">
                    <button class="font" type="submit">Submit</button>
                  </form>
            </div>
        </div>

        <div class="box-container">
        @foreach($products as $product)
        <form class="box" method="POST" action="{{ route('add.cart')}}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="category_id" value="{{ $product->category_id }}">
        
          {{-- <div class="box"> --}}
            <div class="image">
              <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" />
              <div class="icons">
                <button type="submit" id="add-to-cart" class="cart-btn font">add to cart</button>
              </div>
            </div>
            <div class="content">
              <h3 class="font">{{ $product->name }}</h3>
              <div class="price font">{{ $product->price }} VND</div>
            </div>
          {{-- </div> --}}
          </form>
          @endforeach
        </div>
        <div class="pagination-container" >
            {{ $products->links() }}
          </div>
      </div>
      

    <div class="popup-wrapper">
      <div class="wrapper">
        <span class="icon-close">
          <ion-icon name="close"></ion-icon>
        </span>
        <div class="form login">
          <h2 class="font">LOGIN</h2>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="inputbox">
              <span class="icon"><ion-icon name="mail"></ion-icon></span>
              <input type="email" name="email" >
              <label>Email</label>
            </div>
            <div class="inputbox">
              <span class="icon"><ion-icon name="password"></ion-icon></span>
              <input type="password" name="password" >
              <label>Password</label>
            </div>
            <div class="remember-forgot">
              <label><input type="checkbox" class="font">Remember me</label>
              <div class="login-register">
                <a href="#" class="forgot-link font" onclick="forgotPassword()">FORGOT PASSWORD?</a>
              </div>
            </div>
            <button type="submit" name="login" class="bt font">LOGIN</button>
            <div class="login-register">
              <p>Don't have an account?
                <a href="#" class="register-link font" onclick="register()">REGISTER</a>
              </p>
            </div>
          </form>
        </div>
        <div class="form forgot">
          <h2 class="font">FORGOT PASSWORD</h2>
          <form action="#" method="post">
            @csrf
            <div class="inputbox">
              <span class="icon"><ion-icon name="person"></ion-icon></span>
              <input type="text" name="name" >
              <label>Username</label>
            </div>
            <div class="inputbox">
              <span class="icon"><ion-icon name="mail"></ion-icon></span>
              <input type="email" name="email" >
              <label>Email</label>
            </div>
            <button type="submit" name="signup" class="bt font">SUMIT</button>
            <div class="login-register">
              <p class="font">Already have an account?
                <a href="#" class="login-link font" onclick="login()">LOGIN</a>
              </p>
            </div>
        </div>

        <div class="form register">
          <h2 class="font">REGISTRATION</h2>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="inputbox">
              <span class="icon"><ion-icon name="username"></ion-icon></span>
              <input type="text" required>
              <label>Username</label>
            </div>
            <div class="inputbox">
              <span class="icon"><ion-icon name="mail"></ion-icon></span>
              <input type="email" name="email" required>
              <label>Email</label>
            </div>
            <div class="inputbox">
              <span class="icon"><ion-icon name="password"></ion-icon></span>
              <input type="password" name="password" required>
              <label>Password</label>
            </div>
            <div class="remember-forgot">
              <label><input type="checkbox" class="font">I agree to the term & conditions</label>

            </div>
            <button type="submit" class="bt font">REGISTER</button>
            <div class="login-register ">
              <p class="font">Already have an account?
                <a href="#" class="login-link font" onclick="login()">LOGIN</a>
              </p>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <footer class="footer">
    <div class="container-footer">
      <div class="row">
        <div class="footer-col">
          <h4 class="font">Company</h4>
          <ul>
            <li><a href="#"></a>about us</li>
            <li><a href="#"></a>our services</li>
            <li><a href="#"></a>privacy policy</li>
            <li><a href="#"></a>affiliate program</li>
          </ul>
        </div>
        <div class="footer-col">
          <h4 class="font">Get help</h4>
          <ul>
            <li><a href="#"></a>FAQ</li>
            <li><a href="#"></a>shipping</li>
            <li><a href="#"></a>returns</li>
            <li><a href="#"></a>order status</li>
            <li><a href="#"></a>payment options</li>
          </ul>
        </div>
        <div class="footer-col">
          <h4 class="font">Online shop</h4>
          <ul>
            <li><a href="#"></a>watch</li>
            <li><a href="#"></a>bag</li>
            <li><a href="#"></a>all card</li>
          </ul>
        </div>
        <div class="footer-col">
          <h4 class="font">Follow us</h4>
          <div class="contact">
            <a class="icons-lh" href="#"><i class="fab fa-facebook-f">(facebook)</i></a>
            <a class="icons-lh" href="#"><i class="fab fa-twitter">(twitter)</i></a>
            <a class="icons-lh" href="#"><i class="fab fa-instagram">(instagram)</i></a>
            <a class="icons-lh" href="#"><i class="fab fa-linkedin-in">(linkedin)</i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/home.js') }}"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>

</html>