@extends('adminlte::page')

@section('title', 'Rekap Data ' . date('Y'))
@section('content_header')
<h1>Rekap Data Tahun {{date('Y')}}</h1>
@stop

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">
                        <div class="table-responsive">

                            <table id="table_cuti" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Bagian</th>
                                        <th>Jabatan</th>
                                        <th>Cuti Dipakai</th>
                                        <th>Cuti Dalam Proses</th>
                                        <th>Sisa Cuti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($cuti as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->nip }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->bagian }}</td>
                                        <td>{{ $data->jabatan }}</td>
                                        <td>{{ $data->count_disetujui }}</td>
                                        <td>{{ $data->count_pending }}</td>
                                        <td>{{ 12 - ($data->count_disetujui +$data->count_pending) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>

            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            @stop
            @section('footer')
            <div id="mycredit" class="small"><strong> Copyright &copy;
                    <?php echo date('Y');?> Sistem Informasi Pengajuan Cuti Pegawai BLUD - Mufasirin </div>
            @stop

            @section('plugins.Datatables', true)
            @section('plugins.DatatablesPlugins', true)

            @section('plugins.Sweetalert2', true)

            @section('js')
            <script type="text/javascript">
                function add() {
                    window.location = "{{ route('cuti.create') }}";
                 }
                 $(function () {
                    $("#table_cuti").DataTable({
                      "paging": true,
                      "lengthChange": false,
                      "searching": true,
                      "ordering": true,
                      "info": true,
                      "autoWidth": false,
                      "responsive": true,
                      "buttons": [
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3,4,5,6,7 ]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3,4,5,6,7 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3,4,5,6,7 ]
                                }
                            }
                        ]
                    }).buttons().container().appendTo('#table_cuti_wrapper .col-md-6:eq(0)');
                   
                  });
                

                
            </script>
           
            @stop