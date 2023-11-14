<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
         .btn{
            color:rgb(103, 255, 103);
            border:2px rgb(103, 255, 103) solid;
            padding:1%  ;
            border-radius:10px;
            margin-left: 6%;
        }
        .btn:hover{
            background: rgb(103, 255, 103);
            border: 2px white solid ;
            color: white ;
        }

.box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  padding: 0 4rem 2rem;
  background-color: white
}

.box:not(:first-child) {
  height: 45rem;
}

.box__title {
  font-size: 10rem;
  font-weight: normal;
  letter-spacing: .8rem;
  margin-bottom: 2.6rem;
}

.box__title::first-letter {
  color: var(--primary);
}

.box__p,
.box__info,
.box__note {
  font-size: 1.6rem;
}

.box__info {
  margin-top: 6rem;
}

.box__note {
  line-height: 2;
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

  /* --m-background is set as inline style */
  background: var(--m-background);
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
  background-color:  rgb(255, 255, 255);
  box-shadow: var(--m-shadow, .4rem .4rem 10.2rem .2rem) var(--shadow-1);
  position: relative;
  height: 700px;
  overflow: hidden;
}

.modal__title {
  font-size: 3.2rem;
}

.modal__text {

  margin-top: 4rem;
  font-size: 1.6rem;
  line-height: 2;
}

