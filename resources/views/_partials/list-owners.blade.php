
    {{-- loop over all of the articles --}}
    {{-- each owner object goes into $owner --}}

@foreach (App\Models\Owner::all() as $owner)
        <p>{{$owner->fullName()}}</p>  
        {{-- uses fullname function on owners --}}
@endforeach 