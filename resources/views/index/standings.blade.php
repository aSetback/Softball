@extends('layouts.main')

@section('title')
Standings
@endsection

@section('content')
<h3>Standings</h3>
@foreach ($standings AS $division => $divisionTeams)
<h4>Division {{ $division }}</h4>
<table>
    <tr>
        <th>Team</th>
        <th>Wins</th>
        <th>Losses</th>
        <th>Win Percentage</th>
    </tr>
    @foreach ($divisionTeams AS $team)
    <tr>
        <td>{{ $team->name }}</td>
        <td>{{ $team->wins }}</td>
        <td>{{ $team->losses }}</td>
        <td>{{ number_format($team->wins / ($team->wins + $team->losses), 3) }}</td>
    </tr>
    @endforeach
</table>
@endforeach

@endsection