<section class="upcoming_event section_padding event">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h4>Upcoming Event</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($events as $event)
                <div class="col-md-6 col-xl-6">
                    <div class="upcoming_event_1">
                        <img src="img/upcoming_event_1.png" alt="#">
                        <div class="upcoming_event_text">
                            <div class="date">
                                <h3>{{date('d', strtotime($event->date))}} <span>{{date('M', strtotime($event->date))}}</span> </h3>
                            </div>
                            <div class="time">
                                <ul class="list-unstyle">
                                    <li> <span class="ti-time"></span>{{$event->time_from . ':' . $event->time_to}}</li>
                                    <li> <span class="ti-location-pin"></span>{{$event->location}}</li>
                                </ul>
                            </div>
                            <p>{{$event->description}}</p>
                            <h3 style="color:#fd7e14;">{{$event->title}}</h3>
                        </div>
                    </div>
                </div>
            @empty
                <h1>NO UPCOMING EVENTS</h1>
            @endforelse
            
            
        </div>
    </div>
</section>