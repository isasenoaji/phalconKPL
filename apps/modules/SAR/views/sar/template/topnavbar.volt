<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
    </div>

<ul class="nav navbar-top-links navbar-right">
    <li style="padding:20px;float:right;">
        
        <form id="logout-form" action="{{ url('https://phalcon-init.local/SAR/Users/logout') }}" method="POST" >
            <button class="btn btn-outline-dark btn-sm" type="submit">
                <i class="fa fa-sign-out"></i> Log out
            </button>
        </form>
    </li>

</ul>
</nav>