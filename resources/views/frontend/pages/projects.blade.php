<br><br><div class="container">
    <h2 class="text-center">PROJECTS</h2>
    <div id="projectCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

    <ol class="carousel-indicators">
    @foreach ($projects as $key => $project)
        @if ($key === 0)
            <li data-target="#projectCarousel" data-slide-to="{{$key+1}}" class="active"></li>
        @else
            <li data-target="#projectCarousel" data-slide-to="{{$key+1}}"></li>
        @endif
    @endforeach
    </ol>

    <div class="carousel-inner">
    @foreach ($projects as $key => $project)
        @if ($key === 0)
                <div class="item active">
                    <img src="{{asset('app/public/images/'.$project->image)}}" alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption text-white" >
                    <h3 style="color:white">{{$project->title}}</h3>
                    <p style="color:white">{{$project->date}}</p>
                    <p style="color:white">{{date('M-d-Y', strtotime($project->description))}} </p>
                    </div>
                </div>
        @else
                <div class="item">
                    <img src="{{asset('app/public/images/'.$project->image)}}" alt="Los Angeles" style="width:100%;">
                    <div class="carousel-caption">
                    <h3 style="color:white">{{$project->title}}</h3>
                    <p style="color:white">{{$project->date}}</p>
                    <p style="color:white">{{date('M-d-Y', strtotime($project->description))}}</p>
                    </div>
                </div>
        @endif
    @endforeach
    </div>
        
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#projectCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#projectCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<br>
<br>