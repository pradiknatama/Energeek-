@extends("layouts.index")
@push('style')
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section("content")
<nav class="navbar  justify-content-between" style="background: #FFFFFF; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.04);">
    <a class="navbar-brand" href="#">
        <img src="/img/energeek.png" width="209" height="50" alt="">
      </a>
    <div>
        <a href="/list" class="btn button btn-outline-danger">Menuju List Pelamar  <img src="/img/Vector.png" width="10px" alt=""></a>
    </div>
</nav>
<div class="row pt-5" >
    <div class="col-lg-3 d-none d-lg-block">
        <img style="position: absolute;
        bottom: 8px;
        left: 16px;
        font-size: 18px;" width="250px" src="/img/delivery.png" alt="Generic placeholder image">
    </div>
    <div class="col-lg-6 col-12 col-sm-12" >
        <div class="card p-5">
            <h5 class="text-center" style="font-family: Poppins; font-weight: 500">Apply Lamaran</h5>
            <form action="/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Minimal</label>
                    <select class="form-control select2" style="width: 100%;" name="jabatan"  required>
                        <option value="Frontend Web Programmer" selected>Frontend Web Programmer</option>
                        <option value="Fullstack Web Programmer">Fullstack Web Programmer</option>
                        <option value="Quality Control">Quality Control</option>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="Telepon">Telepon</label>
                    <input id="phonenum" name="telp" class="phone form-control" type="tel" pattern="^\d{4}-\d{4}-\d{4}$" required placeholder="Cth: 0822-3333-4444">

                </div>
                <div class="form-group">
                  <label for="Email">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="Tahun">Tahun Lahir</label>
                    <input type="number" name="tahun" class="form-control" placeholder="Cth: 1999">
                </div>
                <div class="form-group">
                    <label for="document">Berkas Lamran</label>
                    <div class="needsclick dropzone" id="document-dropzone">
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-lg-3 d-none d-lg-block">
        <img src="/img/Group.png" style="position: absolute;
        bottom: 8px;
        right: 16px;
        font-size: 18px;
      }" width="250px" alt="Generic placeholder image">
    </div>
</div>
@endsection
@push("script")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<!-- Select2 -->
<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(document).ready(function(){
        $('.phone').inputmask('9999-9999-9999');
        $('.mobile').inputmask('(999)-999-9999');
    });
</script>
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>
<script>
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
       url: '{{ route('storeMedia') }}',
       minFile:2,
       maxFilesize: 4, // MB
       addRemoveLinks: true,
       acceptedFiles: ".pdf",
       headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
       },
       success: function(file, response) {
          $('form').append('<input type="hidden" name="pdf[]" value="' + response.name + '"required> ' )
          uploadedDocumentMap[file.name] = response.name
       },
       removedfile: function(file) {
          file.previewElement.remove()
          var name = ''
          if (typeof file.file_name !== 'undefined') {
             name = file.file_name
          } else {
             name = uploadedDocumentMap[file.name]
          }
          $('form').find('input[name="pdf[]"][value="' + name + '"]').remove()
       }
    }
</script>
@endpush