.modal__btn {
  margin-top: 4rem;
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
}   @media only screen and (max-width: 979px) {
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
        /* Update class names to avoid conflicts with existing styles */
.custom-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.custom-modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

.custom-close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.custom-close:hover {
    color: black;
}

    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            <div style="padding: 3%" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="#m1-o">
                    <button class="btn" style="">
                        Add New User
                    </button>
                </a>
                <a href="#m2-o">
                    <button class="btn" style="">
                        Add Port of Entry
                    </button>
                </a>
                <a href="#m3-o">
                    <button class="btn" style="">
                        Add New Vehicle Brand
                    </button>
                </a>
                <a href="#m4-o">
                    <button class="btn" style="">
                        Add New Color Code
                    </button>
                </a>
            </div>
        </div>
        <h2 style="font-size: 30px;margin-left:20px;color:rgb(103, 255, 103);margin-top:20px">User :</h2>
        <table style="width: 90%; margin-bottom:5%; margin-top:2%" class="rwd-table">
            <thead>
                <tr class="fr">
                    <th>Full name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td data-th="Supplier Code">
                            {{ $item->name }}
                        </td>
                        <td data-th="Supplier Code">
                            <a href="#" onclick="confirmDelete('/deleteuser/{{ $item->id }}')">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </a>
                            <!-- Add data attributes to store user information -->
                            <a href="#" onclick="openModal('{{ $item->name }}', '{{ $item->id }}', '{{ $item->nat }}', '{{ $item->nat_id }}', '{{ $item->address }}', '{{ $item->city }}', '{{ $item->wornum }}', '{{ $item->activity }}' , '{{ $item->mobnum }}')">
                                <i class='fa fa-edit' style="font-size:25px;margin-left:10px"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <h2 style="font-size: 30px;margin-left:20px;color:rgb(103, 255, 103);margin-top:20px">Port :</h2>
        <table style="width: 90%; margin-bottom:5%; margin-top:2%" class="rwd-table">
            <thead>
                <tr class="fr">
                    <th>Full name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($port as $item)
                    <tr>
                        <td data-th="Supplier Code">
                            {{ $item->nameofport }}
                        </td>
                        <td data-th="Supplier Code">
                            <a href="#" onclick="confirmDelete('/deleteuser/{{ $item->id }}')">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </a>
                            <!-- Add data attributes to store user information -->
                            <a href="#" onclick="openModalPort('{{ $item->nameofport }}','{{ $item->id}}')">
                                <i class='fa fa-edit' style="font-size:25px;margin-left:10px"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <h2 style="font-size: 30px;margin-left:20px;color:rgb(103, 255, 103);margin-top:20px">Brand :</h2>
        <table style="width: 90%; margin-bottom:5%; margin-top:2%" class="rwd-table">
            <thead>
                <tr class="fr">
                    <th>Full name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($brand as $item)
                    <tr>
                        <td data-th="Supplier Code">
                            {{ $item->titel }}
                        </td>
                        <td data-th="Supplier Code">
                            <a href="#" onclick="confirmDelete('/deleteuser/{{ $item->id }}')">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </a>
                            <!-- Add data attributes to store user information -->
                            <a href="#" onclick="openModalBrand('{{ $item->titel }}','{{ $item->id}}','{{ $item->brand}}','{{ $item->model}}','{{ $item->modtype}}','{{ $item->chtype}}','{{ $item->vcap}}','{{ $item->numcl}}','{{ $item->weight}}','{{ $item->year}}')">
                                <i class='fa fa-edit' style="font-size:25px;margin-left:10px"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    <script>
        function openModal(name, id, nat, nat_id, address, city, wornum, activity, mobnum) {
            // Populate modal content with user information
            var modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = `
            <h3 style='text-align:center;font-size:30px;margin-bottom'>Edit User</h3>
            <form action="/editusercontrat" methode="get" id="editForm" style='text-align:left'>
                <input name="id" type="hidden" value="${id}">
                <label>User Name:</label>
                <input name="name" style="width: 25%;border-radius:5px" placeholder="Nationality" type="text" value="${name}">

                <label style='margin-left:20%'>Nationality:</label>
                <input name="nationality" style="width: 25%;border-radius:5px" placeholder="Nationality" type="text" value="${nat}">

                <br>
                <br>

                <label>National ID:</label>
                <input name="national_id" style="width: 25%;border-radius:5px" placeholder="National ID" type="text" value="${nat_id}">

                <label style='margin-left:20%'>Address:</label>
                <input name="address" style="width: 25%;border-radius:5px" placeholder="Address" type="text" value="${address}">

                <br>
                <br>

                <label>City:</label>
                <input name="city" style="width: 25%;border-radius:5px" placeholder="City" type="text" value="${city}">

                <label style='margin-left:20%'>Work Phone:</label>
                <input name="work_phone" style="width: 25%;border-radius:5px" placeholder="Work Phone" type="text" value="${wornum}">

                <br>
                <br>

                <label>Activity:</label>
                <input name="activity" style="width: 25%;border-radius:5px" placeholder="Activity" type="text" value="${activity}">

                <label style='margin-left:20%'>Mobile Number:</label>
                <input name="mobile_number" style="width: 25%;border-radius:5px" placeholder="Mobile Number" type="text" value="${mobnum}">

                <br>
                <br>

                <!-- Add a submit button to submit the form -->
                <button type="submit" class="modal__btn">Save &rarr;</button>
            </form>
        `;

            // Display the modal
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';

            // Close the modal when the user clicks the close button (×)
            var span = document.getElementsByClassName('custom-close')[0];
            span.onclick = function() {
                modal.style.display = 'none';
            }

            // Close the modal if the user clicks outside the modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        }
    </script>
    <script>
        function openModalPort(name,id) {
            // Populate modal content with user information
            var modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = `
            <h3 style='text-align:center;font-size:30px;margin-bottom'>Edit Port</h3>
            <form action="/editportcontrat" methode="get" id="editForm" style='text-align:left'>
                <input name="id" type="hidden" value="${id}">
                <label>Port Name:</label>
                <input name="name" style="width: 25%;border-radius:5px;margin-top:50px" placeholder="Name of Port" type="text" value="${name}">

                <br>
                <br>

                <!-- Add a submit button to submit the form -->
                <button type="submit" class="modal__btn">Save &rarr;</button>
            </form>
        `;

            // Display the modal
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';

            // Close the modal when the user clicks the close button (×)
            var span = document.getElementsByClassName('custom-close')[0];
            span.onclick = function() {
                modal.style.display = 'none';
            }

            // Close the modal if the user clicks outside the modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        }
    </script>
    <script>
         function openModalBrand(titel, id, brand, model, modtype, chtype, vcap, numcl, weight, year) {
        // Populate modal content with port information
        var modalContent = document.getElementById('modalContent');
        modalContent.innerHTML = `
            <h3 style='text-align:center;font-size:30px;margin-bottom:10px;'>Edit Port</h3>
            <form action="/editbrandcontrat" method="get" id="editForm" style='text-align:left'>
                <input name="id" type="hidden" value="${id}">

                <label>Titel :</label>
                <input name="titel" style="width: 25%; border-radius: 5px" type="text" value="${titel}">

                <label style='margin-left:20%'>Brand:</label>
                <input name="brand" style="width: 25%; border-radius: 5px" type="text" value="${brand}">

                <br>
                <br>

                <label>Model:</label>
                <input name="model" style="width: 25%; border-radius: 5px" type="text" value="${model}">

                <label style='margin-left:20%'>Model Type:</label>
                <input name="modtype" style="width: 25%; border-radius: 5px" type="text" value="${modtype}">

                <br>
                <br>

                <label>Chassis Type:</label>
                <input name="chtype" style="width: 25%; border-radius: 5px" type="text" value="${chtype}">

                <label style='margin-left:20%'>Vehicle Capacity:</label>
                <input name="vcap" style="width: 25%; border-radius: 5px" type="text" value="${vcap}">

                <br>
                <br>

                <label>Number of Cylinders:</label>
                <input name="numcl" style="width: 25%; border-radius: 5px" type="text" value="${numcl}">

                <label style='margin-left:20%'>Weight:</label>
                <input name="weight" style="width: 25%; border-radius: 5px" type="text" value="${weight}">

                <br>
                <br>

                <label>Year:</label>
                <input name="year" style="width: 25%; border-radius: 5px" type="text" value="${year}">

                <br>
                <br>

                <!-- Add a submit button to submit the form -->
                <button type="submit" class="modal__btn">Save &rarr;</button>
            </form>
        `;

            // Display the modal
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';

            // Close the modal when the user clicks the close button (×)
            var span = document.getElementsByClassName('custom-close')[0];
            span.onclick = function() {
                modal.style.display = 'none';
            }

            // Close the modal if the user clicks outside the modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        }
    </script>


<!-- Update modal class names -->
<div id="myModal" class="custom-modal">
    <div class="custom-modal-content">
        <span class="custom-close">&times;</span>
        <!-- Display user information here -->
        <div id="modalContent"></div>
    </div>
</div>


</x-app-layout>

  <!-- modal 1 -->
  <div  class="box">

    <div class="modal-container" id="m1-o" style="--m-background: transparent;">
      <div class="modal">
        <h1 class="modal__title">Add New user</h1>
        <form action="/AddContratUser" method="POST" class="modal__text" dir="ltr">
            @csrf
            <input name="full_name" style="width: 49%;border-radius:5px" placeholder="Full Name of the Owner" type="text">
            <input name="nationality" style="width: 49%;border-radius:5px" placeholder="Nationality" type="text">
            <input name="national_id" style="width: 49%;border-radius:5px" placeholder="National ID" type="text">
            <input name="address" style="width: 49%;border-radius:5px" placeholder="Address" type="text">
            <input name="city" style="width: 49%;border-radius:5px" placeholder="City" type="text">
            <input name="work_phone" style="width: 49%;border-radius:5px" placeholder="Work Phone" type="text">
            <input name="activity" style="width: 49%;border-radius:5px" placeholder="Activity" type="text">
            <input name="mobile_number" style="width: 49%;border-radius:5px" placeholder="Mobile Number" type="text">
            <button type="submit" class="modal__btn">Add &rarr;</button>
        </form>
        <a href="#m1-c" class="link-2"></a>
      </div>
    </div>
  </div>
  <!-- /modal 1 -->
  <!-- modal 1 -->
  <div  class="box">

      <div class="modal-container" id="m2-o" style="--m-background: transparent;">
      <div class="modal">
        <h1 class="modal__title">Add New Port of Entry</h1>
        <form action="/AddPort" method="POST" class="modal__text" dir="ltr">
            @csrf
            <label for="" style="margin-right: 20px">Name of Port :</label>
            <input name="nameofport" style="width: 49%;border-radius:5px" placeholder="Full Name of the Port" type="text"><br>
            <button type="submit" class="modal__btn">Add &rarr;</button>
        </form>
        <a href="#m2-c" class="link-2"></a>
    </div>
    </div>
</div>
<!-- /modal 1 -->

<!-- modal 1 -->
<div  class="box">

  <div class="modal-container" id="m3-o" style="--m-background: transparent;">
    <div class="modal">
      <h1 class="modal__title">Add New Vehicle Brand</h1>
      <form action="/AddBrand" method="POST" class="modal__text" dir="ltr">
          @csrf
          <input name="titel" style="width: 49%;border-radius:5px;margin-left:25%;margin-bottom:30px" placeholder="Title of brand" type="text"><br>
          <input name="brand" style="width: 49%;border-radius:5px" placeholder="Vehicle Brand" type="text">
          <input name="model" style="width: 49%;border-radius:5px" placeholder="Vehicle Model" type="text">
          <input name="modtype" style="width: 49%;border-radius:5px" placeholder="Vehicle Type" type="text">
          <input name="chtype" style="width: 49%;border-radius:5px" placeholder="Chassis Type" type="text">
          <input name="vcap" style="width: 49%;border-radius:5px" placeholder="Vehicle Load Capacity" type="text">
          <input name="numcl" style="width: 49%;border-radius:5px" placeholder="Number of Cylinders" type="text">
          <input name="weight" style="width: 49%;border-radius:5px" placeholder="Vehicle Weight" type="text">
          <label for="" style="font-size: 20px">Year of Manufacture :</label>
          <select name="year" id="" style="width: 32%;border-radius:5px">
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
          </select>
          <br>
          <button type="submit" class="modal__btn">Add &rarr;</button>
      </form>
      <a href="#m3-c" class="link-2"></a>
    </div>
  </div>
</div>
<!-- /modal 1 -->
<!-- modal 1 -->
<div  class="box">

  <div class="modal-container" id="m4-o" style="--m-background: transparent;">
    <div class="modal">
      <h1 class="modal__title">Add New Color</h1>
      <form action="/Addcolor" method="POST" class="modal__text" dir="ltr">
          @csrf
          <label for="">Color :</label>
          <input name="color" style="width: 49%;border-radius:5px;margin-bottom:30px" placeholder="Color" type="text"><br>
          <label for="">Code :</label>
          <input name="code" style="width: 49%;border-radius:5px;margin-bottom:30px" placeholder="Code" type="text"><br>

          <br>
          <button type="submit" class="modal__btn">Add &rarr;</button>
      </form>
      <a href="#m4-c" class="link-2"></a>
    </div>
  </div>
</div>
<!-- /modal 1 -->
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
