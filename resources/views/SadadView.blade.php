<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        .ag-format-container {
            width: 1142px;
            margin: 0 auto;
        }


        body {
            background-color: #000;
        }

        .ag-courses_box {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;

            padding: 50px 0;
        }

        .ag-courses_item {
            -ms-flex-preferred-size: calc(33.33333% - 30px);
            flex-basis: calc(33.33333% - 30px);

            margin: 0 15px 30px;

            overflow: hidden;

            border-radius: 28px;
        }

        .ag-courses-item_link {
            display: block;
            padding: 30px 20px;
            background-color: #121212;

            overflow: hidden;

            position: relative;
        }

        .ag-courses-item_link:hover,
        .ag-courses-item_link:hover .ag-courses-item_date {
            text-decoration: none;
            color: #FFF;
        }

        .ag-courses-item_link:hover .ag-courses-item_bg {
            -webkit-transform: scale(10);
            -ms-transform: scale(10);
            transform: scale(10);
        }

        .ag-courses-item_title {
            min-height: 87px;
            margin: 0 0 25px;

            overflow: hidden;

            font-weight: bold;
            font-size: 30px;
            color: #FFF;

            z-index: 2;
            position: relative;
        }

        .ag-courses-item_date-box {
            font-size: 18px;
            color: #FFF;

            z-index: 2;
            position: relative;
        }

        .ag-courses-item_date {
            font-weight: bold;
            color: #f9b234;

            -webkit-transition: color .5s ease;
            -o-transition: color .5s ease;
            transition: color .5s ease
        }

        .ag-courses-item_bg {
            height: 128px;
            width: 128px;
            background-color: #4c49ea;

            z-index: 1;
            position: absolute;
            top: -75px;
            right: -75px;

            border-radius: 50%;

            -webkit-transition: all .5s ease;
            -o-transition: all .5s ease;
            transition: all .5s ease;
        }

        .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
            background-color: #e44002;
        }

        .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
            background-color: #e44002;
        }

        .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
            background-color: #952aff;
        }

        .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
            background-color: #cd3e94;
        }

        .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
            background-color: #4c49ea;
        }



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

        /* CSS */
        .button-32 {
            background-color: #1eff00;
            border-radius: 12px;
            color: #000;
            cursor: pointer;
            font-weight: bold;
            padding: 10px 15px;
            text-align: center;
            transition: 200ms;
            width: 100%;
            box-sizing: border-box;
            border: 0;
            font-size: 16px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-32:not(:disabled):hover,
        .button-32:not(:disabled):focus {
            outline: 0;
            background: #1eff00;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, .2), 0 3px 8px 0 rgba(0, 0, 0, .15);
        }

        .button-32:disabled {
            filter: saturate(0.2) opacity(0.5);
            -webkit-filter: saturate(0.2) opacity(0.5);
            cursor: not-allowed;
        }

        /* CSS */
        .button-37 {
            background-color: #13aa52;
            border: 1px solid #13aa52;
            border-radius: 4px;
            box-shadow: rgba(0, 0, 0, .1) 0 2px 4px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            font-family: "Akzidenz Grotesk BQ Medium", -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 16px;
            font-weight: 400;
            outline: none;
            outline: 0;
            padding: 10px 25px;
            text-align: center;
            transform: translateY(0);
            transition: transform 150ms, box-shadow 150ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-37:hover {
            box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
            transform: translateY(-2px);
        }

        @media (min-width: 768px) {
            .button-37 {
                padding: 10px 30px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">

    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Success',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire(
                'Error',
                '{{ session('error') }}',
                'error'
            )
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 style="text-align:center;color:#1eff00;font-size:25px;padding:10px;  font-weight: bold;">SADAD</h1>
                <div class="text-gray-900 dark:text-gray-100">


                    <div class="ag-format-container">
                        <div class="ag-courses_box">

                            <div class="ag-courses_item">
                                <a href="/SadadCheck" class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>

                                    <div class="ag-courses-item_title">
                                        Sadad Approved : <span id="vl"></span>
                                    </div>

                                    <div class="ag-courses-item_date-box">
                                        Last Update :
                                        <span id="dt" class="ag-courses-item_date">

                                        </span>
                                    </div>

                                </a>
                            </div>
                            <div class="ag-courses_item">
                                <a href="/SadadSent" class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>

                                    <div class="ag-courses-item_title">
                                        Sadad Sent : <span id="vl1"></span>
                                    </div>

                                    <div class="ag-courses-item_date-box">
                                        Last Update :
                                        <span id="dt1" class="ag-courses-item_date">

                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="ag-courses_item">
                                <a href="/SadadRejct" SadadCheck class="ag-courses-item_link">
                                    <div class="ag-courses-item_bg"></div>

                                    <div class="ag-courses-item_title">
                                        Sadad Rejected: <span id="vl2"></span>
                                    </div>

                                    <div class="ag-courses-item_date-box">
                                        Last Update :
                                        <span id="dt2" class="ag-courses-item_date">

                                        </span>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                    <form class="form-container" action="/importSadad" method="post" enctype='multipart/form-data'>
                        @csrf
                        <label for="" style="margin-left: 10px; color:#1eff00;padding:20px">Import Sadad File
                            :</label>
                        <input type="file" name="file" style="border-radius:10px;width:350px">
                        <button class="button-37" type="submit"> Done </button>
                    </form>

                    @if (isset($importedData))

                        <form action="/Sadad" id="" method="get">
                             @csrf
                            <table style="width: 600px; margin-bottom:5%; margin-top:2%;" class="rwd-table">
                                <thead>
                                    <tr class="fr">
                                        <th><button type="button" onclick="selectAllpop()">Select All</button></th>
                                        <th>Product</th>
                                        <th>VIN</th>
                                        <th>GT Number</th>
                                        <th>Registration</th>
                                        <th>ID</th>

                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($importedData as $item)
                                        <tr>
                                            <td data-th="Supplier Name">
                                                <input class="custom-" style="border-radius:5px" type="checkbox"
                                                    name="selectedItems[]" value="{{ $item['id'] }}">
                                            </td>
                                            <td data-th="Supplier Name">
                                                {{ $item['product'] }}
                                            </td>
                                            <td data-th="Supplier Code">
                                                {{ $item['vin'] }}
                                            </td>
                                            <td data-th="Supplier Code">
                                                {{ $item['gtnum'] }}
                                            </td>
                                            <td data-th="Supplier Code">
                                                {{ $item['regist'] }}
                                            </td>
                                            <td data-th="Supplier Code">
                                                {{ $item['idnum'] }}
                                            </td>

                                            <input type="hidden" name="paid" value="{{ $item['paid'] }}">

                                            @if ($item['paid'] === '1')
                                                <td style="color: blue" data-th="Supplier Code">
                                                    Sent
                                                </td>
                                            @elseif ($item['paid'] === '2')
                                                <td style="color: rgb(38, 255, 38)" data-th="Supplier Code">
                                                    Accepted
                                                </td>
                                            @elseif ($item['paid'] === '3')
                                                <td style="color: red" data-th="Supplier Code">
                                                    Rejected
                                                </td>
                                            @else
                                                <td data-th="Supplier Code">

                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table style="font-size:20px; margin-left:20px;text-align:center;margin-bottom:50px">
                                <tr>
                                    <td style="width:400px">
                                        <p>There are vehicle plate fees</p>
                                    </td>
                                    <td style="width:700px;text-align:left">
                                        <span id="plateFeesCheck"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:400px">
                                        <p>The fee amount is correct </p>
                                    </td>
                                    <td style="width:700px;text-align:left">
                                        <span id="amountCheck"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:400px">
                                        <p>The request is not used</p>
                                    </td>
                                    <td style="width:700px;text-align:left">
                                        <span id="requestCheck"></span>
                                    </td>
                                </tr>
                            </table>
                            </p>



                            <button type="submit" style="font-size:50px;margin-left:60px" id="submitButton"
                                disabled>Save &rarr;</button>

                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        function updateLiveValue1() {
            $.ajax({
                url: "{{ route('Sadadlive') }}",
                method: "GET",
                success: function(data) {
                    $('#vl').text(data.value);
                    $('#dt').text(data.up);
                    $('#vl1').text(data.value2);
                    $('#dt1').text(data.up2);
                    $('#vl2').text(data.value3);
                    $('#dt2').text(data.up3);

                }
            });
        }

        // Update live value initially
        updateLiveValue1();

        // Update live value every 5 seconds (adjust this interval as needed)
        setInterval(updateLiveValue1, 5000);
    });

    $(document).ready(function () {
     // Event handler for checkbox changes
     $('input[type="checkbox"]').change(function () {
         updateChecks();
     });

     // Initial check on page load
     updateChecks();
 });

 function updateChecks() {
     // Reset checks
     $('#plateFeesCheck').text('');
     $('#amountCheck').text('');
     $('#requestCheck').text('');

     // Get selected items
     var selectedItems = $('input[name="selectedItems[]"]:checked');
     var failedRegistrationGTNumbers = [];
     var failedPaidGTNumbers = [];

     // Check 1: Registration column > 1
     var registrationGreaterThanOne = selectedItems.filter(':checked').filter(function () {
         var registrationValue = $(this).closest('tr').find('td:eq(4)').text();
         var gtNumber = $(this).closest('tr').find('td:eq(3)').text();

         if (registrationValue !== '' && parseInt(registrationValue) > 1) {
             return true;
         } else {
             failedRegistrationGTNumbers.push(gtNumber);
             return false;
         }
     }).length === selectedItems.filter(':checked').length;

     // Check 2: Sum of Registration column > 1000
     var sumOfRegistration = 0;
     selectedItems.each(function () {
         sumOfRegistration += parseInt($(this).closest('tr').find('td:eq(4)').text());
     });
     var sumGreaterThan1000 = sumOfRegistration >= 1;

     // Check 3: Paid column different than 1 and 2
     var paidTypesValid = selectedItems.filter(':checked').filter(function () {
         var paidValue = $(this).closest('tr').find('input[name="paid"]').val();
         var gtNumber = $(this).closest('tr').find('td:eq(3)').text();

         if (paidValue !== '1' && paidValue !== '2') {
             return true;
         } else {
             failedPaidGTNumbers.push(gtNumber);
             return false;
         }
     }).length === selectedItems.filter(':checked').length;

     // Update check messages
     $('#plateFeesCheck').text(registrationGreaterThanOne ? '✅' : '❌ GT Numbers: ' + failedRegistrationGTNumbers.join(', '));
     $('#amountCheck').text(sumGreaterThan1000 ? '✅' : '❌');
     $('#requestCheck').text(paidTypesValid ? '✅' : '❌ GT Numbers: ' + failedPaidGTNumbers.join(', '));

     // Enable or disable submit button based on checks
     var allChecksPassed = registrationGreaterThanOne && sumGreaterThan1000 && paidTypesValid;
     $('#submitButton').prop('disabled', !allChecksPassed);

     // Change button color and set opacity based on checks
     if (allChecksPassed) {
         $('#submitButton').css({
             'color': '', // Set default color
             'opacity': 1 // Set default opacity
         });
     } else {
         $('#submitButton').css({
             'color': 'gray',
             'opacity': 0.5 // Set opacity to 50% when checks fail
         });
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
</script>
