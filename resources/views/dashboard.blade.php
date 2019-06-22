@extends('layouts.common1')
@section('content')

<!--<div class="row">-->
<!--    <div class="col-md-9 ml-0 mr-10">-->
<!--        <h2>Apoinments</h2>-->
<!--    </div>-->
<!--    <div class="col-md-3">-->
<!--        <h2>Upcoming</h2>-->
<!--    </div>-->
<!--</div>-->
<div class="row">
    <div class="col-md-8 ml-0 mr-10">
        <div class="card card-calendar">
            <div class="card-body">
                <div id="fullCalendar"></div>
            </div>
        </div>
    </div>
    <div class="col-4 card">
        <div class="row mt-2">
            <div class="col-md-6 ">
                <button class="btn btn-danger btn-block">Add Customer</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-warning btn-block">Create Invoice</button>
            </div>
        </div>
        <!--       card view container of today upcoming appoinments ------>
        <div class="row scrollbar">
            <!--     singal  card view ------>
            <div class="card card-wtb col-11  ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-3 hub-img-container img-responsive">
                        <img class="hub-img" src="{{asset('assets/img/faces/marc.jpg')}}"/>
                    </div>
                    <div class="col-md-7 mt-3" style="align-self: center">
                        <p class="hub-pading-0"><b>Mike Davis</b></p>
                        <p class="hub-pading-0">Time : 9:00 AM</p>
                    </div>
                    <div class="col-md-2 hub-img-container">
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-danger btn-link">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-info btn-link">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--            end of singal card ---->

            <div class="card card-wtb col-11  ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-3 hub-img-container img-responsive">
                        <img class="hub-img" src="{{asset('assets/img/faces/avatar.jpg')}}"/>
                    </div>
                    <div class="col-md-7 mt-3" style="align-self: center">
                        <p class="hub-pading-0"><b>Avanthi Tharuka</b></p>
                        <p class="hub-pading-0">Time : 10:00 AM </p>
                    </div>
                    <div class="col-md-1 hub-img-container">
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-danger btn-link">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-info btn-link">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-wtb col-11  ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-3 hub-img-container img-responsive">
                        <img class="hub-img" src="{{asset('assets/img/faces/marc.jpg')}}"/>
                    </div>
                    <div class="col-md-7 mt-3" style="align-self: center">
                        <p class="hub-pading-0"><b>Damith Thiwanka</b></p>
                        <p class="hub-pading-0">Time : 9:00 AM</p>
                    </div>
                    <div class="col-md-1 hub-img-container">
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-danger btn-link">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-info btn-link">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-wtb col-11  ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-3 hub-img-container img-responsive">
                        <img class="hub-img" src="{{asset('assets/img/faces/Heshan.jpg')}}"/>
                    </div>
                    <div class="col-md-7 mt-3" style="align-self: center">
                        <p class="hub-pading-0"><b>Adam Franco</b></p>
                        <p class="hub-pading-0">Time : 9:00 AM</p>
                    </div>
                    <div class="col-md-1 hub-img-container">
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-danger btn-link">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-info btn-link">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-wtb col-11  ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-3 hub-img-container img-responsive">
                        <img class="hub-img" src="{{asset('assets/img/faces/card-profile1-square.jpg')}}"/>
                    </div>
                    <div class="col-md-7 mt-3" style="align-self: center">
                        <p class="hub-pading-0"><b>Damith Thiwanka</b></p>
                        <p class="hub-pading-0">Time : 9:00 AM</p>
                    </div>
                    <div class="col-md-1 hub-img-container">
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-danger btn-link">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-info btn-link">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-wtb col-11  ml-auto mr-auto">
                <div class="row">
                    <div class="col-md-3 hub-img-container img-responsive">
                        <img class="hub-img" src="{{asset('assets/img/faces/card-profile2-square.jpg')}}"/>
                    </div>
                    <div class="col-md-7 mt-3" style="align-self: center">
                        <p class="hub-pading-0"><b>Damith Thiwanka</b></p>
                        <p class="hub-pading-0">Time : 9:00 AM</p>
                    </div>
                    <div class="col-md-1 hub-img-container">
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-danger btn-link">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <div class="row">
                            <button type="button" class="btn hub-btn-cancel btn-info btn-link">
                                <i class="material-icons">edit</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--       end of Card  container------>

    </div>
