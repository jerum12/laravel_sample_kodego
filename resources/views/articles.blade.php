<h1>Articles</h1>


@foreach($articles as $article)
<p>
    Title :
<a href="{{url('eloquent/'.$article['id'])}}" class="article"> 
    {{$article['title']}}
</a>
</p>

@endforeach