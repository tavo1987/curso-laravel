@forelse($posts as $post)
    <article class="mb-4 p-4 bg-grey-lighter shadow-sm">
        <h2 class="text-lg">{{ $post }}</h2>
    </article>
@empty
    <h2>No hay noticias</h2>
@endforelse