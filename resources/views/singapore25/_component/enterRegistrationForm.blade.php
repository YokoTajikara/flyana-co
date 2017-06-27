{{ Form::open(["url" => "https://" . $_SERVER["HTTP_HOST"] . "/singapore25/registration", "method" => "post", "name" => "registration"]) }}
	{{ Form::hidden("destination", "") }}
{{ Form::close() }}
