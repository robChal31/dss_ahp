<x-app-layout>

    @slot('content')
        <div class="container-fluid py-2">
            @if ((count($kriterias) * count($kriterias)) == count($perhitungans_all))
                {{-- nilai alternatif  --}}
                <div class="row">
                    @if (($is_valid) && $is_valid->is_valid)
                        <p class="alert alert-success text-white py-2 w-30 text-center" style="font-size: 12px">Nilai Consistensi Ratio dan Consistensi Index kriteria valid</p>
                    @endif
                    
                    @if (($is_valid) && !$is_valid->is_valid)
                        <p class="alert alert-danger text-white py-2 w-30 text-center" style="font-size: 12px">Nilai Consistensi Ratio dan Consistensi Index kriteria tidak valid, silahkan input kembali</p>
                    @endif
                    <div class="card col-12 p-4">
                        <h4 class="mb-4">Nilai Alternatif</h4>
                            
                        @if (count($kriterias) && count($alternatifs))
                            <form method="post" action="/perhitungan_subkriteria/store">
                                @csrf
                                @method('POST')
                                <table class="table border">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" style="width:10%">Kriteria</th>
                                            @foreach ($kriterias as $kriteria)
                                                <th scope="col" >{{$kriteria->nama_kriteria}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($alternatifs as $outerIndex => $alternatif)
                                        <tr class="text-center">
                                            <td class="fw-bold">{{$alternatif->nama}}</td>
                                            @foreach ($kriterias as $innerIndex => $kriteria2)
                                            <?php $data_subkriteria = $kriteria2->alternatifdetails()->where('id_alternatif', $alternatif->id)->first()->id_subkriteria ?> 
                                                <td>
                                                    {{$kriteria2->subkriterias()->where('id', $data_subkriteria)->first()->nama_subkriteria}}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{-- <input type="hidden" name="id_kriteria" id="" value="{{$kriteria->id}}"> --}}
                                <div class="col-12 text-end">
                                    <a href="/perhitungan_subkriteria" class="btn btn-warning" >
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary" >
                                        Hitung Nilai
                                    </button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>

                {{-- nilai akhir  --}}
        
                <div class="row">
                
                    <div class="card col-12 p-4">
                        <h4 class="mb-4">Hitung Nilai Akhir</h4>
                        @if (count($kriterias) && count($alternatifs))
                            <form method="post" action="/perhitungan_subkriteria/store">
                                @csrf
                                @method('POST')
                                <table class="table border">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col" style="width:10%"></th>
                                            @foreach ($kriterias as $kriteria)
                                                <th scope="col" >{{$kriteria->nama_kriteria}}</th>
                                            @endforeach
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($alternatifs as $outerIndex => $alternatif)
                                        <tr class="text-center">
                                            <td class="fw-bold">{{$alternatif->nama}}</td>
                                            <?php $total = 0; ?>
                                            @foreach ($kriterias as $innerIndex => $kriteria3)
                                            <?php 
                                                $id_subkriteria = $kriteria3->alternatifdetails()->where('id_alternatif', $alternatif->id)->first()->id_subkriteria;
                                                $nilai_prioritas_kriteria = $kriteria3->nilaiprioritaskriteria->nilai_prioritas;
                                                $nilai_prioritas_subkriteria = $nilai_prioritas_subkriterias->where('id_subkriteria', $id_subkriteria)->first();
                                            ?> 
                                                <td>
                                                    {{number_format($nilai_prioritas_subkriteria->nilai_prioritas * $nilai_prioritas_kriteria, 2)}}
                                                </td>
                                                <?php $total += $nilai_prioritas_subkriteria->nilai_prioritas * $nilai_prioritas_kriteria;?>
                                            @endforeach
                                            <td>{{number_format($total,2)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </form>
                        @endif
                    </div>
                </div>
        
            @else
            <div class="card col-12 p-4">
                <p class="alert alert-danger text-white py-2 w-30 text-center" style="font-size: 12px">Harap mengisi nilai prioritas kriteria dan subkriteria terlebih dahulu</p>
            </div>
            @endif
        </div>
    @endslot
  
  </x-app-layout>

    <script>
        $(document).ready(function() {

            $('.matrix_select').on('change', function(e) {
                var selectedOption = $(this).find('option:selected');
                if (!selectedOption.is(':disabled')) {
                    var id = $(this).data('id');
                    id = id.split(',');
                    var targetElement = $('[data-id="' + id[1] + ',' + id[0] + '"]');
                    var optionText = '1' + '/' + selectedOption.val();
                    var optionValue = 1/parseInt(selectedOption.val());

                    // Remove previously appended option
                    targetElement.find('option[data-dynamic="true"]').remove();
                    $(this).find('option[data-dynamic="true"]').remove();
                    // Add the new option
                    targetElement.append($('<option>', {
                        value: optionValue,
                        text: optionText,
                        selected: true,
                        disabled: true,
                        'data-dynamic': true
                    }));
                }
            });


            // Enable the disabled select element before submitting the form
            $('form').submit(function() {
                $(this).find('select:disabled').prop('disabled', false);
                $(this).find('option:disabled').prop('disabled', false);
            });

        });
    </script>
