<!DOCTYPE html>
<html lang="es">



<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spa veterinaria</title>
  <!-- plugins:css -->
  {!! Html::style('melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.base.css') !!}
  {!! Html::style('melody/vendors/css/vendor.bundle.addons.css') !!}
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  {!! Html::style('melody/css/style.css') !!}
  <!-- endinject -->
  <link rel="shortcut icon" href="melody/images/favicon.png" />
</head>
<style>
  .container {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
  }

  .bubble {
    position: absolute;
    width: 40px;
    height: 40px;
    background-color: #7FDBFF;
    border-radius: 50%;
    animation: bubbleEffect 3s linear;
  }

  @keyframes bubbleEffect {
    0% {
      bottom: -40px;
      opacity: 0;
    }

    50% {
      opacity: 1;
    }

    100% {
      bottom: 100%;
      opacity: 0;
    }
  }
</style>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <center>
                  <img src="{{asset('melody/images/logo.svg')}}" alt="logo">
                </center>
              </div>
              {{-- <h4>AF</h4>
              <h6 class="font-weight-light">Developer</h6> --}}


              @yield('content')


            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
          <div class="container">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2023 Todos los derechos reservados <a href="https://www.instagram.com/tribie17/">AF</a></p>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  {!! Html::script('melody/vendors/js/vendor.bundle.base.js') !!}
  {!! Html::script('melody/vendors/js/vendor.bundle.addons.js') !!}
  <!-- endinject -->
  <!-- inject:js -->
  {!! Html::script('melody/js/off-canvas.js') !!}
  {!! Html::script('melody/js/hoverable-collapse.js') !!}
  {!! Html::script('melody/js/misc.js') !!}
  {!! Html::script('melody/js/settings.js') !!}
  {!! Html::script('melody/js/todolist.js') !!}
  <!-- endinject -->
  <script>
    function createBubble() {
      const container = document.querySelector('.container');

      const bubble = document.createElement('div');
      bubble.classList.add('bubble');

      const randomX = Math.floor(Math.random() * window.innerWidth);
      bubble.style.left = `${randomX}px`;

      container.appendChild(bubble);

      setTimeout(() => {
        bubble.remove();
      }, 3000);
    }

    setInterval(createBubble, 1000);
  </script>
</body>

</html>