<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/62394f2852.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <title>مهرجان التسوق | ريد سي مول</title>
  </head>

  <body>
    <header>
      <div class="container-fluid shadow-sm p-4 mb-3">
        <div class="row mb-2">
          <div class="col text-center">
            <img class ="img-fluid" src="{{asset('images/logo.png')}}">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h2 class="text-center fw-bold">مهرجان التسوق ٢٠٢٢</h2>
          </div>
        </div>
      </div>
    </header>
    @yield('content')

    <!-- Footer -->

    <section id="footer">


    <footer class="pt-1 text-right text-white bg-dark ar-font">


      <!-- Footer Links -->
      <div class="container-fluid mt-3 text-center">

        <!-- Grid row -->
        <div class="row mt-3">



          <!-- Grid column -->
          <div class="col-md-4 col-sm-12 mx-auto mb-4 footer-seprator">

            <!-- Links -->
            <h4 class="text-uppercase fw-bold">تواصل معنا</h4>
            <!-- <hr class="mb-4 mt-0 d-inline-block mx-auto underline"> -->
            <p>
              <i class="fas fa-home m-3"></i> اليمن / عدن - جولة كالتكس المنصورة - رد سي مول - الطابق السابع</p>            <p>
              <i class="fas fa-envelope m-3"></i> info@happylandaden.com</p>
            <p>
              <i class="fas fa-phone m-3"></i> 774466655 ( +967 )    </p>
            <p>
              <i class="fas fa-print m-3"></i> 739991115 ( +967 )    </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-sm-12 mx-auto my-auto mb-4">

          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1944.9351464895221!2d44.98740565654276!3d12.851653093909807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x161e03d0da39af89%3A0x5a3e51b25790f5c3!2sRed%20sea%20Mall!5e0!3m2!1sen!2s!4v1638726739128!5m2!1sen!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <!-- Grid row -->

        <div class="row mt-3 d-flex justify-content-center">
          <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          </div>
        </div>
        <!-- Grid row -->

      </div>
      <!-- Footer Links -->

      <!-- Copyright -->
      <div style="background-color: black;">
          <div class="text-center pb-1">تطوير وتصميم أحمد بارحيم</div>
          <div class="text-center pb-1">جميع الحقوق محفوظة لهابي لاند عدن  ©٢٠٢٢</div>
        </div>
      <!-- Copyright -->

    </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>
