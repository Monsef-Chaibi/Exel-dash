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

                @if (!empty($valuesToExtract) || !empty($data))

                <h1 style="text-align: center; font-size:30px">Result</h1>
                <div style="display: flex;justify-content:center">
                    <table id="result" style="text-align: center;margin-top:20px">
                        <tr class="fr">
                            <td style="width: 200px"> P.O Number </td>
                            <td style="width: 200px">Vin</td>
                            <td style="width: 200px">Color</td>
                            <td style="width: 200px">Amount</td>
                            <td style="width: 200px">Total</td>
                        </tr>
                        <tr>
                            <td id='resultOrder' style="width: 200px;height:100px"></td>
                            <td id='resultVin' style="width: 200px;height:100px"></td>
                            <td id='resultColor' style="width: 200px;height:100px"></td>
                            <td id='resultAmount' style="width: 200px;height:100px"></td>
                            <td id='resultTotal' style="width: 200px;height:100px"></td>
                        </tr>
                    </table>
                </div>

                <div style="display: flex;justify-content:center">
                    <table style="width: 40%; margin-bottom:5%; margin-top:2%;border-radius:10px" class="rwd-table">
                        <thead>
                            <tr class="fr">
                                <th colspan="2">From PDF</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <td colspan="2" style="background-color: white;color:black;height:30px;border:1px solid gray">
                                P.O Number : {{ $valuesToExtract[0]['title'] }}
                            </td>
                            <input type="hidden" value="{{$count1 = 0 }}">
                            @php
                                $pdfDataMap = [];
                                $pdfVins = [];
                                foreach ($valuesToExtract as $extractedValue) {
                                    $pdfDataMap[$extractedValue['value1']] = $extractedValue;
                                    $pdfVins[] = $extractedValue['value1'];
                                }
                                $databaseVins = $data->pluck('vin')->toArray();
                            @endphp

@foreach ($valuesToExtract as $item)
<tr class="vin-row {{ in_array($item['value1'], $pdfVins) && in_array($item['value1'], $databaseVins) ? 'vin-exists-in-pdf-and-database' : (in_array($item['value1'], $pdfVins) ? 'vin-exists-in-pdf' : 'notfound') }}">
    <td style="width:300px;color:black;height:30px;border:1px solid gray">
        <span style="color:#15b700">{{$count1 += 1 }}</span> VIN: {{ $item['value1'] }}
    </td>
    <td style="color:black;height:30px;border:1px solid gray">
        Amount : <span id="amount-{{ $item['value1'] }}"></span>
    </td>
</tr>
@endforeach
                        </tbody>
                    </table>

                    <table style="width: 40%; margin-bottom:5%; margin-top:2%;border-radius:10px" class="rwd-table">
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
                            @php
                                $pdfDataMap = [];
                                foreach ($valuesToExtract as $extractedValue) {
                                    $pdfDataMap[$extractedValue['value1']] = $extractedValue;
                                }
                                $pdfVins = array_keys($pdfDataMap);
                            @endphp

                            @foreach ($data as $item)
                            <tr class="vin-row {{ in_array($item->vin, $pdfVins) ? (in_array($item->vin, $databaseVins) ? 'vin-exists-in-pdf-and-database' : 'vin-exists-in-pdf') : 'vin-not-found' }}">
                                <td style="width:300px;color:black;height:30px;border:1px solid gray">
                                    <span style="color:#15b700">{{$count += 1 }}</span> VIN : {{ $item->vin }}
                                </td>
                                <td style="color:black;height:30px;border:1px solid gray">
                                    Amount : {{ number_format($item->amount, 2, '.', ',') }}
                                    <input type="hidden" value="{{$total +=  $item->amount}}">
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{-- Check if all VINs from PDF table exist in Database table --}}
                @php
                    $allVinsExist = count($pdfVins) == count($databaseVins) && count(array_diff($pdfVins, $databaseVins)) == 0;
                @endphp

                {{-- Check if {{ $valuesToExtract[0]['title'] }} equals {{ $order }} --}}
                @php
                    $isTitleEqualOrder = $valuesToExtract[0]['title'] == $order;
                @endphp

<script>


    var resultVinCell = document.getElementById('resultVin');
    var resultOrderCell = document.getElementById('resultOrder');
    var resultColorCell = document.getElementById('resultColor');
    var resultAmountCell = document.getElementById('resultAmount');
    var resultTotalCell = document.getElementById('resultTotal');

    resultVinCell.textContent = '{{ $allVinsExist ? '✅' : '❌' }}';
    resultOrderCell.textContent = '{{ $isTitleEqualOrder ? '✅' : '❌' }}';
    resultColorCell.textContent = '{{ $allVinsExist ? '✅' : '❌' }}';

    // Check if allVinsExist is true
    if ('{{ $allVinsExist }}' == '1') {
        // Get the first Amount value from the $data collection
        var firstAmount = '{{ $data->first()->amount }}';

        // Format the amount with commas and decimals
        var formattedAmount = parseFloat(firstAmount).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        // Loop through each row in the "From PDF" table
        @foreach($valuesToExtract as $item)
            // Get the VIN value from the current row
            var currentVin = '{{ $item['value1'] }}';

            // Set the amount value for the current row in the "From PDF" table
            var amountSpan = document.getElementById('amount-' + currentVin);
            if (amountSpan) {
                amountSpan.textContent = formattedAmount;
            }

            // Add console.log statements to check the values
            console.log('Current VIN:', currentVin);
            console.log('VIN Exists in PDF:', {{ in_array($item['value1'], $pdfVins) ? 'true' : 'false' }});
            console.log('VIN Exists in Database:', {{ in_array($item['value1'], $databaseVins) ? 'true' : 'false' }});
            console.log('Conditions Met:', {{ in_array($item['value1'], $pdfVins) && in_array($item['value1'], $databaseVins) ? 'true' : 'false' }});
        @endforeach

        // Set the amount value in the Result table
        resultAmountCell.textContent = '✅';

        // Get the total value and format it
        var totalValue = '{{ $total }}';
        var formattedTotal = parseFloat(totalValue).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        // Set the total value in the Result table
        resultTotalCell.textContent = `${formattedTotal} ✅`;

    } else {
        // Set the default values if allVinsExist is false
        resultAmountCell.textContent = '❌ ';
        resultTotalCell.textContent = '❌';
    }
</script>



            @endif




            </div>
        </div>
    </div>
</div>
    <script>
        var isAdvancedUpload = function() {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

let draggableFileArea = document.querySelector(".drag-file-area");
let browseFileText = document.querySelector(".browse-files");
let uploadIcon = document.querySelector(".upload-icon");
let dragDropText = document.querySelector(".dynamic-message");
let fileInput = document.querySelector(".default-file-input");
let cannotUploadMessage = document.querySelector(".cannot-upload-message");
let cancelAlertButton = document.querySelector(".cancel-alert-button");
let uploadedFile = document.querySelector(".file-block");
let fileName = document.querySelector(".file-name");
let fileSize = document.querySelector(".file-size");
let progressBar = document.querySelector(".progress-bar");
let removeFileButton = document.querySelector(".remove-file-icon");
let uploadButton = document.querySelector(".upload-button");
let fileFlag = 0;




'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));
    </script>
</x-app-layout>
