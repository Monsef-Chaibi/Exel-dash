<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-gray-900 dark:text-gray-100">
                <div class="ag-format-container" >
                    <div class="ag-courses_box" >

                        <div class="ag-courses_item">
                            <a  href="/AddContrat"  class="ag-courses-item_link">
                                <div class="ag-courses-item_bg"></div>

                                <div style="text-align: center;" class="ag-courses-item_title">
                                    Add New Contrat
                                </div>

                            </a>
                        </div>

                        <div class="ag-courses_item">

                        </div>
                        <div class="ag-courses_item">
                            <a href="#" class="ag-courses-item_link">
                                <div class="ag-courses-item_bg"></div>

                                <div class="ag-courses-item_title">
                                    Facture Semi : 0
                                </div>

                                <div class="ag-courses-item_date-box">
                                    Last Update :
                                    <span class="ag-courses-item_date">
                                        31.10.2022
                                    </span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <h1 style="width:600px;text-align: center; color: white; font-size: 30px; background: linear-gradient(135deg, #71b7e6, #9b59b6); padding: 10px; border-radius: 10px; margin-bottom: 10px;">Parcel Delivery System</h1>
                <div style="position: relative; display: inline-block;">
                    <input type="text" name="search" id="search" style="width:400px;border-radius: 10px; padding-right: 30px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); fill: #999;">
                        <path d="M21.7 20.3l-3-3a9 9 0 1 0-1.4 1.4l3 3a1 1 0 0 0 1.4 0 1 1 0 0 0 0-1.4zM5.2 16.8a7.5 7.5 0 1 1 11.3 0 7.5 7.5 0 0 1-11.3 0z"/>
                    </svg>
                </div>
            </div>
            <div>
                <table style="width: 100%; margin-bottom:5%; margin-top:2%" class="rwd-table">
                    <thead>
                      <tr class="fr">
                        <th>Sold-To-Party</th>
                        <th>Ship-To-Party</th>
                        <th>Billing Document</th>
                        <th>Create_at</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
    </script>

</x-app-layout>

