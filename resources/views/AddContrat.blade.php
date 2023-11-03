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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <button type="submit" class="btn" style="">Add New User</button>

        </div>
    </div>
</div>



</x-app-layout>

