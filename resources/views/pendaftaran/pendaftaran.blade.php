<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @include('template.navbar')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('template.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pendaftaran Pasien</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="card card-info card-outline">
        <div class="card-header">
            <div class="card-tools">
                <a href="/form-pendaftaran" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
            </div>

            <div>
                <form action="{{ url('pendaftaran') }}" method="GET">
                    <input type="text" name="keyword" value="{{ $keyword }}">
                    <button type="submit" class="btn btn-info">Search</button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr style="font-weight: bold;">
                    <td>No</td>
                    <td>Nama</td>
                    <td>alamat</td>
                    <td>Jenis Kelamin</td>
                    <td>Tempat Lahir</td>
                    <td>Tanggal Lahir</td>
                    <td>Umur</td>
                    <td>pelayanan</td>
                    {{-- <td>dokter</td> --}}
                    <td>Action</td>
                </tr>


            @php $no = 1; @endphp
            @foreach ($dtpasien as $pasien)

            @php
                $tgl_lahir = $pasien->tgl_lahir;

                $b_day = new DateTime($tgl_lahir);
                $now = new DateTime();

                $usia = $now->diff($b_day);
            @endphp

                <tr>
                    <td>{{ $no++ }}</td>
                    <td><a href="{{ url('/read-pendaftaran', $pasien->id) }}">{{ $pasien->nm_pasien }}</a></td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->jns_kelamin }}</td>
                    <td>{{ $pasien->tpt_lahir }}</td>
                    <td>{{ date('d-m-Y', strtotime($pasien->tgl_lahir)) }}</td>
                    <td>{{ $usia->y }}</td>
                    <td>
                        @php
                            if ($pasien->id_pelayanan == '1'){
                                echo "Administrasi Rawat Jalan";
                            }else if($pasien->id_pelayanan == '2'){
                                echo "Administrasi Yang Dikenakan Apabila Jasa Konsultasi Free Of Charge";
                            }else if($pasien->id_pelayanan == '3'){
                                echo "Buku Paspor Anak";
                            }else if($pasien->id_pelayanan == '4'){
                                echo "Buku Paspor Ibu";
                            }else if($pasien->id_pelayanan == '5'){
                                echo "Kartu Pasien 1 Kali Print";
                            }else if($pasien->id_pelayanan == '6'){
                                echo "Konsultasi Dokter Spesialis Gol A";
                            }else if($pasien->id_pelayanan == '7'){
                                echo "Konsultasi Dokter Spesialis Gol B";
                            }else if($pasien->id_pelayanan == '8'){
                                echo "Konsultasi Dokter Spesialis Gol C";
                            }else if($pasien->id_pelayanan == '9'){
                                echo "Konsultasi Dokter Umum";
                            }else if($pasien->id_pelayanan == '10'){
                                echo "Konsultasi Dokter Gigi Umum";
                            }else if($pasien->id_pelayanan == '11'){
                                echo "Konsultasi Dokter Gigi Spesialis";
                            }else if($pasien->id_pelayanan == '12'){
                                echo "USG A";
                            }else if($pasien->id_pelayanan == '13'){
                                echo "USG B";
                            }else if($pasien->id_pelayanan == '14'){
                                echo "USG C";
                            }else if($pasien->id_pelayanan == '15'){
                                echo "USG Tiroid";
                            }else if($pasien->id_pelayanan == '16'){
                                echo "Soft Tisue";
                            }else if($pasien->id_pelayanan == '17'){
                                echo "Pungsi Asites";
                            }else if($pasien->id_pelayanan == '18'){
                                echo "EKG";
                            }else if($pasien->id_pelayanan == '19'){
                                echo "ECHO";
                            }else if($pasien->id_pelayanan == '20'){
                                echo "Jasa Suntik Dokter";
                            }else if($pasien->id_pelayanan == '21'){
                                echo "Nebulizer (alat Saja)";
                            }else if($pasien->id_pelayanan == '22'){
                                echo "Transfusi Albumin";
                            }else if($pasien->id_pelayanan == '23'){
                                echo "HEMATOLOGI";
                            }else if($pasien->id_pelayanan == '24'){
                                echo "Hematologi Lengkap";
                            }else if($pasien->id_pelayanan == '25'){
                                echo "Hematologi Rutin";
                            }else if($pasien->id_pelayanan == '26'){
                                echo "Hematologi Lengkap + Retikulosit";
                            }else if($pasien->id_pelayanan == '27'){
                                echo "Hemoglobin";
                            }else if($pasien->id_pelayanan == '28'){
                                echo "Leukosit";
                            }else if($pasien->id_pelayanan == '29'){
                                echo "Hitung Jenis";
                            }else if($pasien->id_pelayanan == '30'){
                                echo "Laju Endap Darah (LED)";
                            }else if($pasien->id_pelayanan == '31'){
                                echo "Trombosit";
                            }else if($pasien->id_pelayanan == '32'){
                                echo "Hematokrit";
                            }else if($pasien->id_pelayanan == '33'){
                                echo "Erytrosit";
                            }else if($pasien->id_pelayanan == '34'){
                                echo "MCV";
                            }else if($pasien->id_pelayanan == '35'){
                                echo "MCH";
                            }else if($pasien->id_pelayanan == '36'){
                                echo "MCHC";
                            }else if($pasien->id_pelayanan == '37'){
                                echo "Eosinophil";
                            }else if($pasien->id_pelayanan == '38'){
                                echo "Neutrophil Lymphocyte Count Ratio";
                            }else if($pasien->id_pelayanan == '30'){
                                echo "Neutrofil (absolut)";
                            }else if($pasien->id_pelayanan == '40'){
                                echo "Limfosit (absolut)";
                            }else if($pasien->id_pelayanan == '41'){
                                echo "Retikulosit";
                            }else if($pasien->id_pelayanan == '42'){
                                echo "Panel Hapusan Darah";
                            }else if($pasien->id_pelayanan == '43'){
                                echo "Hapusan Darah";
                            }else if($pasien->id_pelayanan == '44'){
                                echo "Immature Platelet Fraction (IPF)";
                            }else if($pasien->id_pelayanan == '45'){
                                echo "Immature Reticulocyte Fraction (IRF)";
                            }else if($pasien->id_pelayanan == '46'){
                                echo "Hemoglobin Retikulosit";
                            }else if($pasien->id_pelayanan == '47'){
                                echo "Panel Faal Hemostasis";
                            }else if($pasien->id_pelayanan == '48'){
                                echo "Waktu Perdarahan (BT)";
                            }else if($pasien->id_pelayanan == '49'){
                                echo "Waktu Pembekuan (CT)";
                            }else if($pasien->id_pelayanan == '50'){
                                echo "Protrombin Time (PT)";
                            }

                        @endphp
                    </td>
                    {{-- <td>{{ $pasien->id_dokter }}</td> --}}
                    <td>
                        <a href="{{ url('/edit-pendaftaran', $pasien->id) }}" class="btn btn-primary" style="width: 100%"><i class="fas fa-edit"></i></a>
                        <a href="{{ url('/delete-pendaftaran', $pasien->id) }}" class="btn btn-danger" style="width: 100%"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
            <div class="card-footer">
                    {{ $dtpasien->links() }}
            </div>
        </div>


      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('template.script')
@include('sweetalert::alert')
</body>
</html>
