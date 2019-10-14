<div class="container">
        <h2 class="text-center">ANNOUNCEMENT</h2>
        <div id="announcementCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

        <ol class="carousel-indicators">
        @foreach ($announcements as $key => $announcement)
            @if ($key === 0)
                <li data-target="#announcementCarousel" data-slide-to="{{$key+1}}" class="active"></li>
            @else
                <li data-target="#announcementCarousel" data-slide-to="{{$key+1}}"></li>
            @endif
        @endforeach
        </ol>

        <div class="carousel-inner">
        @foreach ($announcements as $key => $announcement)
            @if ($key === 0)
                    <div class="item active">
                        <img src="img/upcoming_announcement_1.png" alt="Los Angeles" style="width:100%;">
                        <div class="carousel-caption text-white" >
                        <h3 style="color:white">{{$announcement->title}}</h3>
                        <p style="color:white">{{$announcement->description}}</p>
                        <p style="color:white">{{date('M-d-Y', strtotime($announcement->date))}} </p>
                        </div>
                    </div>
            @else
                    <div class="item">
                        <img src="img/upcoming_announcement_1.png" alt="Los Angeles" style="width:100%;">
                        <div class="carousel-caption">
                        <h3 style="color:white">{{$announcement->title}}</h3>
                        <p style="color:white">{{$announcement->description}}</p>
                        <p style="color:white">{{date('M-d-Y', strtotime($announcement->date))}}</p>
                        </div>
                    </div>
            @endif
        @endforeach
        </div>
            
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#announcementCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#announcementCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
</div>
