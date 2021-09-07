@extends('layouts.admin.main')
@section('profil', 'active')
@section('title', 'Detail Profil')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Profil</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
            <li class="breadcrumb-item active">Detail Profil</li>
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
          <div class="card">
            <div class="card-header">
              <form action="{{ route('profil.destroy', $profil->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="loc">
                <a href="{{ route('profil.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Back</a>
                <a href="{{ route('profil.edit', $profil->id) }}" class="btn btn-warning">edit</a>
                <button type="submit" class="btn btn-danger">delete</button>
              </form>
            </div>
          </div>
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                <h2 class="card-title">{{ $profil->name }}</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    @if($profil->image)
                      <img id="img" src="{{ asset('img/profil/'.$profil->image)}}" class="img-fluid"/>
                    @else
                      <p>Tidak ada gambar</p>
                    @endif

                    <br><br>
                    <div class="form-group">
                        <textarea readonly name="desc" class="form-control" id="desc" rows="10">{{ $profil->desc }}</textarea>
                    </div>

                    <p class="text-right">Dibuat: {{ $profil->created_at->format('d-m-Y') }}</p>
                  </div>
                </div>
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