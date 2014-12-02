# Blade Alternate

Blade Alternate is a small extension to blade that adds the common operation of changing values throughout a loop. Now thats a horrible description, so heres an example:

    @foreach($users as $user)
    	<tr class="@alternate('odd', 'even')">...</tr>
    @endforeach

Which would result in alternating rows of a table, with the class switching between odd and even every time. This works with any number of arguments, for example, you might see a image gallery with three columns.

    @foreach($images as $image)
    	<img src="{{ $img->url }}" class="@alternate('left', 'mid', 'right')" />
    @endforeach

## Installation

Add `adenfraser/blade-alternate` to `composer.json`.

    "adenfraser/blade-alternate": "1.0.*"
    
Run `composer update` to pull down the latest version of Blade Alternate. Now open up `app/config/app.php` and add the service provider to your `providers` array, *after* the ViewServiceProvider.

    'providers' => array(
    	...
    		'Illuminate\View\ViewServiceProvider',
    		'AdenFraser\BladeAlternate\BladeAlternateServiceProvider',
		...
    )