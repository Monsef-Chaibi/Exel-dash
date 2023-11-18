<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>
    <style>
        /* all */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

:root {
  --main-blue: #71b7e6;
  --main-purple: #9b59b6;
  --main-grey: #ccc;
  --sub-grey: #d9d9d9;
}


/* container and form */
.container {
  max-width: 700px;
  width: 100%;
  background: none;
  padding: 25px 30px;
  border-radius: 5px;
}
.container .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.container .title::before {
  content: "";
  position: absolute;
  height: 3.5px;
  width: 30px;
  background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
  left: 0;
  bottom: 0;
}

.container form .user__details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
/* inside the form user details */
form .user__details .input__box {
  width: calc(100% / 2 - 20px);
  margin-bottom: 15px;
}

.user__details .input__box .details {
  font-weight: 500;
  margin-bottom: 5px;
  display: block;
}
.user__details .input__box input {
  height: 45px;
  width: 100%;
  outline: none;
  border-radius: 10px;
  border: 1px solid var(--main-grey);
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  color: black;
}

.user__details .input__box input:focus,
.user__details .input__box input:valid {
  border-color: var(--main-purple);
}

/* inside the form gender details */

form .gender__details .gender__title {
  font-size: 20px;
  font-weight: 500;
}

form .gender__details .category {
  display: flex;
  width: 42%;
  margin: 15px 0;
  justify-content: space-between;
}

.gender__details .category label {
  display: flex;
  align-items: center;
}

.gender__details .category .dot {
  height: 18px;
  width: 18px;
  background: var(--sub-grey);
  border-radius: 50%;
  margin: 10px;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}

#dot-1:checked ~ .category .one,
#dot-2:checked ~ .category .two,
#dot-3:checked ~ .category .three {
  border-color: var(--sub-grey);
  background: var(--main-purple);
}

form input[type="radio"] {
  display: none;
}

/* submit button */
form .button {
  height: 45px;
  margin: 45px 0;
}

form .button input {
  height: 100%;
  width: 100%;
  outline: none;
  color: #fff;
  border: none;
  font-size: 18px;
  font-weight: 500;
  border-radius: 5px;
  background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
  transition: all 0.3s ease;
}

form .button input:hover {
  background: linear-gradient(-135deg, var(--main-blue), var(--main-purple));
}

@media only screen and (max-width: 584px) {
  .container {
    max-width: 100%;
  }

  form .user__details .input__box {
    margin-bottom: 15px;
    width: 100%;
  }

  form .gender__details .category {
    width: 100%;
  }

  .container form .user__details {
    max-height: 300px;
    overflow-y: scroll;
  }

  .user__details::-webkit-scrollbar {
    width: 0;
  }
}

    </style>
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

    <div class="py-12 flex justify-center items-center h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="title">Add User</div>
                        <form action="/StoreUser" method="POST">
                            @csrf
                          <div class="user__details">
                            <div class="input__box">
                              <span class="details">Name</span>
                              <input type="text" name="name" placeholder="E.g: John Smith" required>
                            </div>
                            <div class="input__box">
                               <span class="details">Email</span>
                               <input type="email" name="email" placeholder="****@gmail.com" >
                            </div>
                            <div class="input__box">
                              <span class="details">Password</span>
                              <input type="password" name="pass" placeholder="********" required>
                            </div>
                            <div class="input__box">
                              <span class="details">Confirm Password</span>
                              <input type="password" name="pass_ver" placeholder="********" required>
                            </div>

                        </div>
                        <div class="gender__details">
                            <input type="radio" value="0" name="role" id="dot-1">
                            <input type="radio" value="2" name="role" id="dot-2">
                            <span class="gender__title">Type</span>
                            <div class="category">
                                <label for="dot-1">
                                <span class="dot one"></span>
                                <span>Operation</span>
                              </label>
                              <label for="dot-2">
                                <span class="dot two"></span>
                                <span>Traffic</span>
                              </label>
                            </div>
                          </div>
                          <div class="input__box">
                            <span class="details">Plant-Key :</span>
                            <input style="color:black;width: 500px;border-radius:10px"  placeholder="Ex 1885,1884,1886" type="text" name="cond" >
                            <p style="color: red; margin-top:7px;font-size:15px">* If you want to set all parent keys to it, set it to 0.</p>
                        </div>
                          <div class="button">
                              <input  id="submitBtn" type="submit" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
