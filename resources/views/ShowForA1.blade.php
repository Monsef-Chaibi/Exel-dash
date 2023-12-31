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
            background-color: rgba(255, 255, 255, 0.8);
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

        .flex-container {
            display: flex;
            justify-content: space-between; /* or use justify-content: space-around; depending on your spacing preference */
        }

        .in1 {
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            border-radius: 20px;
            width: 48%; /* Adjust the width as needed */
            margin-top: 3%;
            box-sizing: border-box; /* Ensures padding and border are included in the width */
        }

        /* Add any other styles for .in1 elements as needed */

        .in {
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            border-radius: 20px;

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

        .warning {
            border: 2px #5B84B1FF solid;
            padding: 5%;
            border-radius: 10px;
            color: #5B84B1FF;
            width: 300px
        }

        .warning:hover {
            background: #5B84B1FF;
            color: black;
            border: 2px white solid;
        }

        .tableuser {
            font-size: 30px;
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
            border-top-left-radius:
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
            border: 2px rgb(67, 255, 50) solid;
            padding: 5%;
            border-radius: 10px;
            color: rgb(67, 255, 50);
            width: 300px
        }

        .warning1:hover {
            background: rgb(67, 255, 50);
            color: black;
            border: 2px white solid;
        }

/* modal */
.modal-container {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 10;
  display: none;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  background: var(--m-background);
  overflow-y: auto; /* Enable vertical scrolling */
}

/* using :target */
/*
when users will click/enter button(link) browser will add a #id in a url and when that happens we'll show our users the modal that contains that id.
*/
.modal-container:target {
  display: flex;
}

.modal {
  width: 60rem;
  padding: 1rem 1rem;
  border-radius: .8rem;
  border: 2px black solid;
  color: var(--light);
  background-color: rgb(255, 255, 255);
  box-shadow: var(--m-shadow, .4rem .4rem 10.2rem .2rem) var(--shadow-1);
  position: relative;
  max-height: 80vh; /* Set a maximum height for the modal */
  overflow-y: auto; /* Enable modal content scrolling if it exceeds the height */
}

.modal__title {
  font-size: 3.2rem;
}

.modal__text {

  font-size: 1.6rem;
  line-height: 2;
}

.modal__btn {
  margin-top: -1rem;
  padding: 1rem 1.6rem;
  border: 1px solid var(--border-color);
  border-radius: 100rem;

  color: inherit;
  background: transparent;
  font-size: 1.4rem;
  font-family: inherit;
  letter-spacing: .2rem;

  transition: .2s;
  cursor: pointer;
}

.modal__btn:nth-of-type(1) {
  margin-right: 1rem;
}

.modal__btn:hover,
.modal__btn:focus {
  background: var(--focus);
  border-color: var(--focus);
  transform: translateY(-.2rem);
}


/* link-... */
.link-1 {
  font-size: 1.8rem;

  color: var(--light);
  background: var(--background);
  box-shadow: .4rem .4rem 2.4rem .2rem var(--shadow-1);
  border-radius: 100rem;
  padding: 1.4rem 3.2rem;

  transition: .2s;
}

.link-1:hover,
.link-1:focus {
  transform: translateY(-.2rem);
  box-shadow: 0 0 4.4rem .2rem var(--shadow-2);
}

.link-1:focus {
  box-shadow:
    0 0 4.4rem .2rem var(--shadow-2),
    0 0 0 .4rem var(--global-background),
    0 0 0 .5rem var(--focus);
}

.link-2 {
  width: 4rem;
  height: 4rem;
  border: 1px solid var(--border-color);
  border-radius: 100rem;

  color: inherit;
  font-size: 2.2rem;

  position: absolute;
  top: 2rem;
  right: 2rem;

  display: flex;
  justify-content: center;
  align-items: center;

  transition: .2s;
}

.link-2::before {
  content: '×';

  transform: translateY(-.1rem);
}

.link-2:hover,
.link-2:focus {
  background: var(--focus);
  border-color: var(--focus);
  transform: translateY(-.2rem);
}

.abs-site-link {
  position: fixed;
  bottom: 20px;
  left: 20px;
  color: hsla(0, 0%, 1000%, .6);
  font-size: 1.6rem;
}
.amount-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .amount {
            background-color: rgba(255, 255, 255, 0.8);
            font-size: 30px;
            text-align: center;
            padding: 2%;
            width: 50%;
            max-width: 600px; /* Set a maximum width if needed */
            border-radius: 10px;
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
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="display: flex; justify-content: space-between;">
                <a href="#m1-o">
                    <button style="color: rgb(103, 255, 103); padding: 10px;" type="submit" class="modal__btn">Print Moroor Documents &rarr;</button>
                </a>
                <a href="#m2-o">
                    <button style="color: rgb(103, 255, 103); padding: 10px;" type="submit" class="modal__btn">Sadad &rarr;</button>
                </a>
            </div>


            <div class="in">
                <div class="grid-container">
                    <div class="grid-item">Billing Document : {{ $title->bildoc }}</div>
                    <div class="grid-item">Owner :
                        <span style="font-size: 17px">
                            {{ $title->soldp }}
                        </span>
                    </div>
                    <div class="grid-item">Billing Date :
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', '1900-01-01')->addDays($title->bildt - 2)->format('Y-m-d') }}
                    </div>
                    <div class="grid-item">User :
                        <span style="font-size: 17px">
                            {{ $title->shipp }}
                        </span>
                    </div>
                    <div class="grid-item">

                        <span>Total Amount : {{ number_format($sumAmount, 2, '.', ',') }}  </span>

                    </div>
                    <div class="grid-item">

                            <span>P.O Number : {{ $title->ordernum }}  </span>
                    </div>
                </div>

            </div>
            @if ($status1 != 1 ||  $status1 != 2 || $status1 != 3)

            <div class="flex-container">
                   <div style="margin-top:3%" class="in1">
                       <div class="tt">Approvals By Accountant</div>
                       <div class="tt"> Status :
                           @if ($status === 1)
                           <span style="color:rgb(48, 255, 48);margin-left:5px">
                               Full Check
                           </span>
                           @endif
                           @if ($status === 2)
                           <span style="color:rgb(241, 255, 48);margin-left:5px">
                               Semi Check
                           </span>
                           @endif

                   </div>
                       <div class="grid-container">
                           <table class="tableuser">
                               @foreach ($userinfo as $item)
                                   <tr>
                                       <td colspan="3" style="font-size: 20px" >
                                          {{ $item->nameuser }}
                                       </td>
                                       <td colspan="3" style="font-size: 20px" >
                                         {{ $item->dateset }}
                                       </td>
                                       <td>
                                           <a
                                               href="{{ route('Showsetuser', ['nameuser' => $item->nameuser, 'boldoc' => encrypt($title->bildoc), 'dateset' => $item->dateset]) }}">
                                               <button class="button-28">
                                                   <i class="fa fa-eye"></i> View
                                               </button>
                                           </a>
                                       </td>
                                   </tr>
                               @endforeach
                           </table>
                       </div>
                   </div>

                   <div style="margin-top:3%" class="in1">
                       <div class="tt">Approvals By Operation</div>
                       <div class="tt"> Status :
                           @if ($status1 === 1)
                           <span style="color:rgb(48, 255, 48);margin-left:5px">
                               Full Check
                           </span>
                           @endif
                           @if ($status1 === 2)
                           <span style="color:rgb(241, 255, 48);margin-left:5px">
                               Semi Check
                           </span>
                           @endif

                   </div>
                       <div class="grid-container">
                           <table class="tableuser">
                               @foreach ($userinfo2 as $item)
                               <tr>
                                       <td  colspan="3" style="font-size: 20px" >
                                         {{ $item->user2 }}
                                       </td >
                                       <td colspan="3" style="font-size: 20px" >
                                         {{ $item->dateuser2 }}
                                       </td>
                                       <td>
                                           <a
                                               href="{{ route('ShowsetuserA1', ['user2' => $item->user2, 'boldoc' => encrypt($title->bildoc), 'dateuser2' => $item->dateuser2]) }}">
                                               <button class="button-28">
                                                   <i class="fa fa-eye"></i> View
                                               </button>
                                           </a>
                                       </td>
                                   </tr>
                               @endforeach
                           </table>
                       </div>
                   </div>
            </div>
           @else
           <div style="margin-top:3%" class="in">
               <div class="tt">Approvals By Accountant</div>
               <div class="tt"> Status :  <span style="color:rgb(48, 255, 48);margin-left:5px">
                   @if ($status === 1)
                       Full Check
                   @endif
                   @if ($status === 2)
                       Semi Check
                   @endif
               </span> </div>
               <div class="grid-container">
                   <table class="tableuser">
                       @foreach ($userinfo as $item)
                           <tr>
                               <td>
                                 {{ $item->nameuser }}
                               </td>
                               <td>
                                 {{ $item->dateset }}
                               </td>
                               <td>
                                   <a
                                       href="{{ route('Showsetuser', ['nameuser' => $item->nameuser, 'boldoc' => encrypt($title->bildoc), 'dateset' => $item->dateset]) }}">
                                       <button class="button-28">
                                           <i class="fa fa-eye"></i> View
                                       </button>
                                   </a>
                               </td>
                           </tr>
                       @endforeach
                   </table>
               </div>
           </div>
           @endif





            @if ($status1 === 1)
                <div>
                    <table style="width: 100%; margin-bottom:5%; margin-top:2%" class="rwd-table">
                        <thead>
                            <tr class="fr">
                                <th>Product</th>
                                <th>Long Description</th>
                                <th>Vin</th>
                                <th>GT Number</th>
                                <th>Registration</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td data-th="Supplier Name">
                                        {{ $item->product }}
                                    </td>
                                    <td data-th="Supplier Code">
                                        {{ $item->desc }}
                                    </td>
                                    <td data-th="Supplier Code">
                                        {{ $item->vin }}
                                    </td>
                                    <td data-th="Supplier Code">
                                        {{ $item->gtnum }}
                                    </td>
                                    <td data-th="Supplier Code">
                                        {{ $item->regist }}
                                    </td>
                                    <td data-th="Supplier Code">
                                        {{ number_format($item->amount, 2, '.', ',') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            @else
                    <div>
                        <table style="width: 100%; margin-bottom:5%; margin-top:2%" class="rwd-table">
                            <thead>
                                <tr class="fr">
                                    <th>
                                        <button onclick="selectAll()">Select All</button>
                                    </th>
                                    <th>Product</th>
                                    <th>Long Description</th>
                                    <th>Vin</th>
                                    <th>GT Number</th>
                                    <th>Registration</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <form method="GET" action="/SemiCheckA1" id="partialDeliveryForm">
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            @if ($item->stuser2 != 1)
                                                <td data-th="Supplier Name">
                                                    @if ($item->status != Null)
                                                        <span style="margin-right: 5px">{{ $loop->index + 1 }}</span>
                                                        <input class="custom-checkbox" style="border-radius:5px"
                                                            type="checkbox" name="selectedItems[]"
                                                            value="{{ $item->id }}">
                                                    @endif
                                                </td>
                                                <td data-th="Supplier Name">
                                                    {{ $item->product }}
                                                </td>
                                                <td data-th="Supplier Code">
                                                    {{ $item->desc }}
                                                </td>
                                                <td data-th="Supplier Code">
                                                    {{ $item->vin }}
                                                </td>
                                                <td data-th="Supplier Code">
                                                    {{ $item->gtnum }}
                                                </td>
                                                <td data-th="Supplier Code">
                                                    {{ $item->regist }}
                                                </td>
                                                <td data-th="Supplier Code">
                                                    {{ number_format($item->amount, 2, '.', ',') }}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="7" style="text-align: center">
                                            The Number Of Selected : <span id="selectedCount">0</span>
                                        </td>
                                    </tr>
                                </tfoot>

                        </table>
            @endif
            <div class="btnstatus">
            @if ($status1 != 1)
                    <div><button type="submit" class="warning" onclick="return showConfirmSemi()">Partial
                            Delivery</button></div>
                    </form>
                    <div><button type="button" class="warning1" onclick="return showConfirm2()">Total
                        Delivery</button></div>
            @endif

            <div><a href="/SowChekUser/{{ encrypt($title->bildoc) }}"><button type="submit" class="warning2">    View ISTIMARAH printed</button></a></div>
        </div>
        </div>
    </div>
    </div>
    </div>
    <script>
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

    <script>
        function showConfirm2() {
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
                    window.location.href = "/TotalCheckA1/{{ $title->bildoc }}";
                }
            });

            return false; // Prevent the default link behavior
        }
        function showConfirm() {
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
                    window.location.href = "/Status/{{ $title->bildoc }}";
                }
            });

            return false; // Prevent the default link behavior
        }

        function showConfirmSemi() {
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
                    document.getElementById('partialDeliveryForm').submit();
                }
            });

            return false; // Prevent the default link behavior
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
            updateChecks();
        }
    </script>
