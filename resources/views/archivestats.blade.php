<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
@import 'https://fonts.googleapis.com/css?family=Open+Sans:600,700';

* {font-family: 'Open Sans', sans-serif;}

.rwd-table {
  margin: auto;
  width: 500px;
  min-width: 300px;
  max-width: 100%;
  border-collapse: collapse;
}

.aa {
  border-top: none;
  background: linear-gradient(135deg,#71b7e6, #9b59b6);
  color: #fff;
}

.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  background-color: #f5f9fc;
}

.rwd-table tr:nth-child(odd) {
  background-color: #ebf3f9;
}

.rwd-table th {
  display: none;
}

.rwd-table td {
  display: block;
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


/* THE END OF THE IMPORTANT STUFF */

/* Basic Styling */

h1 {
  text-align: center;
  font-size: 2.4em;
  color: #f2f2f2;
  margin-bottom: 20px;
}
.container {
  display: block;
  text-align: center;
}
h3 {
  display: inline-block;
  position: relative;
  text-align: center;
  font-size: 1.5em;
  color: #cecece;
}
h3:before {
  content: "\25C0";
  position: absolute;
  left: -50px;
  -webkit-animation: leftRight 2s linear infinite;
  animation: leftRight 2s linear infinite;
}
h3:after {
  content: "\25b6";
  position: absolute;
  right: -50px;
  -webkit-animation: leftRight 2s linear infinite reverse;
  animation: leftRight 2s linear infinite reverse;
}
@-webkit-keyframes leftRight {
  0%    { -webkit-transform: translateX(0)}
  25%   { -webkit-transform: translateX(-10px)}
  75%   { -webkit-transform: translateX(10px)}
  100%  { -webkit-transform: translateX(0)}
}
@keyframes leftRight {
  0%    { transform: translateX(0)}
  25%   { transform: translateX(-10px)}
  75%   { transform: translateX(10px)}
  100%  { transform: translateX(0)}
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
/* Add this CSS to your stylesheet or in a style tag in the head of your HTML */

/* Target the DataTables search input */
#dataTable_filter input[type="search"] {
    /* Your custom styles go here */
    color: #000000; /* Change the color to your desired value */
    background-color: #f8f8f8; /* Change the background color to your desired value */
    border: 1px solid #ccc; /* Adjust the border */
    border-radius: 4px; /* Adjust the border-radius */
    padding: 5px; /* Adjust the padding */
    margin-bottom: 20px
}

/* Optional: Style the search placeholder text */
#dataTable_filter input[type="search"]::placeholder {
    color: #000000; /* Adjust the placeholder text color */
}
/* Add this CSS to your stylesheet or in a style tag in the head of your HTML */

/* Target the DataTables search label */
#dataTable_filter label {
    /* Your custom styles go here */
    color: #1eff00; ; /* Change the color to your desired value */
    font-weight: bold; /* Adjust font-weight if needed */
}

/* Optional: Style the placeholder text */
#dataTable_filter input[type="search"]::placeholder {
    color: #999; /* Adjust the placeholder text color */
}
/* Add this CSS to your stylesheet or in a style tag in the head of your HTML */

/* Target the DataTables entries dropdown */
#dataTable_length select {
    /* Your custom styles go here */
    color: black; ; /* Change the color to your desired value */
    background-color: #f8f8f8; /* Change the background color to your desired value */
    border: 2px solid #1eff00; ; /* Adjust the border */
    border-radius: 4px; /* Adjust the border-radius */
    padding: 5px; /* Adjust the padding */
}

/* Optional: Style the entries dropdown arrow */
#dataTable_length select::-ms-expand,
#dataTable_length select::-webkit-expand {
    display: none; /* Hide the default arrow */
}

/* Optional: Style the placeholder text */
#dataTable_length select option[disabled] {
    color: #000000; /* Adjust the placeholder text color */
}
/* Add this CSS to your stylesheet or in a style tag in the head of your HTML */

