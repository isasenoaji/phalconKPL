{% extends 'sar/template/index.volt' %}
{% block navbar %}
{% include 'sar/warek/template/navbar.volt' %}
{% endblock %}
{% block content %}

<div id="wrapper">    
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
            <li class="active" >
                <a href="">Dashboard</a>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>Dashboard</h3>
                
            </div>
            
        </div>
    </div>
</div>
</div>

{% endblock %}

{% block addscript %}
<script src="{{ url('https://phalcon-init.local/asset/js/sweetalert.min.js')}} "></script>
<script>

        $(document).ready(function(){
            $("#sidebar-home").addClass("active");
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ],
                language:{
                    "lengthMenu": "Menampilkan _MENU_ baris per halaman",
                    "zeroRecords": "Maaf, data yang dicari tidak ditemukan!",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Belum ada data yang tersedia!",
                    "infoFiltered": "(Disaring dari _MAX_ total baris data!)",
                    "sSearch": "Cari :",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya",
                    }  
                }

            });

        });

    </script>
    <script>
            $('#detailku').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                
                var id = button.data('myid');

                var modal = $(this);

                modal.find('.modal-body #id').val(id);
            });

    </script>

{% endblock %}