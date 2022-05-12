@extends("layouts.index")
@push("style")
    <!-- DataTables -->
    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section("content")
<nav class="navbar  justify-content-between" style="background: #FFFFFF; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.04);">
    <a class="navbar-brand" href="#">
        <img src="/img/energeek.png" width="209" height="50" alt="">
      </a>
    <div>
        <a href="/" class="btn button btn-outline-danger">Halaman Registrasi  <img src="/img/Vector.png" width="10px" alt=""></a>
    </div>
</nav>
<div class="container">
    <h4 class="pt-5 pb-4" style="font-family: Poppins; font-weight: 600;size: 32px">Detail Lamaran</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Detail Lamaran
                </div>
                <div class="card-body">
                  <label style="font-family: Poppins; font-weight: 500;size: 16px;color:#7E8299">Tanggal apply</label>
                  <h5 class="pb-3">{{ \Carbon\Carbon::parse($apply->created_at)->format('d M Y')}}</h5>
                  <label style="font-family: Poppins; font-weight: 500;size: 16px;color:#7E8299">Jabatan</label>
                  <h5 class="pb-3">{{ $apply->jabatan }}</h5>
                  <label style="font-family: Poppins; font-weight: 500;size: 16px;color:#7E8299">Telepon</label>
                  <h5 class="pb-3">{{ $apply->telp }}</h5>
                  <label style="font-family: Poppins; font-weight: 500;size: 16px;color:#7E8299">Tahun lahir</label>
                  <h5 class="pb-3">{{ $apply->lahir }}</h5>
                  <label style="font-family: Poppins; font-weight: 500;size: 16px;color:#7E8299">Berkas lamaran</label>
                  <div class="row">
                  @foreach ($apply->berkas as $pdf )
                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                            <li>
                              <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
            
                              <div class="mailbox-attachment-info">
                                <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{ $pdf->pdf }}</a>
                                    <span class="mailbox-attachment-size clearfix mt-1">
                                      <span>1,245 KB</span>
                                      <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                    </span>
                              </div>
                            </li>
                        </ul>
                  @endforeach
                </div>
              </div>
              <div class="card-footer">
                  <a href="/list" class="btn btn-outline-dark">Kembali</a>
              </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "lengthChange": true,
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); 
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
    
    $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Hapus lamaran?`,
          text: "Data yang telah dihapus tidak bisa dikembalikan",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((result) => {
        if (result) {
          form.submit();
        }
      });
  });
    </script>
@endpush