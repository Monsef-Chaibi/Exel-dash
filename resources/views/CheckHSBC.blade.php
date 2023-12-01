<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        .upload-button {
            font-family: 'Montserrat';
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
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
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background: linear-gradient(135deg, #9b59b6, #71b7e6);
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
            color: #1eff00;
            /* Set default text color */
            transition: background-color 0.3s, color 0.3s;
            /* Add smooth transition effect */
        }

        .button:hover {
            background-color: #1eff00;
            /* Change background color on hover */
            color: black;
            /* Change text color on hover */
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .rwd-table {
            margin: auto;
            width: 500px;
            min-width: 300px;
            max-width: 100%;
            border-collapse: collapse;
        }

        .fr {
            border-top: none;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            color: #fff;

        }

        .rwd-table tr {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            background-color: #f5f9fc;
        }



        .rwd-table tr:nth-child(odd):not(:first-child) {
            background-color: #ebf3f9;
        }

        .rwd-table th {
            display: none;
        }

        .rwd-table td {
            display: block;
        }

        .rwd-table td:first-child {
            margin-top: .5em;
        }

        .rwd-table td:last-child {
            margin-bottom: .5em;
        }

        .rwd-table td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 20px;
            display: inline-block;
            color: #000;
        }

        .rwd-table th,
        .rwd-table td {
            text-align: left;
        }

        .rwd-table {
            color: #333;
            border-radius: .4em;
            overflow: hidden;
        }

        .rwd-table tr {
            border-color: #bfbfbf;
        }

        .rwd-table th,
        .rwd-table td {
            padding: .5em 1em;
        }

        @media screen and (max-width: 601px) {
            .rwd-table tr:nth-child(2) {
                border-top: none;
            }

            .grid-item {
                background-color: rgba(255, 255, 255, 0.8);
                border: 1px solid rgba(0, 0, 0, 0.8);
                font-size: 30px;
                text-align: center;
                padding: 2%;
                width: 300px;
                height: 80px;
                text-align: start
            }
        }

        @media screen and (min-width: 600px) {
            .rwd-table tr:hover:not(:first-child) {
                background-color: #d8e7f3;

            }

            .rwd-table td:before {
                display: none;
            }

            .rwd-table th,
            .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }

            .rwd-table th:first-child,
            .rwd-table td:first-child {
                padding-left: 0;
            }

            .rwd-table th:last-child,
            .rwd-table td:last-child {
                padding-right: 0;
            }

            .rwd-table th,
            .rwd-table td {
                padding: 1em !important;
            }

        }
    </style>\
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    @if (session()->has('error'))
        <script>
            Swal.fire(
                'Error',
                '{{ session('error') }}',
                'error'
            )
        </script>
    @endif

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
                    <h1 style="text-align: center;color:#1eff00;font-size:25px;font-weight:bold">Check HSBC Sheet</h1>
                    <br>
                    <form class="form-container" action="{{ url('/importHSBC') }}" method="POST"
                        enctype='multipart/form-data'>
                        @csrf
                        <label for="images" class="drop-container" id="dropcontainer">
                            <span class="drop-title">Drop files here</span>
                            or
                            <input class="btn" type="file" name="file" id="images" required>
                        </label>
                        <button type="submit" class="upload-button"> Upload </button>
                </div>
                </form>
                @if (isset($importedData))
                    <div style="text-align: center;">
                        <table style="width: 90%; font-size: 20px; text-align: center; margin: 0 auto;">
                            <thead>
                                <tr style="height:60px" class="fr">
                                    {{-- <th><button type="button" onclick="selectAll()">Select All</button></th> --}}
                                    <td colspan="4">Product</td>
                                    <td>GT Number</td>
                                    <td>Fee</td>
                                    <td>ID</td>
                                    <td>Approved&Up</td>
                                    <td>No-duplicated</td>
                                    <td>Reject Reason</td>
                                </tr>
                            </thead>
                            <form action="/HSBCPassed" method="get">
                                <tbody style="background-color: gray">
                                    @csrf
                                    {{ $lop = 0 }}
                                    @foreach ($importedData as $item)
                                        <tr style="border: 2px solid #d8e7f3; height:60px; background-color:
                                            @if ($item['status'] === 1) #288b00;
                                            @elseif($item['status'] === 2)
                                                #f4ff37;
                                            @else
                                                #cc2500; @endif"
                                            id="row_{{ $item['id'] }}">
                                            <td colspan="4" data-th="Supplier Code">
                                                {{ $item['product'] }}
                                            </td>

                                            <td data-th="Supplier Code">
                                                {{ $item['gtnum'] }}
                                                <input type="hidden" value="{{ $item['gtnum'] }}" name="gtnum[]">
                                            </td>
                                            <td data-th="Supplier Code">
                                                {{ $item['regist'] }}
                                                @if ($item['sameregist'] === 1)
                                                    ✅
                                                @else
                                                    ❌
                                                @endif
                                            </td>
                                            <td data-th="Supplier Code">
                                                {{ $item['idnum'] }}
                                                @if ($item['sameid'] === 1)
                                                    ✅
                                                @else
                                                    ❌
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if ($item['aproved'] === 1 && $item['uploaded'] === 1)
                                                    ✅
                                                @else
                                                    ❌
                                                @endif
                                            </td>
                                            <td style="text-align:center">
                                                @if ($item['paid'] === 1)
                                                    ✅
                                                @else
                                                    ❌
                                                @endif
                                            </td>
                                            <td style="font-size: 15px;width:250px">
                                                {{ $item['reason'] }}
                                                <input type="hidden" value="{{ $item['reason'] }}" name="reason[]">
                                            </td>

                                            <input type="hidden" value="{{ $item['status'] }}" name="status[]">
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button style="font-size: 30px; margin-top: 10px; color: @if(!$isButtonActive) gray @else rgb(103, 255, 103) @endif"
                                    type="submit" class="modal__btn" @if(!$isButtonActive) disabled @endif>
                                Save &rarr;
                            </button>

                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>
    </div>
    <script>
        var isAdvancedUpload = function() {
            var div = document.createElement('div');
            return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window &&
                'FileReader' in window;
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

        ;
        (function(document, window, index) {
            var inputs = document.querySelectorAll('.inputfile');
            Array.prototype.forEach.call(inputs, function(input) {
                var label = input.nextElementSibling,
                    labelVal = label.innerHTML;

                input.addEventListener('change', function(e) {
                    var fileName = '';
                    if (this.files && this.files.length > 1)
                        fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}',
                            this.files.length);
                    else
                        fileName = e.target.value.split('\\').pop();

                    if (fileName)
                        label.querySelector('span').innerHTML = fileName;
                    else
                        label.innerHTML = labelVal;
                });

                // Firefox bug fix
                input.addEventListener('focus', function() {
                    input.classList.add('has-focus');
                });
                input.addEventListener('blur', function() {
                    input.classList.remove('has-focus');
                });
            });
        }(document, window, ));
    </script>
</x-app-layout>
