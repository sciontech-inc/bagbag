<section class="blog_part section_padding project">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h4>Projects</h4>
                    <h2>Barangay Bagbag previous and future Projects</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($projects as $project)
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog d-none d-sm-block d-lg-none">
                        <div class="card">
                            <img src="img/blog/blog_4.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <span class="dot">{{$project->date}}</span>
                                <a href="blog.html">
                                    <h5 class="card-title">{{$project->description}}</h5>
                                </a>
                                <a href=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h4 class="text-center" style="color:orange">NO ANNOUNCEMENT!</h4>
            @endforelse
            

        </div>
    </div>
</section>