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
                    <div id="calendar"></div>
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
            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/jadwal-pekerjaan/create",
                displayEventTime: false,
                eventRender: function(event, element, view) {
                    event.allDay = event.allDay === 'true' || event.allDay === true;
                },
                selectable: true,
                selectHelper: true,
                eventDrop: function(event, delta) {
                    var start = moment(event.start).format("Y-MM-DD");
                    $.ajax({
                        url: SITEURL + '/fullcalenderAjax',
                        type: "POST",
                        data: {
                            start: start,
                            end: start,
                            id: event.id,
                            type: 'update',
                        },
                        success: function(response) {
                            displayMessage("Berhasil diperbaharui");
                        }
                    });
                },
                eventClick: function(event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                id: event.id,
                                type: 'delete',
                            },
                            success: function(response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Berhasil dihapus");
                            }
                        });
                    }
                }
            });

            function displayMessage(message) {
                toastr.success(message, 'Jadwal Pekerjaan');
            }
        });
    </script>
@endsection
