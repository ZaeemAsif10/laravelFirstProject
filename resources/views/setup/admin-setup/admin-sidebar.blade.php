 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">

         <div class="user-panel">
             <div class="pull-left image">
                 <img src="{{asset('assets/dist/img/user1-128x128.png')}}" class="img-circle" alt="User Image">
             </div>
<!--
             
-->
         </div>

         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu" data-widget="tree">
             <li class="active">
                 <a href="{{url('admin-home')}}">
                     <i class="fa fa-desktop"></i><span> Dashboard</span>
                 </a>
             </li>

             <li class="treeview">
                 <a href="#">
                     <i class="fab fa-product-hunt"></i><span>&nbsp&nbsp Bank Settings</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="{{url('add-bank')}}"><i class="far fa-dot-circle"></i> Add Bank</a></li>
                     <li><a href="{{url('all-bank')}}"><i class="far fa-dot-circle"></i> View Bank</a></li>
                 </ul>
             </li>
             <li class="treeview">
                 <a href="#">
                     <i class="fab fa-product-hunt"></i><span>&nbsp&nbsp Party/Vendor</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="{{url('add-party')}}"><i class="far fa-dot-circle"></i> Add Party</a></li>
                     <li><a href="{{url('all-party')}}"><i class="far fa-dot-circle"></i> View Party</a></li>
                 </ul>
             </li>
             <li class="treeview">
                 <a href="#">
                     <i class="fab fa-product-hunt"></i><span>&nbsp&nbsp Passenger</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="{{'add-passenger'}}"><i class="far fa-dot-circle"></i> Add Passenger</a></li>
                     <li><a href="{{url('all-passenger')}}"><i class="far fa-dot-circle"></i> View Passenger</a></li>
                 </ul>
             </li>
             
             
             <li class="treeview">
                 <a href="#">
                     <i class="fab fa-product-hunt"></i><span>&nbsp&nbsp Airline</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="{{url('add-airline')}}"><i class="far fa-dot-circle"></i> Add Airline</a></li>
                     <li><a href="{{url('all-airline')}}"><i class="far fa-dot-circle"></i> View Airline</a></li>

                 </ul>
             </li>
             
             <li class="treeview">
                 <a href="#">
                     <i class="fab fa-product-hunt"></i><span>&nbsp&nbsp Airport</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="{{url('add-airport')}}"><i class="far fa-dot-circle"></i> Add Airport</a></li>
                     <li><a href="{{url('all-airport')}}"><i class="far fa-dot-circle"></i> View Airport</a></li>

                 </ul>
             </li>
             
             <li class="treeview">
                 <a href="#">
                     <i class="fab fa-product-hunt"></i><span>&nbsp&nbsp Bank Transection</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="{{url('add-Transaction')}}"><i class="far fa-dot-circle"></i> Add Bank Transection</a></li>
                     <li><a href="{{url('all-Transaction')}}"><i class="far fa-dot-circle"></i> View Bank Transection</a></li>

                 </ul>
             </li>
             
             <li class="treeview">
                 <a href="#">
                     <i class="fab fa-product-hunt"></i><span>&nbsp&nbsp Carrier</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="{{url('add-carier')}}"><i class="far fa-dot-circle"></i> Add Carrier</a></li>
                     <li><a href="{{url('all-carier')}}"><i class="far fa-dot-circle"></i> View Carrier</a></li>

                 </ul>
             </li>
         </ul>
     </section>
 </aside>
