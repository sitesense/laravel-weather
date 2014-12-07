<div class="weather-widget">
	<h4>{{ 'Local Weather' or $current['name'] }}</h4>

	<div class="temp">
		<span class="degrees">{{ ceil($current['main']['temp']) }}&deg; {{ $units == 'metric' ? 'C' : 'F' }}</span>
		<span class="details">
			{{ Lang::get("weather.humidity") }}: <em class="pull-right">{{ ceil( $current['main']['humidity'] ) }}%</em><br>
			{{ Lang::get("weather.clouds") }}: <em class="pull-right">{{ ceil($current['clouds']['all']) }}%</em><br>
			{{ Lang::get("weather.wind") }}: ({{ Weather::getWindDirection($current['wind']['deg']) }}): <em class="pull-right">{{ ceil($current['wind']['speed'] * 3.6).'kph'. ' / '. ceil($current['wind']['speed'] * 3.6 / 1.609344).'mph' }}</em><br>
		</span>
	</div>

	<h5>{{ $current['weather'][0]['description'] }}</h5>

	@if($forcast['cnt'] > 1)
	<table width="100%">
		@foreach($forcast['list'] as $key => $value)
		<tr>
			<td>{{ date($date, $value['dt']) }}</td>
			<td><i data-icon="{{ Weather::getIcon($value['weather'][0]['id']) }}"></i></td>
			<td class="text-right">{{ ceil($value['temp']['day']) }}&deg;</td>
			<td class="text-right" style="opacity: 0.65;">{{ ceil($value['temp']['night']) }}&deg;</td>
		</tr>
		@endforeach
	</table>
	@endif

</div>
