<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-xrRPeRfbzjUpu8Gm/D6xxrWyJl7Ia3i1sX21aqNfhXbwLgiPzZ3Bc+usMybAk9P96J/T6EKanX+9bH1bwmvBhw=="
        crossorigin="anonymous" />
    <style>
        #edit-modal {
    visibility: hidden;
    opacity: 0;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(77, 77, 77, .7);
    transition: all .4s;
}
        @import 'https://fonts.googleapis.com/css?family=Open+Sans:600,700';

        * {
            font-family: 'Open Sans', sans-serif;
        }

        /* If you like this, be sure to ❤️ it. */
        .wrapper {
            height: 100vh;
            /* This part is important for centering the content */
            display: flex;
            align-items: center;
            justify-content: center;
            /* End center */
            background: -webkit-linear-gradient(to right, #834d9b, #d04ed6);
            background: linear-gradient(to right, #834d9b, #d04ed6);
        }

        .wrapper a {
            display: inline-block;
            text-decoration: none;
            padding: 15px;
            background-color: #fff;
            border-radius: 3px;
            text-transform: uppercase;
            color: #585858;
            font-family: 'Roboto', sans-serif;
        }

        .modal {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
        }

        .modal:target {
            visibility: visible;
            opacity: 1;
        }

        .modal__content {
            border-radius: 4px;
            position: relative;
            width: 80%;
            max-width: 90%;
            background: #fff;
            padding: 1em 2em;
        }

        .modal__footer {
            text-align: right;

            a {
                color: #585858;
            }

            i {
                color: #d02d2c;
            }
        }

        .modal__close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #585858;
            text-decoration: none;
        }

        .rwd-table {
            margin: auto;
            width: 500px;
            min-width: 300px;
            max-width: 100%;
            border-collapse: collapse;
        }

        .rwd-table tr:first-child {
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
            0% {
                -webkit-transform: translateX(0)
            }

            25% {
                -webkit-transform: translateX(-10px)
            }

            75% {
                -webkit-transform: translateX(10px)
            }

            100% {
                -webkit-transform: translateX(0)
            }
        }

        @keyframes leftRight {
            0% {
                transform: translateX(0)
            }

            25% {
                transform: translateX(-10px)
            }

            75% {
                transform: translateX(10px)
            }

            100% {
                transform: translateX(0)
            }
        }
    </style>

    <!-- Additional styles and scripts for SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    @if(Auth::user()->aduser !== '1')
    <script>
        window.location.href = "/";
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
                            @foreach ($users as $user)
                                <tr>
                                    <td data-th="Supplier Code">
                                        {{ $user->name }}
                                    </td>
                                    <td data-th="Supplier Name">
                                        {{ $user->email }}
                                    </td>
                                    <td data-th="Supplier Name">
                                        @if ($user->role == 4)
                                            Coordinator
                                        @endif
                                        @if ($user->role == 1)
                                            Admin
                                        @endif
                                        @if ($user->role == 2)
                                            Traffic
                                        @endif
                                        @if ($user->role == 3)
                                            Observe
                                        @endif
                                        @if ($user->role == 0)
                                            Accountant
                                        @endif
                                        @if ($user->role == 5)
                                            Uploader
                                        @endif
                                    </td>
                                    <td data-th="Supplier Name">
                                        @if ($user->cond == 0)
                                            All
                                        @else
                                            {{ $user->cond }}
                                        @endif
                                    </td>
                                    <td data-th="Invoice Date">
                                        @if ($user->created_at)
                                        {{ $user->created_at->addHours(3) }}
                                        @endif
                                    </td>
                                    <td data-th="Invoice Date">
                                        <a href="#" onclick="confirmDelete('/deleteuser/{{ $user->id }}')">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="#" onclick="openEditModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}', '{{ $user->cond }}', '{{ $user->aduser }}', '{{ $user->addata }}', '{{ $user->adjuf }}', '{{ $user->rmvgt }}', '{{ $user->archive }}' )">
                                            <i class='fa fa-edit' style="font-size:25px;margin-left:10px"></i>
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

    <!-- Modal -->
    <div id="edit-modal" class="modal">
        <div class="modal__content"></div>
    </div>

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

    function openEditModal(id, name, email, role, cond, aduser, addata, adjuf, rmvgt, archive) {
    const modal = document.getElementById('edit-modal');
    const modalContent = modal.querySelector('.modal__content');

    modalContent.innerHTML = `
        <h1 style='color:black'>Edit User</h1>
        <form action="/edituser/${id}" method="post">
            @csrf
            @method('PUT')

            <div>
                <label for="edit-name">Name:</label>
                <input type="text" style='border-radius:10px' id="edit-name" name="edit-name" value="${name}">
                <label for="edit-email" style='margin-left:300px'>Email:</label>
                <input type="text" style='border-radius:10px' id="edit-email" name="edit-email" value="${email}">
            <br>
            <br>

                <label for="edit-role">Role:</label>
                <input type="text" style='border-radius:10px' id="edit-role" name="edit-role" value="${role}">
                <label for="edit-cond" style='margin-left:300px'>Condition:</label>
                <input type="text" style='border-radius:10px' id="edit-cond" placeholder="Ex 1885,1884,1886" name="edit-cond" value="${cond}">
                <p style="color: red; margin-top:7px;font-size:15px">* If you want to set it admin set 1 or Traffic set 2 or Operation set 0 <span style="color: red; margin-top:7px;font-size:15px;margin-left:250px">* If you want to set all parent keys to it, set it to 0.</span></p>
                <br>
                <label for="edit-role">Password :</label>
                <input type="text" style='border-radius:10px' id="" name="pass">

                <label for="edit-cond" style='margin-left:300px'>Archive :</label>
                <input type="checkbox" style='border-radius:10px' value='1' name="archive" id="archiveCheckbox" >
                <label style='margin-left:5px'>Yes</label>
            </div>

            <br>
            <br>
            <button style='font-size:25px' type="submit" class="modal__btn">Save &rarr;</button>
        </form>

        <a href="#" class="modal__close" onclick="closeEditModal()">&times;</a>
    `;
     // Check and set the state of the Archive checkbox
     const archiveCheckbox = document.getElementById('archiveCheckbox');
    archiveCheckbox.checked = archive === '1';

    modal.style.visibility = 'visible';
    modal.style.opacity = 1;
}

function closeEditModal() {
    const modal = document.getElementById('edit-modal');
    modal.style.visibility = 'hidden';
    modal.style.opacity = 0;
}

    </script>
</x-app-layout>
