<x-app-layout>

    @slot('content')
        <div class="container-fluid py-2">
         <div class="row">
           
            <div class="card col-12 p-4">
                <h4 class="mb-2">List Kriteria</h4>
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
                                <a href="/perhitungan_subkriteria/matrix?id={{$kriteria->id}}" class="badge text-white text-bg-primary">
                                    Input Nilai
                                </a> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
         </div>
        </div>

    
    @endslot
  
  </x-app-layout>