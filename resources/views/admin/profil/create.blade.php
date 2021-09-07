@extends('layouts.admin.main')
@section('profil', 'active')
@section('title', 'Create Profil')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Profil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
            <li class="breadcrumb-item active">Create Profil</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                <a href="{{ route('profil.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Back</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('profil.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="name" name="name" placeholder="Nama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                      <textarea name="desc" class="form-control" id="desc" rows="10" placeholder="keterangan"></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="desc" class="col-sm-2 col-form-label">Pilih Gambar</label>
                    <div class="col-sm-10">
                      <input name="filefoto" class="form-control" type="file" id="filefoto">
                    </div>
                  </div>
                  <div class="form-group row">
                      <img id="img" src="{{ asset('img/profil/profil.jpg')}}"/>
                  </div>

                  <input type="hidden" name="color" class="form-control" id="warna" value="">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

@endsection

@push('style')

@endpush

@push('script')
<!-- bs-custom-file-input -->
<script src="{{ asset('bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
  $(function () {

    bsCustomFileInput.init();

    $('#filefoto').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    })
  });
</script>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the code: " + copyText.value);
}
function myFunction2() {
  var copyText = document.getElementById("myInput2");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the link: " + copyText.value);
}
</script>
@endpush