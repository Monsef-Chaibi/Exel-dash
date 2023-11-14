<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xrRPeRfbzjUpu8Gm/D6xxrWyJl7Ia3i1sX21aqNfhXbwLgiPzZ3Bc+usMybAk9P96J/T6EKanX+9bH1bwmvBhw==" crossorigin="anonymous" />
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-xrRPeRfbzjUpu8Gm/D6xxrWyJl7Ia3i1sX21aqNfhXbwLgiPzZ3Bc+usMybAk9P96J/T6EKanX+9bH1bwmvBhw==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1>All Users</h1>
                          <table style="width: 1000px" class="rwd-table">
                            <tbody>
                              <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Plant-key</th>
                                <th>Create_at</th>
                                <th>Action</th>
                              </tr>
                              @foreach($users as $user)
                              <tr>
                                <td data-th="Supplier Code">
                                    {{ $user->name }}
                                </td>
                                <td data-th="Supplier Name">
                                    {{ $user->email }}
                                </td>
                                <td data-th="Supplier Name">
                                @if ( $user->role == 0)
                                     Operation
                                @endif
                                @if ( $user->role == 2)
                                    Traffic
                                @endif
                                </td>
                                <td data-th="Supplier Name">
                                    @if ( $user->cond == 0)
                                    All
                                    @else
                                    {{ $user->cond }}
                                    @endif
                                </td>
                                <td data-th="Invoice Date">
                                    {{ $user->created_at }}
                                </td>
                                <td data-th="Invoice Date">
                                    <a href="#" onclick="confirmDelete('/deleteuser/{{$user->id}}')">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this user!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user clicks 'Yes', redirect to the delete URL
                window.location.href = deleteUrl;
            }
        });
    }
</script>
