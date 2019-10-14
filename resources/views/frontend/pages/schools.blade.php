    <div style="padding:10%">    
        <h2 class="text-center">SCHOOL IN BARANGAY BAGBAG </h2>
        <h4 class="text-center">List of {{$schoolCount}} School/s</h4>
        <br>
        <ul>
            <div class="row">
            @forelse ($schools as $school)
                    <div class="col-sm-4" style="margin-bottom:4%">
                        <li><b>Name: {{$school->name}}</b></li>
                        <li>Address: {{$school->address}}</li>
                        <li>Level: {{$school->Level}}</li>
                        <li>Contact: {{$school->Contact}}</li>
                    </div>
            @empty
                    <label class="text-center">No School Available</label>
            @endforelse
            </div>
        </ul>
    </div>