/* Target the DataTables "Show" label */
#dataTable_length label {
    /* Your custom styles go here */
    color: #1eff00; /* Change the color to your desired value */
    font-weight: bold; /* Adjust font-weight if needed */
}

/* Target the DataTables entries dropdown */


/* Optional: Style the entries dropdown arrow */
#dataTable_length select::-ms-expand,
#dataTable_length select::-webkit-expand {
    display: none; /* Hide the default arrow */
}

/* Target the DataTables "entries" label */

    </style>
       <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 style="color: #1eff00;">All Data</h1>
                    {{-- <div class="row">
                        <div class="col-sm-6">
                            <label for="fromDate">From Date:</label>
                            <input type="datetime-local" class="form-control" id="fromDate" placeholder="Enter From Date">
                        </div>
                        <div class="col-sm-6">
                            <label for="toDate">To Date:</label>
                            <input type="datetime-local" class="form-control" id="toDate" placeholder="Enter To Date">
                        </div>
                    </div>
                    <button onclick="filterData()">Filter Data</button> --}}

                    <table id="dataTable" style="width: 100%; margin-bottom:5%" class="rwd-table">
                        <thead>
                            <tr class="aa">
                                <th>Plant-key</th>
                                <th>Product</th>
                                <th>GT Number</th>
                                <th>Sold-To-Party</th>
                                <th>Vin</th>
                                <th>Billing Document</th>
                                <th>By</th>
                                <th>In</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{ $item->plantkey }}</td>
                                <td>{{ $item->product }}</td>
                                <td>{{ $item->gtnum }}</td>
                                <td>{{ $item->soldp }}</td>
                                <td>{{ $item->vin }}</td>
                                @if(Auth::user()->role == '1')
                                    <td>
                                        <a style="color: #0400ff" href="/ShowForAdmin/{{encrypt($item->bildoc)}}">
                                            {{ $item->bildoc }}
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->role == '0')
                                    <td>
                                        <a style="color: #0400ff" href="/Show/{{encrypt($item->bildoc)}}">
                                            {{ $item->bildoc }}
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->role == '2')
                                    <td>
                                        <a style="color: #0400ff" href="/ShowForB/{{encrypt($item->bildoc)}}">
                                            {{ $item->bildoc }}
                                        </a>
                                    </td>
                                @endif
                                @if(Auth::user()->role == '4')
                                    <td>
                                        <a style="color: #0400ff" href="/ShowForA1/{{encrypt($item->bildoc)}}">
                                            {{ $item->bildoc }}
                                        </a>
                                    </td>
                                @endif
                                <td>{{ $item->nameuser }}</td>
                                <td>{{ $item->dateset }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                </div>
                </div>
                </x-app-layout>

                <!-- Include DataTables JavaScript -->
                <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

                <!-- Include DataTables JavaScript -->
                <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

                <!-- Include DataTables Date Range Filtering plugin -->
                <script src="https://cdn.datatables.net/datetime/1.11.5/js/dataTables.dateTime.min.js"></script>

                <script>
                    $(document).ready(function () {
                        $('#dataTable').DataTable({
                            // Customize DataTables options here
                            "order": [[0, "asc"]], // Sort by the first column in ascending order
                            "paging": true, // Enable paging
                            "searching": true, // Enable searching
                        });
                    });

                    function filterData() {
                        const fromDate = new Date(document.getElementById('fromDate').value).toISOString().slice(0, 19).replace("T", " ");
                        const toDate = new Date(document.getElementById('toDate').value).toISOString().slice(0, 19).replace("T", " ");

                        if (!fromDate || !toDate) {
                            alert('Please enter both From and To dates.');
                            return;
                        }

                        const dataTable = $('#dataTable').DataTable();

                        dataTable.column(7).search(function (data, type, row) {
                            const dateString = data;
                            const date = new Date(dateString);
                            const formattedDate = date.toISOString().slice(0, 19).replace("T", " ");

                            if (formattedDate >= fromDate && formattedDate <= toDate) {
                                return true;
                            }
                            return false;
                        }).draw();
                    }
                </script>


