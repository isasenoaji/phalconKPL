{% extends 'sar/template/index.volt' %}
{% block navbar %}
{% include 'sar/template/navbar.volt' %}
{% endblock %}
{% block content %}

<div id="wrapper">    
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Kelola SAR 4</h2>
        <ol class="breadcrumb">
            <li>
                <a href="">Dashboard</a>
            </li>
            <li class="active">
                <strong>Kelola SAR 4</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3><center><strong>Rumpun Mata Kuliah</strong></center></h3>
            </div>
            <div class="ibox-content">
          		{{ flashSession.output() }}
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2"><center>Rumpun Mata Kuliah</center></th>
                                <th colspan="3"><center>Departemen</center></th>
                                <th rowspan="2"><center>Sasaran</center></th>
                                <th rowspan="2"><center>Capaian</center></th>
                                <th rowspan="2"><center>Action</center></th>
                                <tr>
                                    <th>Nama Departemen</th>
                                    <th>Sasaran</th>
                                    <th>Capaian</th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            {% set i = 1 %}
                            {% for sar in SarAssigment %}
                            <tr>
                                <td>{{ i }}</td>
                                <td>{{ sar['rmk'] }}</td>
                                <td>{{ sar['jurusan'] }}</td>
                                <td>{{ sar['sasaran_jurusan'] }}</td>
                                <td>{{ sar['capaian_jurusan'] }}</td>
                                <td>{{ sar['sasaran'] == 0 ? '-' :  sar['sasaran']}}</td>
                                <td>{{ sar['capaian'] == 0 ? '-' :  sar['capaian'] }}</td>
                                <td>
                                    <form id="button-edit" method="POST" action="">
                                        <input type="hidden" name="id" value="">
                                        <button type="button" class="btn btn-warning btn-xs" 
                                            data-id = "{{ sar['id'] }}"
                                            data-rmk = "{{ sar['rmk'] }}"
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
{% include 'sar/ketuaRMK/kelola-sar-4/ModalEdit.volt' %}
{% endblock %}

{% block addscript %}
<script src="{{ url('https://phalcon-init.local/asset/js/sweetalert.min.js')}} "></script>
<script>

        $(document).ready(function(){
            $("#sidebar-sar4").addClass("active");
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
                var rmk = button.data('rmk');
                var sasaran = button.data('sasaran');
                var capaian = button.data('capaian');

                var modal = $(this);

                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #edt_rmk').val(rmk);
                modal.find('.modal-body #edt_sasaran').val(sasaran);
                modal.find('.modal-body #edt_capaian').val(capaian);
            });

    </script>

{% endblock %}