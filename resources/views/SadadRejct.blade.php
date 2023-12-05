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
            height: 60px;
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

        .upload {
            color: #1eff00;
            border: 2px solid #1eff00;
        }

        .upload:hover {
            background-color: #1eff00;
            color: white;
            border: 2px solid white;
        }

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form id="uploadForm" action="/reupload" method="get">
                <h2 style="color:#1eff00;">Re-upload A Rejected Payment Manual </h2>
                <br>
                <label style="color:#1eff00;" for="gtNumber">GT Number :</label>
                <input name="gtnum" type="text" id="gtNumber" style="border-radius: 10px; margin-left:15px">

                <label style="color:#1eff00;" for="oldReference">Old Reference :</label>
                <input readonly name="old"  type="text" id="old" style="border-radius: 10px; margin-left:15px">

                <label style="color:#1eff00;" for="newReference">New Reference :</label>
                <input name="new" required type="text" id="newReference" style="border-radius: 10px; margin-left:15px">

                <button id="submitBtn" class="upload" type="submit" style="width: 100px; border-radius:10px; margin-left:30px; display: none;">
                    Upload
                </button>
            </form>

            <script>
               document.addEventListener('DOMContentLoaded', function () {
    const gtNumberInput = document.getElementById('gtNumber');
    const oldInput = document.getElementById('old'); // Assuming you have an input field with ID 'old'
    const submitBtn = document.getElementById('submitBtn');

    gtNumberInput.addEventListener('input', function () {
        const gtNumberValue = this.value;

        // Make an AJAX request to check the database
        fetch('/check-database', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ gtNumber: gtNumberValue }),
        })
        .then(response => response.json())
        .then(data => {
            const paidbya = data.paidbya;
            const reference = data.reference;

            console.log(`Database check result for GT Number ${gtNumberValue}: ${paidbya ? 'Paid' : 'Not Paid'}`);

            // Set the value of the 'old' input field to the 'reference' value
            oldInput.value = reference;

            // Show or hide the submit button based on the result
            if (paidbya === '1') {
                console.log('Setting display to inline-block');
                submitBtn.style.display = 'inline-block';
            } else {
                console.log('Setting display to none');
                submitBtn.style.display = 'none';
            }
        })
        .catch(error => console.error('Error:', error));
    });

    document.getElementById('uploadForm').addEventListener('submit', function (event) {
        // Check if the button is hidden (condition is false)
        if (submitBtn.style.display === 'none') {
            // Prevent form submission
            event.preventDefault();

            // Optionally, you can display a message to the user or perform other actions
            console.log('Form submission prevented because the condition is false.');
        }
    });
});

            </script>
            <br>
                <h2 style="color:#1eff00;">Re-upload A Rejected Payment By Exel</h2>
                <form action="/reuploadimport" method="post"  enctype='multipart/form-data'>
                    @csrf
                    <input style="margin-top: 20px" type="file" name="file" id="">
                    <button  class="upload" type="submit" style="width: 100px; border-radius:10px; margin-left:5px; ">
                        Upload
                    </button>
                </form>
            <br>
            <br>
            @if (isset($Data))
            <form action="/importreupload" method="post">
                @csrf
                <table style="width: 600px; margin-bottom:5%; margin-top:2%; text-align:" class="rwd-table">
                    <thead>
                        <tr class="fr">
                            <th colspan="4">Product</th>
                            <th>GT Number</th>
                            <th>Fee</th>
                            <th>Type</th>
                            <th>Old reference</th>
                            <th>New reference</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Data as $item)
                            <tr>
                                <td colspan="4" >
                                    {{ $item['product'] }}

                                </td>
                                <td data-th="GT Number">
                                    {{ $item['gtnum'] }}
                                    <input type="hidden" name="gtNumbers[]" value="{{ $item['gtnum'] }}">
                                </td>
                                <td >
                                    {{ $item['fee'] }}

                                </td>
                                <td >
                                    {{ $item['type'] }}

                                </td>
                                <td data-th="Old Reference">
                                    {{ $item['old'] }}
                                    <input type="hidden" name="oldReferences[]" value="{{ $item['old'] }}">
                                </td>
                                <td data-th="New Reference">
                                    {{ $item['new'] }}
                                    <input type="hidden" name="newReferences[]" value="{{ $item['new'] }}">
                                </td>



                                    <input type="hidden" name="paid[]" value="{{ $item['paidbya'] }}">




                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <p style="color: red; " id="errorMessage"></p>
                <br>

                <button type="submit" style="font-size:50px; margin-left:60px ; color:#1eff00" id="submitButton" disabled>
                    Save &rarr;
                </button>

            </form>


            <script>
              $(document).ready(function () {
    function updateSubmitButton() {
        var allPaid = true;
        var errorItems = [];

        $('input[name="paid[]"]').each(function () {
            if ($(this).val() !== '1') {
                allPaid = false;

                // Get the GT number of the item with an error
                var gtNumber = $(this).closest('tr').find('[data-th="GT Number"]').text().trim();

                errorItems.push(gtNumber);
            }
        });

        // Enable or disable the submit button based on the result
        $('#submitButton').prop('disabled', !allPaid);

        // Change the color of the submit button to gray if disabled
        if (!allPaid) {
            $('#submitButton').css('color', 'gray');
        } else {
            $('#submitButton').css('color', '#1eff00'); // Set the original color
        }

        // Display error message if there is an error
        var errorMessage = allPaid ? '' : 'GT numbers: ' + errorItems.join(' && ')+' is Not Passed';
        $('#errorMessage').text(errorMessage);
    }

    // Call the function on page load
    updateSubmitButton();

    // Bind the function to the change event of paid inputs
    $('input[name="paid[]"]').change(function () {
        updateSubmitButton();
    });
});
function submitForm() {
        $.ajax({
            type: 'POST',
            url: "{{ route('reuploadimport') }}",
            data: new FormData($('#reuploadForm')[0]),
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle success if needed
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error by showing an alert
                alert('Oops! Something went wrong. Please try again.');
                console.error(xhr.responseText);
            }
        });
    }
            </script>


        @endif
            <form id="exportForm" action="/SemiExportA" method="get">
                @csrf
                <input type="hidden" name="sadad" value="1">
                <br>
                <div style="display: flex;justify-content:right">
                    <!-- Add the input event listener to the search input field -->
                    <label for="" style="color:#1eff00;margin-right:10px">Filter By GT : </label>
                    <input style="border-radius: 10px; width: 300px;height:40px" type="text" id="gtNumberSearch"
                        placeholder="Search by GT Number" oninput="filterGTNumbers()">

                </div>
                <table style="width: 100%; margin-bottom:5%;">
                    <thead>
                        <tr class="fr">
                            {{-- <th><button type="button" onclick="selectAll()">Select All</button></th> --}}
                            <th>Product</th>
                            <th>Vin</th>
                            <th>GT Number</th>
                            <th>Billing Doc</th>
                            <th>Registering fee</th>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Reason</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @csrf
                        {{ $lop = 0 }}
                        @foreach ($data as $index => $item)
                            <tr style="background-color:white; height: 60px;border:2px solid rgb(216, 216, 216)"
                                id="row_{{ $item->id }}">
                                {{-- <td data-th="Supplier Name">

                                            <span style="margin-right: 5px">{{ $lop +=1 }}</span>

                                            <input class="custom-checkbox" style="border-radius:5px"
                                            type="checkbox" name="selectedItems[]"
                                            value="{{ $item->id }}">

                                        </td> --}}
                                <td style=" padding:10px" data-th="Supplier Code">
                                    {{ $item->product }}
                                </td>
                                <td data-th="Supplier Code">
                                    {{ $item->vin }}
                                </td>
                                <td data-th="Supplier Code">
                                    {{ $item->gtnum }}
                                </td>
                                <td data-th="Supplier Code">
                                    <a style="color: blue" href="/ShowForA1/{{ encrypt($item->bildoc) }}">
                                        {{ $item->bildoc }}
                                    </a>
                                </td>
                                <td data-th="Supplier Code">
                                    {{ $item->regist }}
                                </td>
                                <td data-th="Supplier Code">
                                    {{ $item->idnum }}
                                </td>
                                <td data-th="Supplier Code">
                                    {{ $item->paidtype }}
                                </td>
                                <td style="text-al  ign:center">
                                    {{ $item->rejectdreason }}
                                </td>
                                <td style="font-size: 18px;width:50px;text-align:center" data-th="Supplier Code">
                                    <div class="hover-container">
                                        <i class="fa fa-eye"></i>
                                        <div class="hover-content">
                                             By : {{ $item->rejectedby }}
                                            <br>
                                            IN : {{ $item->rejecteddate }}
                                        </div>
                                    </div>
                                </td>

                                {{-- <td style="text-align: center">
                                            @if ($item->done === '1')
                                                ✅
                                            @else
                                                ❌
                                            @endif
                                        </td> --}}
                                <input type="hidden" name="doneItems[]" value="{{ $item->done }}">
                            </tr>
                        @endforeach
                        {{-- <tr>
                                    <td colspan="8" style="text-align: center">
                                        The Number Of Selected : <span id="selectedCount">0</span>
                                    </td>
                                </tr> --}}
                    </tbody>
                </table>
                {{-- <div style="display: flex;justify-content:center">
                        <button style="color:rgb(103, 255, 103);font-size:30px" type="button" class="modal__btn" onclick="doneButtonClick()">Done &rarr;</button>
                    </div> --}}

            </form>
        </div>
    </div>
    </div>
    <script>
        function filterGTNumbers() {
            const gtNumberSearch = document.getElementById('gtNumberSearch').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            for (const row of rows) {
                const gtNumberCell = row.querySelector('td:nth-child(3)');
                const gtNumber = gtNumberCell.textContent.toLowerCase();

                console.log("GT Number:", gtNumber);

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
    document.addEventListener('DOMContentLoaded', function() {
        // Get all checkboxes with the name 'selectedItems[]'
        const checkboxes = document.querySelectorAll('input[name="selectedItems[]"]');

        // Get the 'Select All' button
        const selectAllButton = document.querySelector('button[onclick="selectAll()"]');

        // Add a click event listener to the 'Select All' button
        selectAllButton.addEventListener('click', updateSelectedCount);

        // Add a change event listener to each checkbox
        checkboxes.forEach(function(checkbox) {
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
        Swal.fire({
            title: 'Done Confirmation',
            text: 'Are you sure you want to mark as done?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, mark as done!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Update the form action and submit the form
                document.getElementById('exportForm').action = '/done';
                document.getElementById('exportForm').submit();
            }
        });
    }
</script>
