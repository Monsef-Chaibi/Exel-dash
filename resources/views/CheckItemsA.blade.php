<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        @media only screen and (max-width: 979px) {
            .ag-courses_item {
                -ms-flex-preferred-size: calc(50% - 30px);
                flex-basis: calc(50% - 30px);
            }

            .ag-courses-item_title {
                font-size: 24px;
            }
        }

        @media only screen and (max-width: 767px) {
            .ag-format-container {
                width: 96%;
            }

        }

        @media only screen and (max-width: 639px) {
            .ag-courses_item {
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
            }

            .ag-courses-item_title {
                min-height: 72px;
                line-height: 1;

                font-size: 24px;
            }

            .ag-courses-item_link {
                padding: 22px 40px;
            }

            .ag-courses-item_date-box {
                font-size: 16px;
            }
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
            width: 120px;
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

        .grid-container {
            display: grid;
            grid-template-columns: 1fr auto;
            /* Changed this line */
            padding: 20px;
            gap: 10px;
            justify-content: center;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.353);
            font-size: 30px;
            text-align: center;
            padding: 2%;
            width: 500px;
            height: 80px;
            text-align: start;
            border-radius: 10px
        }

        .tt {
            display: flex;
            justify-content: center;
            font-size: 30px;
            padding: 2%;

        }

        .in {
            border-radius: 20px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);

        }

        .btnstatus {
            display: flex;
            justify-content: center;
            gap: 80px;
        }

        .success {
            border: 2px #FC766AFF solid;
            padding: 5%;
            border-radius: 10px;
            color: #FC766AFF;
            width: 300px
        }

        .success:hover {
            background-color: #FC766AFF;
            color: white;
            border: 2px white solid;
        }

        .warning2 {
            border: 2px rgb(224, 255, 50) solid;
            padding: 5%;
            border-radius: 10px;
            color: rgb(224, 255, 50);
            width: 300px
        }

        .warning2:hover {
            background: rgb(224, 255, 50);
            color: black;
            border: 2px white solid;
        }

        .warning1 {
            border: 2px #5B84B1FF solid;
            padding: 5%;
            border-radius: 10px;
            color: #5B84B1FF;
            width: 300px
        }

        .warning1:hover {
            background: #5B84B1FF;
            color: black;
            border: 2px white solid;
        }

        .warning {
            border: 2px rgb(55, 192, 117) solid;
            padding: 1.5%;
            border-radius: 10px;
            color: rgb(55, 192, 117);
            width: 300px
        }

        .warning:hover {
            background: rgb(55, 192, 117);
            color: black;
            border: 2px white solid;
        }

        .tableuser {
            font-size: 25px;
        }

        /* CSS */
        .button-28 {
            appearance: none;
            background-color: transparent;
            border: 2px solid #1A1A1A;
            border-radius: 15px;
            box-sizing: border-box;
            color: #3B3B3B;
            cursor: pointer;
            display: inline-block;
            font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 16px;
            font-weight: 600;
            line-height: normal;
            margin: 0;
            min-height: 60px;
            min-width: 0;
            outline: none;
            padding: 16px 24px;
            text-align: center;
            text-decoration: none;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: 100%;
            will-change: transform;
        }

        .button-28:disabled {
            pointer-events: none;
        }

        .button-28:hover {
            color: #fff;
            background-color: #1A1A1A;
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);
        }

        .button-28:active {
            box-shadow: none;
            transform: translateY(0);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <!-- Include SweetAlert2 CSS and JS from CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
    // Display SweetAlert2 success message
    @if (session()->has('success'))
        Swal.fire({
            title: 'Success',
            text: '{{ session('success') }}',
            icon: 'success',
        });
    @endif

    // Display SweetAlert2 error message
    @if (session()->has('error'))
        Swal.fire({
            title: 'Error',
            text: '{{ session('error') }}',
            icon: 'error',
        });
    @endif

    // Reload the page after 2 seconds if success
    @if (session('success'))
        setTimeout(function() {
            location.reload();
        }, 2000);
    @endif
</script>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div>
                    <button style="color: #1eff00;" type="button" class="btn btn-primary" onclick="selectUnprinted()">Select Unprinted Only</button>
                    <table style="width: 100%; margin-bottom:5%; margin-top:2%" class="rwd-table">
                        <thead>
                            <tr style="background-color: #1eff00; color:#d8e7f3" class="fr">
                                <th><button onclick="selectAll()">Select All</button></th>
                                <th>Plant Key</th>
                                <th>Sold to party</th>
                                <th>Ship To party</th>
                                <th>Product</th>
                                <th>Vin</th>
                                <th>Billing Doc</th>
                                <th>Printed</th>
                            </tr>
                        </thead>

                        <tbody>
                            <form action="/SemiExportGT">
                                @csrf
                                {{$lop = 0 }}
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td data-th="Supplier Name">

                                            <span style="margin-right: 5px">{{ $lop +=1 }}</span>

                                            <input class="custom-checkbox" style="border-radius:5px"
                                            type="checkbox" name="selectedItems[]"
                                            value="{{ $item->id }}">

                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->plantkey }}
                                        </td>
                                        <td data-th="Supplier Name">
                                            {{ $item->soldp }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->shipp }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->product }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->vin }}
                                        </td>

                                        <td data-th="Supplier Code">
                                            <a style="color: blue" href="/Show/{{encrypt($item->bildoc)}}">
                                                {{ $item->bildoc }}
                                            </a>
                                        </td>
                                        <td style="text-align: center">
                                            @if ($item->printed === '1')
                                                ✅
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="8" style="text-align: center">
                                        The Number Of Selected : <span id="selectedCount">0</span>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <div class="btnstatus">
                        <button type="submit" class="warning" >
                            Export
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>


    </x-app-layout>

    <script>
 var data = @json($data);

