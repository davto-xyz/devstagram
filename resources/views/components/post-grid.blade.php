@if ($posts->count())
    @foreach ($posts as $post )
    <div class="container grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-6 ">
        <h1>{{ $post->user->username}}</h1>
        <a href="{{ route('posts.show', ['user'=> $post->user, 'post'=>$post] ) }}">                    
            <div class='bg-cover bg-center' style="background-image:url(' {{asset('uploads') . '/'. $post->imagen }} ')">
                <div class='h-96 w-96'></div>
            </div>
        </a>
    </div>
    @endforeach
@else
<p class='text-center font-bold'>No hay post</p>
@endif