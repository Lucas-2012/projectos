<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <title>Feira online @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{asset('https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/painel/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets/painel/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/painel/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/painel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/painel/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/painel/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/painel/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/painel/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets/painel/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('assets/painel/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets/painel/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('plugin/css/flexslider.css')}}">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <!--div site-wrap-->
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="border-bottom top-bar py-2 bg-dark" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="mb-0">
              <span class="mr-3"><strong class="text-white">Apoio ao cliente:</strong> <a href="tel://#" style="color: #f3ae34;">+ 244 948 812 633</a></span>
              <span><strong class="text-white">E-mail:</strong> <a href="#" style="color: #f3ae34;">info@angoalimento.com</a></span>
            </p>
          </div>
          <div class="col-md-6">
            <ul class="social-media">
              <li><a href="#" class="p-2" style="color: #f3ae34;"><span class="icon-facebook" ></span></a></li>
              <li><a href="#" class="p-2" style="color: #f3ae34;"><span class="icon-whatsapp"></span></a></li>
              <li><a href="#" class="p-2" style="color: #f3ae34;"><span class="icon-instagram"></span></a></li>
              <li><a href="#" class="p-2" style="color: #f3ae34;"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-red js-sticky-header site-navbar-target" role="banner" style="background-color: #ffffff; height: 8px">

      <div class="container" >
        <div class="row align-items-center"> <!--B73934-->
          
          <div class="col-11 col-xl-2">
          
            <!--h1 class="mb-0 site-logo"-->
              <a href="{{route('dashboard.front')}}" class="text-black h2 mb-0">
                <img src="{{asset('assets/dist/img/logo4.png')}}" style="width: 130px; height: 50px;">
               <span class="text-primary"></span> 
              </a>
            <!--/h1-->
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block" >
            <nav class="site-navigation position-relative text-right" role="navigation" style="color: #FFFFFF;" >

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block" >
                <li><a href="{{route('dashboard.front')}}" class="nav-link">Home</a></li>
                <li><a href="{{route('dashboard.quemsomos')}}" class="nav-link">Quem somos</a></li> 
                <li><a href="{{route('dashboard.feiras')}}" class="nav-link">Feira</a></li>
                <li>
                  <a href="{{route('dashboard.mercados')}}" class="nav-link">Mercado</a>
                </li>
                
                <li><a href="{{route('dashboard.contacto')}}" class="nav-link" >Contacto</a></li>
                @if(Auth::check())
                  <li class="has-children">
                    <a href="#about-section" class="nav-link btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">
                  <span class="category" style="color:#ffffff;">{{Auth::user()->name}}</span></a>
                    <ul class="dropdown">
                      @if(Auth::user()->tipo === "feirante")
                      
                        <li><a href="{{route('perfil.userF', Auth::user()->id)}}">Perfil</a></li>
                      @elseif(Auth::user()->tipo === "Vendedor")
                        
                        <li><a href="{{route('perfil.userV', Auth::user()->id)}}">Perfil</a></li>
                      @elseif(Auth::user()->tipo === "Admin")
                        
                        <li><a href="{{route('perfil.admin', Auth::user()->id)}}" target="_blank">Perfil</a></li>
                      @endif
                      
                      <li>
                        <form method="POST" action="{{route('logout')}}" class="text-left" enctype="multipart/form-data">
                          @csrf
                          <a href="{{route('logout')}}" class="dropdown-item ai-icon" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <span class="ml-2">Sair </span>
                          </a>
                        </form>
                      </li>
                    </ul>
                  </li>
                @else
                  <li>
                    <a href="{{route('login')}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Login</a>
                    <!--a-- href="{{route('register')}}" class="btn btn-primary btn-md" style="background-color: #f3ae34; border: red;">Registrar-se</!--a-->
                  </li>
                @endif
              </ul>

            </nav>
          </div>

          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      </div>
      
    </header>

<!------------------------ CHAMADA DOS CONTEÚDOS ------------------------->

        @yield('conteudo')

<!--------------------------- FIM DA CHAMADA ----------------------------->

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">Quem somos</h2>
                <p>O site Feira Online Angola, faz parte de uma serie de sites, criados pelo Marketeiro Walter Matias e sua organização com mesmo nome Walter Matias Consultores.</p>

                <p>Fundada em 2015 em Luanda a Walter Matias consultores e a Cesangola Lda, desenvolvem soluções de outsourcing marketing para empresas<a href="{{route('dashboard.quemsomos')}}">...<strong>continuar lendo</strong></a></p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Recursos</h2>
                <ul class="list-unstyled">
                  <li><a href="#">Quem somos</a></li>
                  <li><a href="#">Feiras</a></li>
                  <li><a href="#">Mercados</a></li>
                  <li><a href="#">Contacto</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Siga-nos</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">se inscreva Newsletter</h2>
            <form action="#" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-white" type="button" id="button-addon2" style="background-color: #f3ae34; border: red;">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Desenvolvido pela <a href="https://www.conexaowebangola.com"><strong>Conexão Web </strong></a><!--i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a-->
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!--fim div site-wrap -->

  <script src="{{asset('assets/painel/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/painel/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('assets/painel/js/aos.js')}}"></script>
  <script src="{{asset('assets/painel/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('assets/painel/js/jquery.sticky.js')}}"></script>

  <script src="{{asset('assets/painel/js/typed.js')}}"></script>
  
  <script>
    var typed = new Typed('.typed-words', {
      strings: ["Aplicativos"," a Bom Preço"," e Expositores de Confiança"],
      typeSpeed: 80,
      backSpeed: 80,
      backDelay: 4000,
      startDelay: 1000,
      loop: true,
      showCursor: true
    });
  </script>

  <script src="{{asset('assets/painel/js/main.js')}}"></script>

  <script type="text/javascript">
  
    (function(n,r,l,d){
      try{
        var h=r.head || r.getElementsByTagName("head")[0], s=r.createElement("script");s.setAttribute("type","text/javascript");
        s.setAttribute("src",l);
        n.neuroleadId=d;h.appendChild(s);
      }catch(e){

      }
    })(window,document,"https://cdn.leadster.com.br/neurolead/neurolead.min.js", 31867);
  </script>

    <!-- jQuery -->
    <script src="{{asset('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js')}}"></script>
   <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>');</script>

  <!-- FlexSlider -->
  <script defer src="{{asset('plugin/js/jquery.flexslider.js')}}"></script>

  <script>

    (function() {
    
    // store the slider in a local variable
    var $window = $(window),
        flexslider = { vars:{} };

    // tiny helper function to add breakpoints
    function getGridSize() {
      return (window.innerWidth < 600) ? 2 :
              (window.innerWidth < 900) ? 3 : 4;
    }

    $(function() {
      SyntaxHighlighter.all();
    });

    $window.load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: getGridSize(), // use function to pull in initial value
        maxItems: getGridSize() // use function to pull in initial value
      });
    });

    // check grid size on resize event
    $window.resize(function() {
      var gridSize = getGridSize();

      flexslider.vars.minItems = gridSize;
      flexslider.vars.maxItems = gridSize;
    });
    }());
</script>


  </body>
</html>