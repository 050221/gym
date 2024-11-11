@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'GYM')
<img src="{{ asset('assets/icons/icon-192x192.png') }}" class="logo" alt="gym Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
