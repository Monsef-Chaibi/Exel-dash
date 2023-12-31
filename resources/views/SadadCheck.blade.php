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
            border: 2px rgb(255, 64, 50) solid;
            padding: 1.5%;
            border-radius: 10px;
            color: rgb(255, 50, 50);
            width: 300px
        }

        .warning2:hover {
            background: rgb(255, 50, 50);
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
            width: 50px;
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
        /* Styles for the hover effect */
.hover-container {
    position: relative;
    display: inline-block;
}

.hover-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    padding: 10px;
    z-index: 1;
    top: -30px; /* Adjust this value to increase the distance from the top */
    right: 100%; /* Adjust this value for the desired distance from the right */
    width: 300px;
}

.hover-container:hover .hover-content {
    display: block;
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
            );
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire(
                'Error',
                '{{ session('error') }}',
                'error'
            );
        </script>
    @endif

        @if (session()->has('success'))
            <script>
                Swal.fire(
                    'Success',
                    '{{ session('success') }}',
                    'success'
                );
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire(
                    'Error',
                    '{{ session('error') }}',
                    'error'
                );
            </script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- Add these lines to include DataTables CSS and JS files -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

        <div class="py-12">
            <div style="padding: 50px">
                <form id="exportForm" action="/SemiExportA" method="post">
                    @csrf
                    <input type="hidden" name="sadad" value="1">
                    <button style="color:rgb(103, 255, 103);font-size:30px" type="button" class="modal__btn" onclick="exportButtonClick()">Export &rarr;</button>
                    <br>
                    <button style="color:rgb(103, 255, 103);font-size:30px" type="button" class="modal__btn" onclick="selectDoneRows()">Select Rows with  ≠ Done &rarr;</button>

                    <div>
                    <br>

                    <br>
                        <input type="hidden" value="1" name="sadad">
                    {{-- <div style="text-align: center;color:#1eff00;display:flex;justify-content:center">
                        <input style="border-radius: 10px"  type="radio" value="Private" name='type'>
                        <label for="" style="margin-left:20px;margin-right:20px" >Private</label>
                        <input style="border-radius: 10px"  type="radio" value="Private Transfer" name='type'>
                        <label for=""  style="margin-left:20px;margin-right:20px">Private Transfer</label>
                        <input style="border-radius: 10px" type="radio" value="Public Transfer" name='type'>
                        <label for=""  style="margin-left:20px;margin-right:20px" >Public Transfer</label>
                    </div> --}}
                    <br>
                    <div style="display: flex;justify-content:right">
                       <!-- Add the input event listener to the search input field -->
                       <label for="" style="color:#1eff00;margin-right:10px">Filter By GT :</label>
                        <input style="border-radius: 10px; width: 300px;height:40px" type="text" id="gtNumberSearch" placeholder="Search by GT Number" oninput="filterGTNumbers()">

                    </div>
                    <table  style="width: 100%; font-size:18px "  class="rwd-table">
                        <thead>
                            <tr style="background-color: #1eff00; color:#d8e7f3" class="fr">
                                <th><button type="button" onclick="selectAll()">Select All</button></th>
                                <th>Product</th>
                                <th>Vin</th>
                                <th>GT Number</th>
                                <th>Billing Doc</th>
                                <th>Fee</th>
                                <th>Type</th>
                                <th>ID</th>
                                <th>Owner</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                                @csrf
                                {{$lop = 0 }}
                                @foreach ($data as $index => $item)
                                    <tr  id="row_{{ $item->id }}">
                                        <td data-th="Supplier Name">

                                            <span style="margin-right: 5px">{{ $lop +=1 }}</span>

                                            <input class="custom-checkbox" style="border-radius:5px"
                                            type="checkbox" name="selectedItems[]"
                                            value="{{ $item->id }}"
                                            >


                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->product }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->vin }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->gtnum }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            <a style="color: blue" href="/ShowForA1/{{encrypt($item->bildoc)}}">
                                                {{ $item->bildoc }}
                                            </a>
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->regist }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->paidtype }}
                                        </td>
                                        <td style="font-size: 18px" data-th="Supplier Code">
                                            {{ $item->idnum }}
                                        </td>
                                        <td style="font-size: 18px" data-th="Supplier Code">
                                            {{ $item->soldp }}
                                        </td>
                                        <td style="font-size: 18px;width:50px;text-align:center" data-th="Supplier Code">
                                            <div class="hover-container">
                                                <i class="fa fa-eye"></i>
                                                <div class="hover-content">
                                                     By : {{ $item->approvedby }}
                                                    <br>
                                                    IN : {{ $item->approveddate }}
                                                </div>
                                            </div>
                                        </td>

                                        <input type="hidden" name="doneItems[]" value="{{ $item->done }}">
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="10" style="text-align: center">
                                        The Number Of Selected : <span id="selectedCount">0</span>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <div style="display: flex;justify-content:center">
                        <button style="color:rgb(103, 255, 103);font-size:30px" type="button" class="modal__btn" onclick="doneButtonClick()">Done &rarr;</button>
                    </div>

                </form>
                </div>
            </div>
        </div>
        <script>

        function filterGTNumbers() {
            const gtNumberSearch = document.getElementById('gtNumberSearch').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            for (const row of rows) {
                const gtNumberCell = row.querySelector('td:nth-child(4)');
                const gtNumber = gtNumberCell.textContent.toLowerCase();

                if (gtNumber.includes(gtNumberSearch)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
             function selectDoneRows() {
                var checkboxes = document.getElementsByClassName('custom-checkbox');

                for (var i = 0; i < checkboxes.length; i++) {
                    const itemDoneValue = document.getElementsByName('doneItems[]')[i].value;

                    if (itemDoneValue !== '1') {
                        checkboxes[i].checked = true;
                    } else {
                        checkboxes[i].checked = false;
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
        function submitForm(action) {
    var form = document.getElementById('partialDeliveryForm');
    form.action = '/' + action; // Change the form action based on the button clicked

    if (action === 'SemiCopie') {
        // If the action is 'SemiCopie', show a confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: 'Once confirmed, the action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                // User clicked the confirm button, proceed with the action
                form.submit(); // Submit the form
            }
        });
    } else {
        // If the action is not 'SemiCopie', directly submit the form without confirmation
        form.submit(); // Submit the form
    }
}



        </script>
    </x-app-layout>

    <script>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Your JavaScript code -->
<script>
    function showConfirmationDialog(action) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Once confirmed, the action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user clicks "Yes, proceed!", handle the form submission
                handleFormSubmission(action);
            }
        });
    }

    function handleFormSubmission(action) {
        // Set the action as a hidden input field in the form
        const form = document.getElementById('confirmationForm');
        const actionInput = document.createElement('input');
        actionInput.type = 'hidden';
        actionInput.name = 'confirmation_action';
        actionInput.value = action;
        form.appendChild(actionInput);

        // Submit the form
        form.submit();
    }
</script>
<script>
    function exportButtonClick() {
        Swal.fire({
            title: 'Export Confirmation',
            text: 'Are you sure you want to export?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, export!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, submit the form
                document.getElementById('exportForm').submit();
            }
        });
    }

    function doneButtonClick() {
    // Show input prompt
    Swal.fire({
        title: 'Done Confirmation',
        html: '<input type="text" id="inputValue" class="swal2-input" placeholder="Enter Reference" required>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, mark as done!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Retrieve the input value
            var inputValue = document.getElementById('inputValue').value;

            // Check if the input value is empty
            if (!inputValue.trim()) {
                Swal.fire('Input Required', 'Please enter a reference.', 'error');
                return;
            }

            // Update the form action and add the input value to the form data
            var form = document.getElementById('exportForm');
            form.action = '/done';

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'reference';
            input.value = inputValue;

            form.appendChild(input);

            // Submit the form
            form.submit();
        }
    });
}


</script>
