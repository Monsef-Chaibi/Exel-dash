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
            border-radius:10px
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
}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="#m1-o">
                    <button class="btn" style="">
                        Add New User
                    </button>
                </a>
                <a href="#m1-o">
                    <button class="btn" style="">
                        Add New User
                    </button>
                </a>
                <a href="#m1-o">
                    <button class="btn" style="">
                        Add New User
                    </button>
                </a>
            </div>
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
