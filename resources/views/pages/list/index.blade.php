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
    <h4 class="pt-5 pb-4" style="font-family: Poppins; font-weight: 600;size: 32px">Daftar Lamaran</h4>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Apply</th>
                      <th>Email</th>
                      <th>Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($apply as $key=>$row )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y')}}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->jabatan }}</td>
                                <td class="project-actions ">
                                    <form action="/list/{{ $row->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        {{-- <a class="btn btn-primary btn-sm" href="/kategori/{{ $item->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a> --}}
                                        <a class="btn btn-info btn-sm" href="/list/{{ $row->id }}/detail">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Detail
                                        </a>
                
                                        <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $row->nama }}" type="submit"><i class="fas fa-trash">
                                        </i> 
                                        Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr >
                                <td colspan="5">Data Masih Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                        
                  </table>
                  {{-- @foreach ($apply as $row)
                  <h1>{{ $row->email }}</h1>
                 
                  @foreach ($row->berkas as $pdf )
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

    
                  
                      
                  @endforeach --}}
                </div>

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