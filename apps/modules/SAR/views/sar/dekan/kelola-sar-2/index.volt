{% extends 'sar/template/index.volt' %}
{% block navbar %}
{% include 'sar/template/navbar.volt' %}
{% endblock %}
{% block content %}

<div id="wrapper">    
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Kelola SAR 2</h2>
        <ol class="breadcrumb">
            <li>
                <a href="">Dashboard</a>
            </li>
            <li class="active">
                <strong>Kelola SAR 2</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3><center><strong>Institut</strong></center></h3>
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
                            </tr>
                        </thead>
                        <tbody>
                            {% set i = 1 %}
                            {% for sar in SarAssigmentS %}
                            <tr>
                                <td>{{ i }}</td>
                                <td>{{ sar['jenjang'] }}</td>
                                <td>{{ sar['sasaran'] == 0 ? '-' :  sar['sasaran'] }}</td>
                                <td>{{ sar['capaian'] == 0 ? '-' :  sar['capaian']}}</td>
                            </tr>
                                {% set i = i + 1 %}
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ibox-title">
                <h3><center><strong>Fakultas</strong></center></h3>
            </div>
            <div class="ibox-content">
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
                          {% for sar in SarAssigmentM %}
                          <tr>
                              <td>{{ i }}</td>
                              <td>{{ sar['jenjang'] }}</td>
                              <td>{{ sar['sasaran'] == 0 ? '-' :  sar['sasaran'] }}</td>
                              <td>{{ sar['capaian'] == 0 ? '-' :  sar['capaian']}}</td>
                              <td>
                                    {% if sar['IsAccess'] == 1 %}
                                        {% if sar['IsLocked'] == 0 %}
                                            <button type="button" class="btn btn-warning btn-xs" 
                                            data-id = "{{ sar['id'] }}"
                                            data-jenjang = "{{ sar['jenjang'] }}"
                                            data-sasaran = "{{ sar['sasaran'] }}"
                                            data-toggle="modal" data-target="#modal-edit"
                                            ><span class="fa fa-pencil"></span> Ubah</button>

                                            <button type="button" class="btn btn-danger btn-xs lock-button" 
                                            data-id = "{{ sar['id'] }}"
                                            data-locked = "{{ sar['IsLocked'] }}"
                                            data-jenjang = "{{ sar['jenjang'] }}"
                                            ><span class="fa fa-unlock"></span> Lock</button>
                                        {% else %}
                                            <label class="label label-primary"><i class="fa fa-lock"></i> Terkunci</label>
                                        {% endif %}
                                    {% else %}
                                        <label class="label label-warning"><i class="fa fa-lock"></i> Belum dapat diakses</label>
                                    {% endif %}
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
<form id="lock-form" method="post" action="/kelolasar-2/lock" style="display: none;">
    <input name="id" type="text" id="lock-id" value="">
</form>
{% include 'sar/dekan/kelola-sar-2/ModalEdit.volt' %}
{% endblock %}

{% block addscript %}
<script src="{{ url('https://phalcon-init.local/asset/js/sweetalert.min.js')}} "></script>
<script>

        $(document).ready(function(){
            $("#sidebar-sar2").addClass("active");
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
            $(".lock-button").click(function(){
                var id = $(this).data("id");
                var jenjang = $(this).data("jenjang");
                swal({
                    title: "Anda yakin untuk Mengunci Jenjang "+jenjang+"?",
                    text: "Mengunci nilai SAR akan menjadikan nilai sasaran tidak dapat diubah kembali!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $("#lock-id").val(id);
                        $("#lock-form").submit();
                    } else {
                        return;
                    }
                    });
            });
            $('#modal-edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                
                var id = button.data('id');
                var jenjang = button.data('jenjang');
                var sasaran = button.data('sasaran');

                var modal = $(this);

                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #edt_jenjang').val(jenjang);
                modal.find('.modal-body #edt_sasaran').val(sasaran);
            });

    </script>

{% endblock %}