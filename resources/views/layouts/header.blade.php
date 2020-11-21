<div class="header">
	<div class="left">
		<svg version="1.1" id="Guides" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		width="40px" height="60px" viewBox="0 0 40 60" enable-background="new 0 0 40 60" xml:space="preserve">
		<g>
			<path fill="#0F5EF7" d="M16,17.6l15.6-5.9c0.2-0.1,0.3-0.1,0.5-0.2V7.6c0-2.6-2.6-4.4-5.1-3.5L7.6,11.5c-2.6,1-4.3,3.5-4.3,6.3
			v34.7c0,2.6,2.6,4.4,5.1,3.5l2.6-1c-0.2-0.6-0.3-1.1-0.3-1.8V25.3C10.7,21.9,12.8,18.8,16,17.6z"/>
			<path fill="#FFB800" d="M33.7,14.1c-0.4,0-0.7,0.1-1.1,0.2l-0.6,0.2L17,20.2c-2.1,0.8-3.5,2.8-3.5,5v27.9c0,0.3,0,0.5,0.1,0.7
			c0.3,1.3,1.6,2.3,2.9,2.3c0.4,0,0.7-0.1,1.1-0.2L33.3,50c2.1-0.8,3.5-2.8,3.5-5V17.1C36.7,15.4,35.3,14.1,33.7,14.1z M26.5,28.6
			c1.9-0.6,3.5,0.3,3.5,2.2c0,1.8-1.5,3.9-3.5,4.6c-2,0.8-3.7-0.2-3.7-2.1C22.8,31.3,24.5,29.2,26.5,28.6z M20.1,45.8
			c0-3.3,2.9-7.1,6.3-8.4c3.2-1.2,5.6,0.2,5.6,3.1L20.1,45.8z"/>
		</g>
	</svg>
	<h3 class="logo-text">TrackPay</h3>
</div>
<div class="right">
	<svg version="1.1" id="Guides" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
	<g>
		<circle fill="#0F5EF7" cx="20" cy="13.7" r="6.6"/>
		<path fill="#0F5EF7" d="M20,21.6c-5.4,0-9.9,3.8-11,8.8c-0.3,1.3,0.7,2.5,2,2.5h18.1c1.3,0,2.2-1.2,2-2.5
		C29.9,25.4,25.4,21.6,20,21.6z"/>
	</g>
</svg>
<h3 class="admin-text">{{auth()->user()->first_name}}</h3>
<!-- <a class="time-entry" href="{{ url('/time-entry') }}" target="_blank">Time In/Out</a> -->
<a class="logout" href="/logout">Log Out</a>
</div>
</div>