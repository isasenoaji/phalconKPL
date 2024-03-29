<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" style="width:70px;height:70px;border:0;" src="{{ url('https://phalcon-init.local/asset/img/default.png') }}" />
                     </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">NAMA</strong>
                     </span> 
            </div>
            <div class="logo-element">
                SAR
            </div>
        </li>
            <li id="sidebar-home">
                <a href=""><i class="fa fa-edit"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            {% if TipeSar != null %}
            {% for tipe in TipeSar  %}
                {% if tipe === 1 %}
                <li id="sidebar-sar1">
                    <a href="/kelolasar-1"><i class="fa fa-edit"></i> <span class="nav-label">Kelola SAR 1</span></a>
                </li>
                {% elseif tipe === 2 %}
                <li id="sidebar-sar2">
                    <a href="/kelolasar-2"><i class="fa fa-edit"></i> <span class="nav-label">Kelola SAR 2</span></a>
                </li>
                {% elseif tipe === 3 %}
                <li id="sidebar-sar3">
                    <a href="/kelolasar-3"><i class="fa fa-edit"></i> <span class="nav-label">Kelola SAR 3</span></a>
                </li>
                {% elseif tipe === 4 %}
                <li id="sidebar-sar4">
                    <a href="/kelolasar-4"><i class="fa fa-edit"></i> <span class="nav-label">Kelola SAR 4</span></a>
                </li>
                {% elseif tipe === 5 %}
                <li id="sidebar-sar5">
                    <a href="/kelolasar-5"><i class="fa fa-edit"></i> <span class="nav-label">Kelola SAR 5</span></a>
                </li>
                {% endif %}
            {% endfor %}
            {% endif %}
            <li id="sidebar-laporan">
                <a href=""><i class="fa fa-book"></i> <span class="nav-label">Laporan SAR</span></a>
            </li>
            <li id="sidebar-survey">
                <a href=""><i class="fa fa-bullhorn"></i> <span class="nav-label">Survey SAR</span></a>
            </li>
        </ul>

    </div>
</nav>