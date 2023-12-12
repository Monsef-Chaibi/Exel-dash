<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>

.upload-button {
	font-family: 'Montserrat';
    background: linear-gradient(135deg,#71b7e6, #9b59b6);
	color: #f7fff7;
	display: flex;
	align-items: center;
	font-size: 18px;
	border: none;
	border-radius: 20px;
	margin: 10px;
	padding: 7.5px 50px;
	cursor: pointer;
    margin-left: 43%;
}
.drop-container {
  width: 60%;
  margin-left: 20%;
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #555;
  color: #444;
  cursor: pointer;
  background: linear-gradient(135deg,#71b7e6, #9b59b6);
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

.drop-container:hover {
    background: linear-gradient(135deg, #9b59b6,#71b7e6);
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}
.button {
    border: 2px #1eff00 solid;
    padding: 0.3%;
    border-radius: 10px;
    width: 150px;
    height: 50px;
    color: #1eff00; /* Set default text color */
    transition: background-color 0.3s, color 0.3s; /* Add smooth transition effect */
}

.button:hover {
    background-color: #1eff00; /* Change background color on hover */
    color: black; /* Change text color on hover */
}
.button-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.fr {
  border-top: none;
  background:#71b7e6;
  color: #fff;
  border-radius: 20px;
  height: 40px;
}
.vin-exists-in-pdf-and-database {
        background-color: white; /* Red */
    }

    .vin-exists-in-pdf {
        background-color: #ff1500; /* Green */
    }
    .vin-not-found {
        background-color: #ff1500; /* Green */
    }

    .notfound {
        background-color: #0000ff; /* Blue */
    }


 </style>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
      <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

  @if (session()->has('success'))
      <script>
         Swal.fire(
             'Success',
             '{{ session('success') }}',
             'success'
         )
      </script>
  @endif
  @if (session()->has('error'))
      <script>
         Swal.fire(
             'Error',
             '{{ session('error') }}',
             'error'
         )
      </script>
  @endif
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 style="color: #1eff00; text-align:center; margin:15px;padding:10px">
                        Check PDF FILE
                    </h3>
                    <form action="{{ route('GetPDF') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="images" class="drop-container" id="dropcontainer">
                            <span class="drop-title">Drop files here</span>
                            or
                            <input class="btn" type="file" name="pdfFile" value="" id="" required>
                            <input type="hidden" name="bildoc" value="{{$bildoc}}" id="">
                          </label>
                        <button type="submit" class="upload-button"> Upload </button>
                    </div>
                </form>
                @if (!empty($seventhValues) || !empty($data))

                <h1 style="text-align: center; font-size:30px">Result</h1>
                <div style="display: flex;justify-content:center">
                    <table id="result" style="text-align: center;margin-top:20px">
                        <tr class="fr">
                            <td style="width: 200px"> P.O Number </td>
                            <td style="width: 200px">Vin</td>

                            <td style="width: 200px">Amount</td>
                            <td style="width: 200px">Total</td>
                        </tr>
                        <tr>
                            <td id='resultOrder' style="width: 200px;height:100px"></td>
                            <td id='VinResult' style="width: 200px;height:100px"></td>

                            <td id='AmountResult' style="width: 200px;height:100px"></td>
                            <td id='resultTotal' style="width: 200px;height:100px"></td>
                        </tr>
                    </table>
                </div>

                <div style="display: flex;justify-content:center;height:100%">
                    <table id="vinFromPDF" style="width: 40%; margin-bottom:5%; margin-top:2%;border-radius:10px;height:90%">
                        <thead>
                            <tr class="fr">
                                <th colspan="2">From PDF</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <td colspan="2" style="background-color: white; color: black; height: 30px; border: 1px solid gray">
                                P.O Number : {{ $seventhValues[0]['title'] }}
                            </td>
                            <input type="hidden" value="{{ $count1 = 0 }}">
                            @foreach ($seventhValues as $vinData)
                                <tr>
                                    <td id="VinElementPDF_{{ ++$count1 }}" style="width: 300px; color: black; height: 30px; border: 1px solid gray;background-color: white;">
                                        <span style="color: #15b700">{{ $count1 }}</span> VIN: {{ $vinData['value1'] }}
                                    </td>
                                    <td style="color: black; height: 30px; border: 1px solid gray;background-color: white;">
                                        Amount: {{ $vinData['targetValue'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table id="vinFromDatabase" style="width: 40%; margin-bottom:5%; margin-top:2%;border-radius:10px;height:90%">
                        <thead>
                            <tr class="fr">
                                <th colspan="2">From DataBase</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <td style="background-color: white;color:black;height:30px;border:1px solid gray" colspan="2">
                                P.O Number : {{ $order }}
                            </td>
                            <input type="hidden" value="{{$count = 0 }}">
                            <input type="hidden" value="{{$total = 0 }}">
                            @foreach ($data as $item)
                                <tr>
                                    <td id='VinElementDatabase_{{ ++$count }}' style="width:300px;color:black;height:30px;border:1px solid gray;background-color: white;">
                                        <span style="color:#15b700">{{ $count }}</span> VIN : {{ $item->vin }}
                                    </td>
                                    <td style="color:black;height:30px;border:1px solid gray;background-color: white;">
                                        Amount : {{ number_format($item->amount, 2, '.', ',') }}
                                        <input type="hidden" value="{{$total +=  $item->amount}}">
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <?php
                // Assuming $seventhValues and $data are your arrays of data
                $vinFromPDF = array_column($seventhValues, 'value1');
                $vinFromDatabase = array_column($data->toArray(), 'vin');

                // Check if all VINs from PDF exist in the Database
                $allExistInDatabasePDF = empty(array_diff($vinFromPDF, $vinFromDatabase));

                // Check if all VINs from Database exist in the PDF
                $allExistInPDFDatabase = empty(array_diff($vinFromDatabase, $vinFromPDF));

                // Output the result
                ?>
              <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var resultVinElement = document.getElementById('VinResult');
                    if (<?= json_encode($allExistInDatabasePDF && $allExistInPDFDatabase) ?>) {
                        resultVinElement.innerText = '✅';

                        <?php
                        // Set background color for each VIN row based on existence in both tables
                        foreach ($vinFromDatabase as $vin) {
                        ?>

                        <?php
                        }
                        ?>
                    } else {
                        resultVinElement.innerText = '❌';

                        <?php
                        // Set background color for each VIN row based on existence in both tables
                        foreach (array_diff($vinFromPDF, $vinFromDatabase) as $vin) {
                        ?>
                            var VinElementPDF = document.getElementById('VinElementPDF_<?= array_search($vin, $vinFromPDF) + 1 ?>');
                            VinElementPDF.style.backgroundColor = 'red';
                        <?php
                        }
                        foreach (array_diff($vinFromDatabase, $vinFromPDF) as $vin) {
                        ?>
                            var VinElementDatabase = document.getElementById('VinElementDatabase_<?= array_search($vin, $vinFromDatabase) + 1 ?>');
                            VinElementDatabase.style.backgroundColor = 'red';
                        <?php
                        }
                        ?>
                    }
                });
            </script>



            @endif

            <script>
    document.addEventListener('DOMContentLoaded', function () {
        var resultVinElement = document.getElementById('AmountResult');
        var allVinsCorrect = true;

        <?php
            foreach ($data as $item) {
                $vinPDF = $seventhValues[array_search($item->vin, $vinFromPDF)]['value1'] ?? null;
        ?>
            var vinPDF = <?= json_encode($vinPDF) ?>;
            var vinDatabase = <?= json_encode($item->vin) ?>;

            if (vinPDF !== null && vinPDF !== vinDatabase) {
                allVinsCorrect = false;
                // Exit the loop early if any VIN is incorrect
                resultVinElement.innerText = '❌';

            }
        <?php
            }
        ?>

        if (allVinsCorrect) {
            // All VINs are correct, now check if all amounts are the same
            var allAmountsSame = true;

            <?php
                foreach ($data as $item) {
                    $amountPDF = $seventhValues[array_search($item->vin, $vinFromPDF)]['targetValue'] ?? null;
            ?>
                var amountPDF = <?= json_encode($amountPDF) !== null ? str_replace(',', '', json_encode($amountPDF)) : 'null' ?>;
                var amountDatabase = <?= json_encode($item->amount) ?>;

                if (amountPDF !== null && parseFloat(amountPDF) !== parseFloat(amountDatabase)) {
                    allAmountsSame = false;
                    // Exit the loop early if amounts are not the same
                    resultVinElement.innerText = '❌';

                }
            <?php
                }
            ?>

            if (allAmountsSame) {
                resultVinElement.innerText = '✅';
            }
        }
    });
</script>



            </div>
        </div>
    </div>
</div>

</x-app-layout>
