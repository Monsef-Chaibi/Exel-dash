<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>
    <style>

.ag-courses_box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;

  padding: 50px 0;
}
.ag-courses_item {
  -ms-flex-preferred-size: calc(33.33333% - 30px);
  flex-basis: calc(33.33333% - 30px);

  margin: 0 15px 30px;

  overflow: hidden;

  border-radius: 28px;
}
.ag-courses-item_link {
  display: block;
  padding: 30px 20px;
  background-color: #121212;

  overflow: hidden;

  position: relative;
}
.ag-courses-item_link:hover,
.ag-courses-item_link:hover .ag-courses-item_date {
  text-decoration: none;
  color: #FFF;
}
.ag-courses-item_link:hover .ag-courses-item_bg {
  -webkit-transform: scale(10);
  -ms-transform: scale(10);
  transform: scale(10);
}
.ag-courses-item_title {
  min-height: 87px;
  margin: 0 0 25px;

  overflow: hidden;

  font-weight: bold;
  font-size: 30px;
  color: #FFF;

  z-index: 2;
  position: relative;
}
.ag-courses-item_date-box {
  font-size: 18px;
  color: #FFF;

  z-index: 2;
  position: relative;
}
.ag-courses-item_date {
  font-weight: bold;
  color: #f9b234;

  -webkit-transition: color .5s ease;
  -o-transition: color .5s ease;
  transition: color .5s ease
}
.ag-courses-item_bg {
  height: 128px;
  width: 128px;
  background-color: #f9b234;

  z-index: 1;
  position: absolute;
  top: -75px;
  right: -75px;

  border-radius: 50%;

  -webkit-transition: all .5s ease;
  -o-transition: all .5s ease;
  transition: all .5s ease;
}
.ag-courses_item:nth-child(2n) .ag-courses-item_bg {
  background-color: #3ecd5e;
}
.ag-courses_item:nth-child(3n) .ag-courses-item_bg {
  background-color: #e44002;
}
.ag-courses_item:nth-child(4n) .ag-courses-item_bg {
  background-color: #952aff;
}
.ag-courses_item:nth-child(5n) .ag-courses-item_bg {
  background-color: #cd3e94;
}
.ag-courses_item:nth-child(6n) .ag-courses-item_bg {
  background-color: #4c49ea;
}



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
    </style>
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="ag-format-container">
                        <div class="ag-courses_box">
                          <div class="ag-courses_item">
                            <a href="/archivestatsgtdelivered" class="ag-courses-item_link">
                              <div class="ag-courses-item_bg"></div>

                              <div class="ag-courses-item_title">
                              GT Delivered : <span id='ctdev'></span>
                              </div>

                              <div class="ag-courses-item_date-box">
                                Last Update :
                                <span id="datectdev" class="ag-courses-item_date">

                                </span>
                              </div>
                            </a>
                          </div>
                          <div class="ag-courses_item">
                            <a href="archivestatsgtsttrafic" class="ag-courses-item_link">
                              <div class="ag-courses-item_bg"></div>

                              <div class="ag-courses-item_title">
                                GT Sent To Traffic : <span id="ctsent"></span>
                              </div>

                              <div class="ag-courses-item_date-box">
                                Last Update :
                                <span id="datectsent" class="ag-courses-item_date">

                                </span>
                              </div>
                            </a>
                          </div>
                          <div class="ag-courses_item">
                            <a href="/archivestatsiostimarah" class="ag-courses-item_link">
                              <div class="ag-courses-item_bg"></div>

                              <div class="ag-courses-item_title">
                               Istimarah Printed : <span id="istimarah"></span>
                              </div>

                              <div class="ag-courses-item_date-box">
                                Last Update :
                                <span id="dateistimarah" class="ag-courses-item_date">

                                </span>
                              </div>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
$(document).ready(function() {
    function updateLiveValue1() {
        $.ajax({
            url: "{{ route('archivelive') }}",
            method: "GET",
            success: function(data) {
                    // Update values based on conditions
                    $('#ctdev').text(data.ctdev);
                    $('#ctsent').text(data.ctsent);
                    $('#istimarah').text(data.istimarah);
                    $('#datectdev').text(data.datectdev);
                    $('#datectsent').text(data.datectsent);
                    $('#dateistimarah').text(data.dateistimarah);

            }
        });
    }

    // Update live value initially
    updateLiveValue1();

    // Update live value every 5 seconds (adjust this interval as needed)
    setInterval(updateLiveValue1, 5000);
});
</script>