function selectUnprinted() {
    var checkboxes = document.getElementsByClassName('custom-checkbox');

    for (var i = 0; i < checkboxes.length; i++) {
        const item = data[i];
        if (item && item.printed !== '1') {
            checkboxes[i].checked = !checkboxes[i].checked; // Toggle the checkbox state
        }
    }
}


        function selectAll() {
             var checkboxes = document.getElementsByClassName('custom-checkbox');
             var allChecked = true;

             for (var i = 0; i < checkboxes.length; i++) {
                 if (!checkboxes[i].checked) {
                     allChecked = false;
                     break;
                 }
             }

             for (var i = 0; i < checkboxes.length; i++) {
                 checkboxes[i].checked = !allChecked;
             }
         }
         function selectAllpop() {
             var checkboxes = document.getElementsByClassName('custom-');
             var allChecked = true;

             for (var i = 0; i < checkboxes.length; i++) {
                 if (!checkboxes[i].checked) {
                     allChecked = false;
                     break;
                 }
             }

             for (var i = 0; i < checkboxes.length; i++) {
                 checkboxes[i].checked = !allChecked;
             }
         }
         document.addEventListener('DOMContentLoaded', function () {
         // Get all checkboxes with the name 'selectedItems[]'
         const checkboxes = document.querySelectorAll('input[name="selectedItems[]"]');

         // Get the 'Select All' button
         const selectAllButton = document.querySelector('button[onclick="selectAll()"]');

         // Add a click event listener to the 'Select All' button
         selectAllButton.addEventListener('click', updateSelectedCount);

         // Add a change event listener to each checkbox
         checkboxes.forEach(function (checkbox) {
             checkbox.addEventListener('change', updateSelectedCount);
         });

         // Function to update the selected count in the span
         function updateSelectedCount() {
             const selectedCheckboxes = document.querySelectorAll('input[name="selectedItems[]"]:checked');
             document.getElementById('selectedCount').innerText = selectedCheckboxes.length;
         }
     });
 </script>
