
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
            <h3>Edit Pendaftaran Pasien</h3>
        </div>


        <div class="card-body">
            <form action="{{ url('/update-pendaftaran', $edit_pasien->id) }}" method="post">
                {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-8">
                    <input type="text" name="nm_pasien" id="nm_pasien" class="form-control" value="{{ $edit_pasien->nm_pasien }}" placeholder="Masukkan Nama Pasien...">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                    <input type="text" name="jns_kelamin" id="jns_kelamin" class="form-control" value="{{ $edit_pasien->jns_kelamin }}" placeholder="Masukkan Jenis Kelamin...">
                </div>
           </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $edit_pasien->alamat }}" placeholder="Masukkan Alamat...">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tpt. Tgl. Lahir</label>
                <tr>
                    <td>
                        <div class="col-sm-8">
                            <input type="text" name="tpt_lahir" id="tpt_lahir" value="{{ $edit_pasien->tpt_lahir }}" placeholder="Tempat Lahir">
                            <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $edit_pasien->tgl_lahir }}" >
                        </div>
                    </td>
                </tr>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"> Pelayanan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="id_pelayanan" id="id_pelayanan" hidden="true">
                    <input type="text" class="form-control" name="nm_pelayanan" id="nm_pelayanan">
                </div>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_pelayanan">Pilih</a>
           </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Pelayanan</label>
            <div class="col-sm-8">
                <select  class="form-control" value="{{ $edit_pasien->id_dokter }}" name="id_dokter" id="id_dokter" required="">
                    <option> PILIH DOKTER </option>
                    <option value="1">Dr. Asep Karyo Kopi </option>
                    <option value="2">Dr. Entin Laleur </option>
                </select>
            </div>
       </div>

            <div>
                <button type="submit" class="btn btn-primary">Edit Pendaftaran</button>
            </div>

         </form>
        </div>

      </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="modal_pelayanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                    <div class="material-datatables">
                        <table id="tbl_list_pelayanan" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PELAYANAN</th>
                                    <th class="disabled-sorting text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dtpelayanan as $pelayanan)
                                    <tr>
                                        <td>{{ $pelayanan->id_pelayanan }}</td>
                                        <td>{{ $pelayanan->nm_pelayanan }}</td>
                                        <td><button class="btn btn-warning" id="select"
                                            data-id_pelayanan="<?=$pelayanan->id_pelayanan?>"
                                            data-nm_pelayanan="<?=$pelayanan->nm_pelayanan?>"
                                            >Pilih</button></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
              </div>

           </div>
         </div>
      </div>
    </div>
  </div>
  </div>
</div>

<!-- REQUIRED SCRIPTS -->
@include('template.script')
@include('sweetalert::alert')
</body>
</html>
