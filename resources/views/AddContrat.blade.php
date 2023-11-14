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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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
        <table style="width: 90%; margin-bottom:5%; margin-top:2%" class="rwd-table">
            <thead>
                <tr class="fr">
                    <th>Full name</th>
                    <th>Nationality</th>
                    <th>National Id</th>
                    <th>Adress</th>
                    <th>City</th>
                    <th>Work Phone</th>
                    <th>Activity</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>

                    @foreach ($user as $item)
                        <tr>
                                <td data-th="Supplier Code">
                                    {{$item->name}}
                                </td>
                                <td data-th="Supplier Code">
                                    {{$item->nat}}
                                </td>
                                <td data-th="Supplier Code">
                                    {{$item->nat_id}}
                                </td>
                                <td data-th="Supplier Code">
                                    {{$item->adress}}
                                </td>
                                </td>
                                <td data-th="Supplier Code">
                                    {{$item->city}}
                                </td>
                                <td data-th="Supplier Code">
                                    <input type="text" value="{{$item->wornum}}" onchange="showValue(this)">
                                </td>
                                <td data-th="Supplier Code">
                                    {{$item->activity}}
                                </td>
                                <td data-th="Supplier Code">
                                    {{$item->mobnum}}
                                </td>
                                <td data-th="Supplier C ode">

                                </td>
                            </tr>
                            @endforeach

                </tbody>
        </table>

    </div>

</x-app-layout>
<script>
    function showValue(inputElement) {
        var enteredValue = inputElement.value;
        console.log('Entered Value:', enteredValue);
    }
</script>

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
