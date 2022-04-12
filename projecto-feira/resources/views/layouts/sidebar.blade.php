@extends('layouts.table-data')
@section('barralateral')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('assets/dist/img/feira-logo.png')}}" alt="FEIRA logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">FEIRA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview"> 
                <a href="#" class="nav-link">
                  <p>{{ Auth::user()->name }}<!--i class="fas fa-angle-down right"></i--><span class="badge badge-info right"></span></p>
                </a>
                
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('dashboard.front')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                      <p></p>visitar o site</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('perfil.admin')}} " class="nav-link" target="_blank">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Perfil</p>
                    </a>
                  </li>
                  <li class="nav-item">
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
          </ul>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <!--i class="nav-icon fas fa-tachometer-alt"></i-->
              <p>
                Página inicial
                <!--i class="right fas fa-angle-left"></i-->
              </p>
            </a>
            
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Feira
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('gest_feira')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir feira</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Feirantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('feirante.todos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir feirantes</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Mercados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('mercado.todos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir mercados</p>
                </a>
              </li>            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Vendedores
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('vendedor.todos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir vendedores</p>
                </a>
              </li>            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Visitante
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visitante.todos')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir visitante</p>
                </a>
              </li>            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Categorias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categoria.todas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerir categoria</p>
                </a>
              </li>
              
            </ul>
          </li>
             
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection