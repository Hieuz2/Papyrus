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