@props(['isSSR' => false, 'data' => null])

<table id="pesertaTable" class="table table-bordered table-striped" style="width:100%">
  <thead>
      <tr>
          <th></th>
          <th>Nama</th>
          <th>Emel</th>
          <th>Jantina</th>
          <th>No. Telefon</th>
          <th>Tindakan</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td><input type="checkbox" class="select-row"></td>
          <th>Ahmad</th>
          <th>ahmad@gmail.com</th>
          <th>Lelaki</th>
          <th>0122345678</th>
      </tr> 
  </tbody>
</table>
<div class="panel-heading">
  <a href="{{route('peserta.create')}}" class="btn btn-primary" role="button">
      <span class="fa--plus-square"></span>
      Tambah
  </a> 
  <button id="hapusBtn" class="btn btn-danger"> 
      <span class="fa--trash"></span>
      Hapus
  </button> 
</div>  

@push('scripts')
  <script> 
    $(function () {
      let isSSR = {{json_encode($isSSR)}} 
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      
      let table = $('#pesertaTable').DataTable({
        processing: true,
        @if ($isSSR)
          serverSide: true, 
          ajax: {
              url: '{{ route("peserta.getServerData") }}',
              type: 'GET'
          },  
        @else
          deferRender: true,
          ajax: {
              url: '{{ route("peserta.getClientData") }}',
              type: 'GET'
          },  
        @endif 
        columns: [
          {
            orderable: false,
            data: null,
            render: DataTable.render.select(),
            targets: 0
          },
          { data: 'nama' },
          { data: 'emel' },
          { data: 'jantina' },
          { data: 'no_telefon' },
          {
            orderable: false,
            data: null,
            render: function(data) {
                return '<a href="{{ url("peserta") }}/' + data.id + '/edit" class="btn btn-warning btn-sm" role="button"><span class="fa--pencil"></span>Kemaskini</a>';
            }
          }
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child',
            headerCheckbox: true
        },
        "language": {
            "emptyTable": "Tiada data yang tersedia",
            processing: "Sedang memuatkan data...",
            "lengthMenu": "Paparan _MENU_ rekod",
            "zeroRecords": "Tiada data yang dijumpai",
            "info": "Papar _START_ hingga _END_ daripada _TOTAL_ rekod ",
            "infoEmpty": "Papar 0 hingga 0 daripada 0 rekod",
            "infoFiltered": "(hasil dari _MAX_ jumlah rekod) ",
            "search": "Carian:",
            "searchPlaceholder": "Cari rekod",
            "paginate": {
              "first":      "Pertama",
              "last":       "Terakhir",
              "next":       "Seterusnya",
              "previous":   "Sebelum"
            }
        },
        order: [[1, 'asc']],
      });

      $('#hapusBtn').click(function() {
            var selectedRows = table.rows({ selected: true }).data();
            console.log(selectedRows);
            
            if(selectedRows.length === 0) {
                alert('Sila pilih sekurang-kurangnya satu rekod');
                return;
            }

            if(confirm('Adakah anda pasti untuk menghapus rekod yang dipilih?')) {
                var ids = [];
                selectedRows.each(function(row) {
                    ids.push(row.id);
                });

                $.ajax({
                    url: '{{ route("peserta.destroy", ":id") }}'.replace(':id', ids.join(',')),
                    type: 'DELETE',
                    success: function(response) {
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        alert('Ralat semasa menghapus rekod');
                    }
                });
            }
        });
    });
  </script>
@endpush