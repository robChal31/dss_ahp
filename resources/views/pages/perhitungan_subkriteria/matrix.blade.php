<x-app-layout>

    @slot('content')
        <div class="container-fluid py-2">
            <div class="row" id="hasil_container">
            
                <div class="card col-12 p-4">
                    <h4 class="mb-4">Matrix Perbandingan Subkriteria</h4>
                        @if (($is_valid) && $is_valid->is_valid)
                            <p class="alert alert-success text-white py-2 w-30 text-center" style="font-size: 12px">Nilai Consistensi Ratio dan Consistensi Index valid</p>
                        @endif
                        @if (($is_valid) && !$is_valid->is_valid)
                        <p class="alert alert-danger text-white py-2 w-30 text-center" style="font-size: 12px">Nilai Consistensi Ratio dan Consistensi Index tidak valid, silahkan input kembali</p>
                        @endif
                    <form method="post" action="/perhitungan_subkriteria/store">
                        @csrf
                        @method('POST')
                        <table class="table border">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" style="width:10%">Kriteria</th>
                                    @foreach ($kriteria->subkriterias as $subkriterias)
                                        <th scope="col" >{{$subkriterias->nama_subkriteria}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($kriteria->subkriterias as $outerIndex => $subkriterias2)
                                <tr class="text-center">
                                    <td class="fw-bold">{{$subkriterias2->nama_subkriteria}}</td>
                                @foreach ($kriteria->subkriterias as $innerIndex => $subkriterias3)
                                    <td>
                                        <select name="{{$subkriterias2->nama_subkriteria . '[]'}}" class="form-select px-4 matrix_select" style="padding: 5px 20px" {{$innerIndex == $outerIndex ? 'disabled' : ''}} data-id="{{$innerIndex . ',' . $outerIndex}}">
                                            @if (count($subkriterias2->perhitungansubkriterias))
                                                @if ($subkriterias2->perhitungansubkriterias[$innerIndex])
                                                    <option value="{{$subkriterias2->perhitungansubkriterias[$innerIndex]->nilai}}" data-dynamic="true">{{number_format($subkriterias2->perhitungansubkriterias[$innerIndex]->nilai, 2)}}</option>
                                                @endif
                                            @endif
                                            @foreach (range(1,9) as $point)
                                                <option value="{{$point}}" >{{$point}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <input type="hidden" name="id_kriteria" id="" value="{{$kriteria->id}}">
                        <div class="col-12 text-end">
                            <a href="/perhitungan_subkriteria" class="btn btn-warning" >
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary" >
                                Hitung Nilai
                            </button>
                        </div>
                    </form>
                </div>
            </div>

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
            $('form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission
            $(this).find('select:disabled').prop('disabled', false);
            $(this).find('option:disabled').prop('disabled', false);
            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: '/perhitungan_subkriteria/store',
                method: 'POST', 
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    $('#hasil_container').html(response);
                },
                error: function() {
                // Handle the error if the request fails
                }
            });
        });

        });
    </script>
