<x-app-layout>

    @slot('content')
        <div class="container-fluid py-2">
         <div class="row">
           
            <div class="card col-12 p-4">
                <h4 class="mb-2">List Kriteria</h4>
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Kriteria
                    </button>
                </div>
                <table class="table table-striped border">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="width:5%">No</th>
                            <th scope="col" style="width:65%">Nama Kriteria</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($kriterias as $index => $kriteria)
                        <tr class="text-center">
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$kriteria->nama_kriteria}}</td>
                            <td>
                                <a href="/subkriteria?id={{$kriteria->id}}" class="badge text-white text-bg-primary">
                                    Parameter
                                </a> | 
                                <span class="badge text-white text-bg-warning edit-link" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-id="{{ $kriteria->id }}" data-idNama="{{$kriteria->nama_kriteria}}">
                                    Edit
                                </span> | 
                                <span class="badge text-white text-bg-danger delete-link" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-id="{{ $kriteria->id }}">
                                    Delete
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    {!! $kriterias->links() !!}
              </div>
         </div>
        </div>

        {{-- create kriteria  --}}
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="/kriteria/store">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kriteria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
          
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control border px-2" id="" name="nama_kriteria">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      {{-- edit kriteria  --}}
      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal3Label">Edit kriteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kriteria</label>
                            <input type="hidden" name="id_kriteria" id="editInputId">
                            <input type="text" class="form-control border px-2" id="nama_kriteria" name="nama_kriteria">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- delete kriteria  --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_kriteria" id="deleteIdInput">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal2Label">Hapus kriteria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Hapus kriteria ?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endslot
  
  </x-app-layout>

  <script>
    $(document).ready(function() {
        $('.delete-link').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $('#deleteIdInput').val(id); // Set the value of the hidden input field
            var formAction = '/kriteria/destroy';
            $('#exampleModal2 form').attr('action', formAction); 
        });
        $('.edit-link').click(function(e) { 
            var id = $(this).data('id');
            let nama_kriteria = $(this).data('idnama');
            $('#nama_kriteria').val(nama_kriteria);
            $('#editInputId').val(id);
            console.log(`${nama_kriteria} ${id}`)
            var formActionEdit = '/kriteria/update';
            $('#exampleModal3 form').attr('action', formActionEdit); 
        });
    });

</script>