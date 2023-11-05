

    function login() {
      $('.popup-wrapper').addClass('d-flex')
      $('.wrapper').addClass('active-popup')
      $('.wrapper').removeClass('active')
      $('.wrapper').removeClass('active-fg')
    }

    $('.icon-close').on('click', function() {
      $('.wrapper').removeClass('active-popup')
      $('.popup-wrapper').removeClass('d-flex')
    })

    function register() {
      $('.wrapper').addClass('active')
    }

    function forgotPassword() {
      $('.wrapper').addClass('active-fg')
    }

    var currentPage = 1;

    function loadMore() {
      console.log('load more');
      currentPage++;

      let apiUrl = '/api/products?page=' + currentPage;

      $.ajax({
        url: apiUrl,
        type: 'GET',
        success: function(data) {
          // Xử lý dữ liệu trả về và hiển thị sản phẩm mới
          // Ví dụ: Thêm sản phẩm mới vào #products-container
          $.each(data.data, function(index, product) {
            // Sử dụng backticks (`) để tạo chuỗi và thay thế dữ liệu sản phẩm
            var productHtml = `<div class="box">
                <div class="image">
                     <img src="/img/${product.image}" alt="${product.name}" />
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" id="login-popup" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>${product.name}</h3>
                    <div class="price">${product.price} VND</div>
                </div>
            </div>`;

            $('.box-container').append(productHtml);
          });

          // Kiểm tra nếu là trang cuối cùng, ẩn nút Load More
          if (currentPage >= data.last_page) {
            $('#loadMore').hide();
          }
        },
        error: function() {
          // Xử lý lỗi
          console.log('Error loading more products');
        }
      });
    }
  


// const wrapper = document.querySelector(".wrapper");
// const loginlink = document.querySelector(".login-link");
// const registerlink = document.querySelector(".register-link");
// const btpopup = document.querySelector("#login-popup");
// const iconclose = document.querySelector(".icon-close");
// const forgotlink = document.querySelector(".forgot-link");
// const fg = document.querySelector(".login-linkfg");

// console.log(123);

// let btnLogin = $('#login-popup')



// registerlink.addEventListener("click", () => {
//   wrapper.classList.add("active");
// });

// forgotlink.addEventListener("click", () => {
//   wrapper.classList.add("active-fg");
// });

// loginlink.addEventListener("click", () => {
//   wrapper.classList.remove("active");
// });

// fg.addEventListener("click", () => {
//   wrapper.classList.remove("active-fg");
// });

// btpopup.addEventListener("click", () => {
//   wrapper.classList.add("active-popup");
// });

// iconclose.addEventListener("click", () => {
//   wrapper.classList.remove("active-popup");
// });


// 

// registerlink.addEventListener("click", () => {
//   wrapper.classList.add("active");
// });

// loginlink.addEventListener("click", () => {
//   wrapper.classList.remove("active");
// });

// btpopup.addEventListener("click", () => {
//   loginBackdrop.classList.add("active-popup");
// });

// iconclose.addEventListener("click", () => {
//   loginBackdrop.classList.remove("active-popup");
// });

// forgotlink.addEventListener("click", () => {
//   wrapper.classList.add("active-fg");
// });

// fg.addEventListener("click", () => {
//   wrapper.classList.remove("active-fg");
// });

// Sự kiện cho .btn

// btnShopNow.addEventListener("click", () => {
//   loginBackdrop.classList.add("active-popup");
// });


// $(document).ready(function () {
//   console.log('load see more');
//   // Bắt sự kiện click nút "See More"
//   $("#loadMore").on("click", function () {
//       // Lấy trang hiện tại từ data attribute
//       var currentPage = $(this).attr("data-page");
//       console.log(currentPage);

//       // Tạo URL để gọi Ajax (thay thế 'YOUR_API_ENDPOINT' bằng đường dẫn API thực của bạn)
//       var apiUrl = '/get-more-products?page=' + currentPage;


//       // Gọi Ajax
//       $.ajax({
//           type: 'GET',
//           url: apiUrl,
//           success: function (data) {
//               // Xử lý dữ liệu trả về
//               // Thêm dữ liệu vào box-container
//               $(".box-container").append(data);

//               // Tăng trang hiện tại lên 1
//               $("#loadMore").data("page", currentPage + 1);
//           },
//           error: function (error) {
//               console.error('Error:', error);
//           }
//       });
//   });
// });
