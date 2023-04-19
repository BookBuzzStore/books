<?php

$url = "https://xn-btdbbgm6cc3bi8a1kffdahg6h.myshopify.com/admin/api/2023-04/graphql.json";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
   "Accept: application/json",
   "X-Shopify-Access-Token: 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",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
"query": "query { collection(id: \"gid://shopify/Collection/285957357760\") { products(first:10) { edges { node { id title description featuredImage { url } variants(first: 1) { edges { node { price } } } } } } } }"
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
echo $resp;
curl_close($curl);
?>

