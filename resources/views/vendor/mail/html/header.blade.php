<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{URL::asset('images/logo/logo.png')}}" class="logo" alt="Edkonnect Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
