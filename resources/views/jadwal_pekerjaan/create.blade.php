@extends('jadwal_pekerjaan.layout.form.form')

@section('head')
    <title>Form Jadwal Pekerjaan</title>
@endsection

@section('body')
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Form Data Jadwal Pekerjaan</h2>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('jadwal.pekerjaan.index') }}" class="btn btn-danger rounded pull-right">CLOSE</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {

            /*------------------------------------------
            --------------------------------------------
            Get Site URL
            --------------------------------------------
            --------------------------------------------*/
            var SITEURL = "{{ url('/') }}";

            /*------------------------------------------
            --------------------------------------------
            CSRF Token Setup
            --------------------------------------------
            --------------------------------------------*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*------------------------------------------
            --------------------------------------------
            FullCalender JS Code
            --------------------------------------------
            --------------------------------------------*/
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/jadwal-pekerjaan/create",
                displayEventTime: true,
                editable: true,
                businessHours: true, // display business hours
                listMonths: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                // select: function(start, end, allDay) {
                //     var title = prompt('Nama Pekerjaan:');
                //     var shift = prompt('Shift:');
                //     var location = prompt('Lokasi:');
                //     var section = prompt('Section (PWR atau PWM):');
                //     if (title && shift && location && section) {
                //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                //         $.ajax({
                //             url: SITEURL + "/fullcalenderAjax",
                //             data: {
                //                 title: title,
                //                 start: start,
                //                 end: end,
                //                 shift: shift,
                //                 location: location,
                //                 section: section,
                //                 type: 'add'
                //             },
                //             type: "POST",
                //             success: function(data) {
                //                 displayMessage("Jadwal berhasil dibuat!");

                //                 calendar.fullCalendar('renderEvent', {
                //                     id: data.id,
                //                     color: data.color,
                //                     title: title,
                //                     start: start,
                //                     end: end,
                //                     allDay: allDay
                //                 }, true);

                //                 calendar.fullCalendar('unselect');
                //             }
                //         });
                //     }
                // },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    $.ajax({
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            title: event.title,
                            start: start,
                            end: end,
                            id: event.id,
                            type: 'update'
                        },
                        type: "POST",
                        success: function(response) {
                            displayMessage("Jadwal berhasil diubah!");
                        }
                    });
                },
                eventClick: function(event) {
                    var deleteMsg = confirm("Apakah anda yakin menghapus data ini?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function(response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Data jadwal berhasil dihapus!");
                            }
                        });
                    }
                }

            });

        });

        /*------------------------------------------
        --------------------------------------------
        Toastr Success Code
        --------------------------------------------
        --------------------------------------------*/
        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>
@endsection
