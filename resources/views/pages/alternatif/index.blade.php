<x-app-layout>

    @slot('content')
        <div class="container-fluid py-2">
         <div class="row">
           
            <div class="card col-12 p-4">
                <h4 class="mb-2">List siswa</h4 class="mb-2">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah siswa
                    </button>
                </div>
                <table class="table table-striped border">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" style="width:5%">No</th>
                            <th scope="col" style="width:20%">NIS</th>
                            <th scope="col" style="width:30%">Nama siswa</th>
                            <th scope="col" style="width:10%">Kelas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($siswas as $index => $siswa)
                        <tr class="text-center">
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$siswa->nis}}</td>
                            <td>{{$siswa->nama}}</td>
                            <td>{{$siswa->kelas}}</td>
                            <td>
                                <a href="/siswa_detail?id={{$siswa->id}}" class="badge text-white text-bg-primary">
                                    Parameter
                                </a> | 
                                <span class="badge text-white text-bg-warning edit-link" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-id="{{ $siswa->id }}" data-idsiswa="{{$siswa->nama .  ',' . $siswa->nis . ',' . $siswa->kelas}}">
                                    Edit
                                </span> | 
                                <span class="badge text-white text-bg-danger delete-link" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-id="{{ $siswa->id }}">
                                    Delete
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    {!! $siswas->links() !!}
              </div>
         </div>
        </div>

    {{-- create siswa  --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="/siswa/store">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
          
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="" class="form-label">NIS</label>
                        <input type="text" class="form-control border px-2" id="" name="nis" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control border px-2" id="" name="nama" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="" class="form-label">Kelas</label>
                        <select class="form-select px-2 border" aria-label="Default select example" name="kelas" required>
                            <option selected>Pilih kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
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

    {{-- edit siswa  --}}
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal3Label">Edit siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="" class="form-label">Nama siswa</label>
                            <input type="text" class="form-control border px-2" id="nama" name="nama">
                            <input type="hidden" class="form-control border px-2" id="id_siswa" name="id_siswa">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="" class="form-label">NIS</label>
                            <input type="text" class="form-control border px-2" id="nis" name="nis">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="" class="form-label">Kelas</label>
                            <select class="form-select px-2 border" aria-label="Default select example" id="kelas" name="kelas" required>
                                <option selected disabled>Pilih kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
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

    {{-- delete siswa  --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id_siswa" id="deleteIdInput">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModal2Label">Hapus siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Hapus siswa ?
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
            var formAction = '/siswa/destroy';
            $('#exampleModal2 form').attr('action', formAction); 
        });
        $('.edit-link').click(function(e) { 
            let id = $(this).data('id');
            let siswa = $(this).data('idsiswa');
            siswa = siswa.split(',');
            $('#id_siswa').val(id);
            $('#nama').val(siswa[0]);
            $('#nis').val(siswa[1]);
            $('#kelas').val(siswa[2]);
            console.log(`${siswa} ${id}`)
            var formActionEdit = '/siswa/update';
            $('#exampleModal3 form').attr('action', formActionEdit); 
        });
    });

</script>