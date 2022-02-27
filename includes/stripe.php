<?php
  require('stripe/init.php');

  $publishKey = "pk_test_51JCVlWSGWjnNyG5FyfOpq3i1XZeamKArOGfBQtIYZ65ufnHv4b57Ixg6enkdDNGKe8uKNv5KMO8aqhGpTO7U4TZL00DTG9iQVS";
  $secretKey = "sk_test_51JCVlWSGWjnNyG5FAQvWts0UynXuLACUHossHJuoviwzMX7pAM2D5sLtQGxcaSTBiPqtZunhGeSI1SS6n7bM2lY300e0Z4NH3x";

  \Stripe\Stripe::setApiKey($secretKey)
?>