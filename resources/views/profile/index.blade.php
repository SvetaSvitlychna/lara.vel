<h1>{{$title}}</h1>


{{-- @forelse ($profiles as $profile)
    <a href="{{ route('profiles.show', $profile->id) }}">
        <h2>{{ $profile->last_name }} {{ $profile->first_name }}</h2>
    </a>
@empty
    <h2>No Profiles Yet</h2>
@endforelse --}}

<table>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Full name</th>
    </tr>

@forelse ($profiles as $profile)
    <tr>
        <td>{{ $profile->first_name }}</td>
        <td>{{ $profile->last_name }}</td>
        <td>{{ $profile->full_name }}</td>
    </tr>

@empty
    <h2>No Profiles Yet</h2>

@endforelse
</table>