<section class="about_part recreational_part announcement">
    @forelse ($announcements as $announcement)
         <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 offset-xl-1 col-xl-4">
                    <div class="about_text">
                        <h4>ANNOUNCEMENT</h4>
                        <h2>{{$announcement->title}}</h2>
                        <p>{{$announcement->description}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="about_img">
                        <img src="img/recreational.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h4 class="text-center" style="color:orange">NO ANNOUNCEMENT!</h4>
    @endforelse
    
    
</section>