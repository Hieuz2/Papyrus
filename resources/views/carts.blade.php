<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/homeProduct.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
</head>

<body style="padding-top: 100px">
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
  <!-- phần body -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="table-responsive mt-2">
        @if(Session::has('thongbao'))
                 <div class="alert alert-success">
                {{ Session::get('thongbao') }}
                 </div>
                @endif
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">
                    Products in your cart
                  </h4>
                </td>
              </tr>
              <tr>
                <th>Stt</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total price</th>
                <th>
                  <div class="fa fa-trash" >
                  delete cart
                  </div>
                </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($cartItems as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td><img src="{{  asset('img/'.$item->product->image) }}" width="50px"></td>
                  <input type="hidden" class="pid" value="{{ $item->product_id }}">
                  <td>
                  {{ $item->product->name }}
                  </td>
                  <td>
                  {{ $item->product->price }}
                  </td>
                  <input type="hidden" class="pprice" value="{{ $item->product->price }}">
                  <td><input type="number" class="form-control itemQty" name="quantity" value="{{ $item->quantity }}" style="width:75px;">
                  </td>
                  <td>
                  {{ number_format($item->product->price) }}đ
                  </td>
                  <td>
                    <a href="" class="text-danger lead"
                      onclick="return confirm('Are you sure wnat to remove this item?')"><i class="fa fa-trash"
                        aria-hidden="true"></i></a>
                  </td>
                </tr>
      
            @endforeach
              <tr>
                <td colspan="2">
                  <a href="{{ route('home') }}" class="btn btn-success"><i class="fa fa-shopping-cart"
                      aria-hidden="true"></i>&nbsp;&nbsp;Continue Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b>
                {{ number_format($total_tong) }}đ
                  </b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?= ($total_tong > 1) ? "" : "disabled"; ?>"><i
                      class="fa fa-credit-card-alt" aria-hidden="true"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
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
  <script type="text/JavaScript">
  $(document).ready(function(){
    $('.itemQty').on('change', function(){
        var $el = $(this).closest('tr');
        
        var pid = $el.find(".pid").val();
        var pprice = $el.find(".pprice").val();
        var qty = $el.find(".itemQty").val();
        location.reload(true);
        $.ajax({
            url:'action.php',
            method:'post',
            cache: false,
            data: {qty:qty,pid:pid,pprice:pprice},
            success:function(response){
                console.log(response);
            }
        });
    });
    load_cart_item_number();

    function load_cart_item_number(){
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {cartItem:"cart_item"},
        success:function (response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
</script>

  <script src="{{ asset('js/home.js') }}"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>

</html>