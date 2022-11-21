<?php
require('../stripe-php-master/init.php');

$PublishableKey="pk_test_51M4rnuSFaR5B9DceBCZi7WfYs5kpazBm2lqXp9pwhjTL4GhlOwpGhrHB96z6svvI7VyHmBhj01yUQAnl1s6HahVW00jMkIqXsT";

$secret_key="sk_test_51M4rnuSFaR5B9Dce5FNa8Kw47pZhm9LxaARTsRM6nKmS18jwRbdQeyZiQHicnrtBw6OA05VZisFtynVODjnOsHD300syKEX9Sx";

\Stripe\Stripe::setApiKey($secret_key);


?>