</x-app-layout>
  <!-- modal 1 -->
  <div  class="box">

    <div class="modal-container" id="m1-o" style="--m-background: transparent;">
        <div class="modal">
            <h1 class="modal__title">Print :</h1>
            <label for="">Type of Procedure :  </label>
        <form action="/pdf" method="get">
            @csrf
        <br>

        <label style="margin-left: 15px">
            <input type="radio" name="procedure" value="Registration" style="border-radius: 10px">
            Registration
        </label>

        <label style="margin-left: 15px">
            <input type="radio" name="procedure" value="Renewal" style="border-radius: 10px">
            Renewal
        </label>

        <label style="margin-left: 15px">
            <input type="radio" name="procedure" value="Replacement" style="border-radius: 10px">
            Replacement
        </label>

        <label style="margin-left: 15px">
            <input type="radio" name="procedure" value="Ownership Transfer" style="border-radius: 10px">
            Ownership Transfer
        </label>

        <label style="margin-left: 15px">
            <input type="radio" name="procedure" value="Lost" style="border-radius: 10px">
            Lost
        </label>

        <label style="margin-left: 15px">
            <input type="radio" name="procedure" value="Damaged" style="border-radius: 10px">
            Damaged
        </label>
        <br>
            <label for="" style="color: rgb(0, 0, 0)">Choose A Name :</label>
            <select style="border-radius:5px;margin-top:20px" name="selected_id" id="selected_id" onchange="showUserInfo()">
                <option style="display: none;">Select User</option>
                @foreach ($datauser as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <br>
            <input name="full_name" style="width: 49%;border-radius:5px;margin-top:10px;" placeholder="Full Name of the Owner" type="text" readonly>
            <input name="nationality" style="width: 49%;border-radius:5px;margin-top:10px;" placeholder="Nationality" type="text" readonly>
            <input name="national_id" style="width: 49%;border-radius:5px;margin-top:10px;" placeholder="National ID" type="text" readonly>
            <input name="address" style="width: 49%;border-radius:5px;margin-top:10px;" placeholder="Address" type="text" readonly>
            <input name="city" style="width: 49%;border-radius:5px;margin-top:10px;" placeholder="City" type="text" readonly>
            <input name="work_phone" style="width: 49%;border-radius:5px;margin-top:10px;" placeholder="Work Phone" type="text" readonly>
            <input name="activity" style="width: 49%;border-radius:5px;margin-top:10px;" placeholder="Activity" type="text" readonly>
            <input name="mobile_number" style="width: 49%;border-radius:5px;margin-top:10px;" placeholder="Mobile Number" type="text" readonly>
            <div style="margin-top: 20px">
                <label for="">Is there a tenant?</label>
                <input style="margin-left: 20px" checked type="radio" name="is_tenant" onchange="showtenantInfo()" value="No">
                <label style="margin-left: 5px" for="">No</label>
                <input style="margin-left: 20px"  type="radio" name="is_tenant" onchange="showtenantInfo()" value="Yes">
                <label style="margin-left: 5px" for="">Yes</label>
                <select style="border-radius: 5px; margin-left: 160px; width: 49%;display:none" name="tenant" id="slc">
                  <option value="" disabled selected>Select User</option>
                  @foreach ($datauser as $item)
                    <option value="{{ $item->name . ',' . $item->nat_id . ',' . $item->nat . ',' . $item->activity . ',' . $item->address . ',' . $item->mobnum }}">{{$item->name}}</option>
                  @endforeach
                </select>
            </div>
            <br>
            <label for="" style="display: none" id='documents'>Print ALJUF documents ?</label>
            <input style="margin-left: 20px;display: none" name="documents" checked type="radio" id="documents"  value="No">
            <label style="margin-left: 5px;display: none" for="" id='documents'>No</label>
            <input style="margin-left: 20px;display: none" name="documents"  type="radio" id="documents" value="Yes">
            <label style="margin-left: 5px;display: none" for="" id='documents'>Yes</label>
            <br style="display: none" id='documents'>
            <br style="display: none" id='documents'>
            <input type="hidden" name="port" value="جدة">

            <label for="" style="margin-left: 20px">Entry Date :</label>
            <input type="text" name="entrydate" style="width: 38%;border-radius:5px">
            <label for="" style="color: rgb(0, 0, 0);">Vehicle Brand :</label>
            <select  style="border-radius:5px;width:37%;margin-top:25px" id="brand_id"  onchange="showBrandInfo()">
                <option style="display: none;">Select Brand</option>
                @foreach ($brand as $item)
                    <option value="{{$item->id}}">{{$item->titel}}</option>
                @endforeach
            </select><br>
            <input readonly name="brand" style="width: 49%;border-radius:5px;margin-top:25px" placeholder="Vehicle Brand" type="text">
            <input readonly name="model" style="width: 49%;border-radius:5px;margin-top:10px" placeholder="Vehicle Model" type="text">
            <input readonly name="modtype" style="width: 49%;border-radius:5px;margin-top:10px" placeholder="Vehicle Type" type="text">
            <input readonly name="chtype" style="width: 49%;border-radius:5px;margin-top:10px" placeholder="Chassis Type" type="text">
            <input readonly name="vcap" style="width: 49%;border-radius:5px;margin-top:10px" placeholder="Vehicle Load Capacity" type="text">
            <input readonly name="numcl" style="width: 49%;border-radius:5px;margin-top:10px" placeholder="Number of Cylinders" type="text">
            <input readonly name="weight" style="width: 49%;border-radius:5px;margin-top:10px" placeholder="Vehicle Weight" type="text">
            <input readonly name="year" style="width: 49%;border-radius:5px;margin-top:10px" placeholder="Year of Manufacture" type="text">
            <br>
            <label for="" style="margin-top:25px">Registration Type :</label>
            <select name="regtype" id="" style="width: 33%;border-radius:5px;margin-top:10px">
                <option value="خصوصي">Private </option>
                <option value="نقل خاص">Private transfer</option>
                <option value="نقل عام">Public transport</option>
            </select>
            <label for="" style="margin-left: 20px">Signature name</label>
            <input type="text" name="sing" style="width: 30%;border-radius:5px;margin-top:10px" placeholder="Signature name">

            <table style="width: 90%; margin-bottom:5%; margin-top:2%" class="rwd-table">
                <thead>
                    <tr class="fr">
                        <th><button type="button" onclick="selectAllpop()">Select All</button></th>
                        <th>Product</th>
                        <th>VIN</th>
                        <th>color</th>
                        <th>GT Number</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                    <td data-th="Supplier Name">
                                        <input class="custom-" style="border-radius:5px"
                                            type="checkbox" name="selectedItems[]"
                                            value="{{ $item->id }}">
                                    </td>
                                    <td data-th="Supplier Name">
                                        {{ $item->product }}
                                    </td>
                                    <td data-th="Supplier Code">
                                        {{ $item->vin }}
                                    </td>
                                    <td data-th="Supplier Code">
                                        {{ $item->color }}
                                    </td>
                                    <td data-th="Supplier Code">
                                        {{ $item->gtnum }}
                                    </td>

                            </tr>
                        @endforeach
                    </tbody>
            </table>






            <br>


            <a  href="/generate-pdf">
                <button type="submit" class="modal__btn">Print &rarr;</button>
            </a>
            <a href="#m1-c" class="link-2"></a>
        </div>
    </div>
</form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  // modal 2
    <div class="modal-container"id="m2-o" style="--m-background: transparent;">
        <div class="modal">
            <h1 class="modal__title">Sadad :</h1>
            <form action="/Sadad" id="myForm"  method="get">
                <input type="hidden" name="simple" value="simple" >
            <label for="" style="margin-top:25px">Registration Type :</label>
            <select name="paidtype" id="" style="width: 33%;border-radius:5px;margin-top:10px">
                <option value="Private">Private </option>
                <option value="Private transport">Private transport</option>
                <option value="Public transport">Public transport</option>
            </select>
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
                        @csrf
                        @foreach ($data as $item)
                            {{-- @if ($item->paid !== '1' && $item->paid !== '2' ) --}}
                                <tr>
                                    {{-- @if ($item->paid === '1' || $item->paid === '2')
                                        <td>

                                        </td>
                                    @else --}}
                                    <td data-th="Supplier Name">
                                        <input class="custom-" style="border-radius:5px"
                                            type="checkbox" name="selectedItems[]"
                                            value="{{ $item->id }}">
                                    </td>
                                    {{-- @endif --}}
                                        <td data-th="Supplier Name">
                                            {{ $item->product }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->vin }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->gtnum }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->regist }}
                                        </td>
                                        <td data-th="Supplier Code">
                                            {{ $item->idnum }}
                                        </td>

                                            <input type="hidden" name="paid" value="{{ $item->paid }}">

                                        @if ( $item->paid === '1')
                                            <td style="color: blue" data-th="Supplier Code">
                                                Sent
                                            </td>
                                        @elseif ( $item->paid === '2')
                                            <td  style="color: rgb(38, 255, 38)" data-th="Supplier Code">
                                                Accepted
                                            </td>
                                        @elseif ( $item->paid === '11')
                                            <td  style="color: rgb(38, 255, 38)" data-th="Supplier Code">
                                                Accepted
                                            </td>
                                        @elseif ($item->paid === '3')
                                            <td  style="color: red" data-th="Supplier Code">
                                                Rejected
                                            </td>
                                        @else
                                            <td data-th="Supplier Code">

                                            </td>
                                        @endif
                                </tr>
                        {{-- @endif --}}

                        @endforeach
                    </tbody>
            </table>
            <table style="font-size:20px; margin-left:20px;text-align:center;margin-bottom:50px">
                <tr >
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



            <button type="submit" style="font-size:50px;margin-left:60px" id="submitButton" disabled>Save &rarr;</button>

            </form>

            <a href="#m1-c" class="link-2"></a>
        </div>
  </div>
  <!-- /modal 1 -->

  <script>
    function showUserInfo() {
       var id = document.getElementById('selected_id').value;
       // Make an AJAX request to the Laravel route.
       var xhr = new XMLHttpRequest();
       xhr.open('GET', `/getUserData/${id}`);
       xhr.onload = function() {
           if (xhr.status === 200) {
               // Parse the JSON response.
               var userInfo = JSON.parse(xhr.responseText);

               // Set the values of the input readonly fields.
               document.querySelector('input[name="full_name"]').value = userInfo.full_name;
               document.querySelector('input[name="nationality"]').value = userInfo.nationality;
               document.querySelector('input[name="national_id"]').value = userInfo.national_id;
               document.querySelector('input[name="address"]').value = userInfo.address;
               document.querySelector('input[name="city"]').value = userInfo.city;
               document.querySelector('input[name="work_phone"]').value = userInfo.work_phone;
               document.querySelector('input[name="activity"]').value = userInfo.activity;
               document.querySelector('input[name="mobile_number"]').value = userInfo.mobile_number;
           } else {
               // Handle the error.
           }
       };
       xhr.send();
   }
   function showBrandInfo() {
    var id = document.getElementById('brand_id').value;
    // Make an AJAX request to the Laravel route.
    var xhr = new XMLHttpRequest();
    xhr.open('GET', `/getBrandData/${id}`);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Parse the JSON response.
            var brandInfo = JSON.parse(xhr.responseText);

            // Set the values of the input readonly fields.
            document.querySelector('input[name="brand"]').value = brandInfo.brand;
            document.querySelector('input[name="model"]').value = brandInfo.model;
            document.querySelector('input[name="modtype"]').value = brandInfo.modtype;
            document.querySelector('input[name="chtype"]').value = brandInfo.chtype;
            document.querySelector('input[name="vcap"]').value = brandInfo.vcap;
            document.querySelector('input[name="numcl"]').value = brandInfo.numcl;
            document.querySelector('input[name="weight"]').value = brandInfo.weight;
            document.querySelector('input[name="year"]').value = brandInfo.year;

        } else {
            // Handle the error.
            console.error('Error fetching brand data:', xhr.status, xhr.statusText);
        }
    };
    xhr.send();
}

   function showtenantInfo() {
    var radioButton = document.querySelector('input[name="is_tenant"]:checked');
    var selectBox = document.querySelector('#slc');
    var selects = document.querySelectorAll('#documents');


    if (radioButton.value === 'No') {
        selectBox.setAttribute('disabled', true);
        selectBox.style.display = 'none';
        selects.forEach(function (select) {
        select.setAttribute('disabled', true);
        select.style.display = 'none';
        });
    } else if (radioButton.value === 'Yes') {
        selectBox.removeAttribute('disabled');
        selectBox.style.removeProperty('display');
        selects.forEach(function (select) {
        select.removeAttribute('disabled');
        select.style.removeProperty('display');
        });
    }
    }


   </script>
<script>
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

        if (paidValue !== '1' && paidValue !== '2' && paidValue !== '11') {
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

</script>
