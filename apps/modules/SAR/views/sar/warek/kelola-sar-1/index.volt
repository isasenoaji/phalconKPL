{% extends 'sar/template/index.volt' %}
{% block navbar %}
{% include 'sar/template/navbar.volt' %}
{% endblock %}
{% block content %}

<div id="wrapper">    
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Kelola SAR</h2>
        <ol class="breadcrumb">
            <li>
                <a href="">Dashboard</a>
            </li>
            <li class="active">
                <strong>Kelola SAR</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>SAR 1</h3>
                <div class="text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-form">
                    APALAH
                    </button>
                </div>
            </div>
            <div class="ibox-content">
          		{{ flashSession.output() }}
                <div class="table-responsive">
                    <table class="table table-striped table-hover" style="font-size: small;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenjang</th>
                                <th>Sasaran</th>
                                <th>Capaian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% set i = 1 %}
                            {% for sar in SarAssigment %}
                            <tr>
                                <td>{{ i }}</td>
                                <td>{{ sar['jenjang'] }}</td>
                                <td>{{ sar['sasaran'] == 0 ? '-' :  sar['sasaran'] }}</td>
                                <td>{{ sar['capaian'] == 0 ? '-' :  sar['capaian']}}</td>
                                <td>
                                    <form id="button-edit" method="POST" action="">
                                        <input type="hidden" name="id" value="">
                                        <button type="button" class="btn btn-warning btn-xs" 
                                            data-id = "{{ sar['id'] }}"
                                            data-jenjang = "{{ sar['jenjang'] }}"
                                            data-sasaran = "{{ sar['sasaran'] }}"
                                            data-capaian = "{{ sar['capaian'] }}"
                                            data-toggle="modal" data-target="#modal-edit"
                                            ><span class="fa fa-pencil"></span> Ubah</button>
                                    </form>
                                </td>
                            </tr>
                                {% set i = i + 1 %}
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{% include 'sar/warek/kelola-sar-1/ModalEdit.volt' %}
{% endblock %}

{% block addscript %}
<script src="{{ url('https://phalcon-init.local/asset/js/sweetalert.min.js')}} "></script>
<script>

        $(document).ready(function(){
            $("#sidebar-sar").addClass("active");
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
            $('#modal-edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                
                var id = button.data('id');
                var jenjang = button.data('jenjang');
                var sasaran = button.data('sasaran');
                var capaian = button.data('capaian');

                var modal = $(this);

                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #edt_jenjang').val(jenjang);
                modal.find('.modal-body #edt_sasaran').val(sasaran);
                modal.find('.modal-body #edt_capaian').val(capaian);
            });

    </script>

{% endblock %}