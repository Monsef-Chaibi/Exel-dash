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

.rwd-table tr:first-child {
  border-top: none;
  background: linear-gradient(135deg,#71b7e6, #9b59b6);
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
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Last update at : {{$latestDate}}</p>
                        <h1>All Data</h1>
                          <table style="width: 100%; margin-bottom:5%" class="rwd-table">
                            <tbody>
                              <tr>
                                <th>Plant-key</th>
                                <th>Product</th>
                                <th>GT Number</th>
                                <th>Sold-To-Party</th>
                                <th>Ship-To-Party</th>
                                <th>Billing Document</th>
                                <th>Billing Date</th>
                                <th>Create_at</th>
                              </tr>
                              @foreach($data as $item)
                              <tr>
                                <td data-th="Supplier Name">
                                    {{ $item->plantkey }}
                                </td>
                                <td data-th="Supplier Code">
                                    {{ $item->product }}
                                </td>
                                <td data-th="Supplier Code">
                                    {{ $item->gtnum }}
                                </td>

                                <td data-th="Supplier Name">
                                    {{ $item->soldp}}
                                </td>
                                <td data-th="Supplier Name">
                                    {{ $item->shipp}}
                                </td>
                                <td data-th="Supplier Name">
                                    {{ $item->bildoc}}
                                </td>
                                <td data-th="Supplier Name">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($item->bildt - 2)->format('Y-m-d') }}
                                </td>
                                <td data-th="Invoice Date">
                                    {{ $item->created_at }}
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div >{{ $data->links() }} </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
