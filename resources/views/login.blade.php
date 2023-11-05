<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
            {{-- <a href="#" class="fas fa-shopping-cart"></a> --}}
            {{-- <a href="" id="login-popup" class=" fa-shopping-cart" onclick="login()"></a> --}}
            @if (Auth::check())
                @if (Auth::user()->rollID === 'admin')
                    <a href="{{ route('admin') }}" class="font">System Management</a>
                @endif
                <a href="{{ route('logout') }}" class="font">Logout</a>
                <p>Hello, {{ Auth::user()->username }}</p>
            @else
                <a href="#" id="login-popup" class="fas fa-user" onclick="login()"></a>
            @endif
        </div>
  </header>

  <div class="container" style="position: relative">
    <section class="home" id="home">
      <video autoplay loop muted>
        <source src="{{ asset('video/thiep.mp4') }}" type="video/mp4">

      </video>

    </section>
    <section class="icons-container">
      <div class="icons">
        <img src="{{asset('icons/credit-cards_icon.png') }}" style="height: 40px; width: 40px" alt="" />
        <div class="info">
          <h3 class="font">free delivery</h3>
          <span>on all orders</span>
        </div>
      </div>
      <div class="icons">
        <img src="{{asset('icons/gift-card_icon.png') }}" style="height: 40px; width: 40px" alt="" />
        <div class="info">
          <h3 class="font">10 days returns</h3>
          <span>moneyback guarantee</span>
        </div>
      </div>
      <div class="icons">
        <img src="{{asset('icons/money_icon.png') }}" style="height: 40px; width: 40px" alt="" />
        <div class="info">
          <h3 class="font">offfer & gifts</h3>
          <span>on all orders</span>
        </div>
      </div>
      <div class="icons">
        <img src="{{asset('icons/package_icon.png') }}" style="height: 40px; width: 40px" alt="" />
        <div class="info">
          <h3 class="font">secure paymens</h3>
          <span>protected by paypal</span>
        </div>
      </div>
    </section>
    <section class="products" id="products">
      <h1 class="heading font">latest <span class="font">products</span></h1>
      <div class="seemore">
        <div class="box-container">
        @foreach($products as $product)
        <form class="box" >
        @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="category_id" value="{{ $product->category_id }}">
          
            <div class="image">
              <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" />
              <div class="icons">
                <a  id="login-popup" class="cart-btn font" onclick="login()">add to cart</a>
                {{-- <a href="#" id="login-popup" class="fas fa-user" onclick="login()"></a> --}}
              </div>
              <div class="icons">
              </div>
            </div>
          
            <div class="content">
              <h3 class="font">{{ $product->name }}</h3>
              <div class="price font">{{ $product->price }} VND</div>
            </div>
          </form>
        @endforeach
        </div>
        
        <button id="loadMore" data-page="1" onclick="loadMore()" class="font">See More >></button>
      </div>

    </section>

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
          </form>
        </div>

        <div class="form register">
          <h2 class="font">REGISTRATION</h2>
          <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="inputbox">
              <span class="icon"><ion-icon name="username"></ion-icon></span>
              <input type="text"  name="username">
              <label>Username</label>
            </div>
            <div class="inputbox">
              <span class="icon"><ion-icon name="email"></ion-icon></span>
              <input type="email" name="email" >
              <label>Email</label>
            </div>
            <div class="inputbox">
              <span class="icon"><ion-icon name="password"></ion-icon></span>
              <input type="password" name="password" >
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

  <script src="{{ asset('js/login.js') }}"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  
</body>

</html>