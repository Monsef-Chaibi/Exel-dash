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
                    <table id="result" style="text-align: center;margin-top:20px" >
                        <tr class="fr">
                            <td style="width: 200px">Vin</td>
                            <td style="width: 200px">Amount</td>
                            <td style="width: 200px">Total</td>
                        </tr>

                        <tr >
                            <td  id='resultVin' style="width: 200px;height:100px"></td>
                            <td style="width: 200px">❌</td>
                            <td style="width: 200px">❌</td>
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
                                Order Number : {{ $valuesToExtract[0]['title'] }}
                            </td>
                            @php
                                $pdfDataMap = [];
                                foreach ($valuesToExtract as $extractedValue) {
                                    $pdfDataMap[$extractedValue['value1']] = $extractedValue;
                                }
                            @endphp
                            @foreach ($pdfDataMap as $vin => $extractedValue)
                                <tr>
                                    <td style="width:300px;background-color: white;color:black;height:30px;border:1px solid gray">
                                        VIN : {{ $vin }}
                                    </td>
                                    <td style="background-color: white;color:black;height:30px;border:1px solid gray">Fee : 000</td>
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
                                Order Number : {{ $order }}
                            </td>

                            @foreach ($data as $item)
                                <tr>
                                    <td style="width:300px;background-color: white;color:black;height:30px;border:1px solid gray">
                                        VIN : {{ $item->vin }}
                                    </td>
                                    <td style="background-color: white;color:black;height:30px;border:1px solid gray">
                                        Fee :{{ $item->regist }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Check if all VINs from PDF table exist in Database table --}}
                @php
                    $pdfVins = array_keys($pdfDataMap);
                    $databaseVins = $data->pluck('vin')->toArray();
                    $allVinsExist = count(array_diff($pdfVins, $databaseVins)) == 0;
                @endphp

                {{-- Set result in the Result table --}}
                <script>
                    var resultVinCell = document.getElementById('resultVin');

                    resultVinCell.textContent = '{{ $allVinsExist ? '✅' : '❌' }}';
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

fileInput.addEventListener("click", () => {
	fileInput.value = '';
	console.log(fileInput.value);
});
/*
	By Mushfiq Shishir, hello@mrshishir.me, www.mrshishir.me
*/

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
