<x-app-layout>

    @slot('content')
        <div class="container-fluid py-2">
            <div class="row" id="hasil_container">
            
                <div class="card col-12 p-4">
                    <h4 class="mb-4">Matrix Perbandingan</h4>

                    @if ((count($kriterias) * count($kriterias)) == count($perhitungans_all))
                        @if (($is_valid) && $is_valid->is_valid)
                            <p class="alert alert-success text-white py-2 w-30 text-center" style="font-size: 12px">Nilai Consistensi Ratio dan Consistensi Index valid</p>
                        @endif
                        
                        @if (($is_valid) && !$is_valid->is_valid)
                            <p class="alert alert-danger text-white py-2 w-30 text-center" style="font-size: 12px">Nilai Consistensi Ratio dan Consistensi Index tidak valid, silahkan input kembali</p>
                        @endif
                    @endif

                    @if (count($kriterias))
                        <form method="post" action="/perhitungan/store">
                            @csrf
                            @method('POST')
                            <table class="table border">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" style="width:10%">Kriteria</th>
                                        @foreach ($kriterias as $kriteria1)
                                            <th scope="col" >{{$kriteria1->nama_kriteria}}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($kriterias as $outerIndex => $kriteria2)
                                    <tr class="text-center">
                                        <td class="fw-bold">{{$kriteria2->nama_kriteria}}</td>
                                    @foreach ($kriterias as $innerIndex => $kriteria3)
                                        <td>
                                            @if ((count($kriterias) * count($kriterias)) != count($perhitungans_all))
                                                <select name="{{$kriteria2->nama_kriteria . '[]'}}" class="form-select px-4 matrix_select" style="padding: 5px 20px" {{$innerIndex == $outerIndex ? 'disabled' : ''}} data-id="{{$innerIndex . ',' . $outerIndex}}">
                                                    @foreach (range(1,9) as $point)
                                                        <option value="{{$point}}" >{{$point}}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select name="{{$kriteria2->nama_kriteria . '[]'}}" class="form-select px-4 matrix_select" style="padding: 5px 20px" {{$innerIndex == $outerIndex ? 'disabled' : ''}} data-id="{{$innerIndex . ',' . $outerIndex}}">
                                                    @if (count($kriteria2->perhitungans))
                                                        @if ($kriteria2->perhitungans[$innerIndex])
                                                            <option value="{{$kriteria2->perhitungans[$innerIndex]->nilai}}" data-dynamic="true">{{number_format($kriteria2->perhitungans[$innerIndex]->nilai, 2)}}</option>
                                                        @endif
                                                    @endif
                                                    @foreach (range(1,9) as $point)
                                                        <option value="{{$point}}" >{{$point}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            
                                        </td>
                                    @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-12 text-end"> 
                                <button type="submit" class="btn btn-primary" >
                                    Hitung Nilai
                                </button>
                            </div>
                        </form>                    
                    @endif
                </div>
            </div>

            <div class="row">
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

        $('form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission
            $(this).find('select:disabled').prop('disabled', false);
            $(this).find('option:disabled').prop('disabled', false);
            var formData = $(this).serialize(); // Serialize the form data

            $.ajax({
                url: '/perhitungan/store', // Replace with the actual URL to your controller route
                method: 'POST', // Replace with the appropriate HTTP method
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
