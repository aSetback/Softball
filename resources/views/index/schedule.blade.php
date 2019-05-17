@extends('layouts.main')

@section('title')
Schedule
@endsection

@section('content')
<h3>Schedule</h3>
<p>
<label for="team">Division:</label>
<select id="division" onchange="schedule.update();">
    <option value="0">All divisions</option>
    @foreach ($divisions AS $division)
        <option 
        @if ($selectedDivisionId == $division->id)
            selected
        @endif
        value="{{ $division->id }}">{{ $division->name }}</option>
    @endforeach
</select>
<br />
<label for="team">Team:</label>
<select id="team" onchange="schedule.update();">
    <option value="0">All teams</option>
    @foreach ($teams AS $team)
        <option 
        @if ($selectedTeamId == $team->id)
            selected
        @endif
        value="{{ $team->id }}">{{ $team->name }}</option>
    @endforeach
</select>
<br />
<label for="location">Location:</label>
<select id="location" onchange="schedule.update();">
    <option value="0">All locations</option>
    @foreach ($locations AS $location)
        <option 
        @if ($selectedLocationId == $location->id)
            selected
        @endif
        value="{{ $location->id }}">{{ $location->name }}</option>
    @endforeach
</select>
</p>
<table id="standings">
    <tr>
        <th>Date</th>
        <th>Team 1</th>
        <th>Team 2</th>
        <th></th>
    </tr>
@foreach ($schedule AS $gameDate => $games)
        @foreach ($games AS $game)
        <tr>   
            <td>
                {{ $gameDate }}
            </td>
            <td>
                @if ($game->homeTeam->id == $selectedTeamId)
                    <strong>{{ $game->homeTeam->name }}</strong>
                @else 
                    {{ $game->homeTeam->name }}
                @endif
            </td>
            <td>
                @if ($game->awayTeam->id == $selectedTeamId)
                    <strong>{{ $game->awayTeam->name }}</strong>
                @else 
                    {{ $game->awayTeam->name }}
                @endif
            </td>
            <td>
                <small><a href="{{ $game->location->map_url }}" target="_blank">{{ $game->location->abbreviation }} </a></small>
            </td>
        </tr>
        @endforeach
@endforeach
</table>

@endsection

@section('js')
<script>
    var schedule = {
        update: function() {
            var division = $('#division').val();
            var team = $('#team').val();
            var location = $('#location').val();
            window.location = '/schedule/' + division + '/' + location + '/' + team;
        }
    };
</script>
@endsection