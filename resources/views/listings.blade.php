<h1>{{$heading}}</h1>

@unless( count($listings) == 0)
@foreach($listings as $listing)
    <div class="listing">
        <h2><a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a> </h2>
        <p>{{$listing['description']}}</p>
    </div>
@endforeach

@else
<p>No listings found</p>
@endunless