</div>
<div class="container-fluid">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-3  active">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 1" class="thumb">
                            <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=1"
                                 alt="slide 1">
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 3" class="thumb">
                            <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=2"
                                 alt="slide 2">
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 4" class="thumb">
                            <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=3"
                                 alt="slide 3">
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 5" class="thumb">
                            <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=4"
                                 alt="slide 4">
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 6" class="thumb">
                            <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=5"
                                 alt="slide 5">
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 7" class="thumb">
                            <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=6"
                                 alt="slide 6">
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 8" class="thumb">
                            <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=7"
                                 alt="slide 7">
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-3  ">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="image 2" class="thumb">
                            <img class="img-fluid mx-auto d-block" src="//via.placeholder.com/600x400?text=8"
                                 alt="slide 8">
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


@stop
@section('scripts')
<script>
    $(document).ready(function () {
        $calendar = $('#fullCalendar');

        today = new Date();
        y = today.getFullYear();
        m = today.getMonth();
        d = today.getDate();

        $calendar.fullCalendar({
            viewRender: function (view, element) {
                // We make sure that we activate the perfect scrollbar when the view isn't on Month
                if (view.name != 'month') {
                    $(element).find('.fc-scroller').perfectScrollbar();
                }
            },
            header: {
                left: 'title',
                center: 'month,agendaWeek,agendaDay',
                right: 'prev,next,today'
            },
            defaultDate: today,
            selectable: true,
            selectHelper: true,
            views: {
                month: { // name of view
                    titleFormat: 'MMMM YYYY'
                    // other view-specific options here
                },
                week: {
                    titleFormat: " MMMM D YYYY"
                },
                day: {
                    titleFormat: 'D MMM, YYYY'
                }
            },

            select: function (start, end) {

                // on select we show the Sweet Alert modal with an input
                swal({
                    title: 'Create an Event',
                    html: '<div class="form-group">' +
                        '<input class="form-control" placeholder="Event Title" id="input-field">' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function (result) {

                    var eventData;
                    event_title = $('#input-field').val();

                    if (event_title) {
                        eventData = {
                            title: event_title,
                            start: start,
                            end: end
                        };
                        $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                    }

                    $calendar.fullCalendar('unselect');

                })
                    .catch(swal.noop);
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events


            // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
            events: [{
                title: 'All Day Event',
                start: new Date(y, m, 1),
                className: 'event-default'
            },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d - 4, 6, 0),
                    allDay: false,
                    className: 'event-rose'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d + 3, 6, 0),
                    allDay: false,
                    className: 'event-rose'
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d - 1, 10, 30),
                    allDay: false,
                    className: 'event-green'
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d + 7, 12, 0),
                    end: new Date(y, m, d + 7, 14, 0),
                    allDay: false,
                    className: 'event-red'
                },
                {
                    title: 'Md-pro Launch',
                    start: new Date(y, m, d - 2, 12, 0),
                    allDay: true,
                    className: 'event-azure'
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false,
                    className: 'event-azure'
                },
                {
                    title: 'Click for Creative Tim',
                    start: new Date(y, m, 21),
                    end: new Date(y, m, 22),
                    url: 'http://www.creative-tim.com/',
                    className: 'event-orange'
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 21),
                    end: new Date(y, m, 22),
                    url: 'http://www.creative-tim.com/',
                    className: 'event-orange'
                }
            ]
        });


        $('#carouselExample').on('slide.bs.carousel', function (e) {


            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 4;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    }
                    else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });


        $('#carouselExample').carousel({
            interval: 2000
        });


        $(document).ready(function () {
            /* show lightbox when clicking a thumbnail */
            $('a.thumb').click(function (event) {
                event.preventDefault();
                var content = $('.modal-body');
                content.empty();
                var title = $(this).attr("title");
                $('.modal-title').html(title);
                content.html($(this).html());
                $(".modal-profile").modal({show: true});
            });

        });
    });
</script>
@stop

