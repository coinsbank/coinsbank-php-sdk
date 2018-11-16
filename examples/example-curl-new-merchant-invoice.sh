#!/bin/bash

# THIS SCRIPT WORKS WITH STAGING SERVER

# Before using enable Merchant Services and create API keys on Sandbox site https://devsys.coinsbank.com/app
key=""
secret=""

# test create order

# invoice amount
amt="333.33"

# Currency. See API docs for allowed currencies
cur="USD"

# Short invoice name
sname="Test invoice with openssl and curl"

# Desription for invoice
sdesc="Create new invoice on sandbox server"

# Merchant's internal invoice ID in CRM/EPR/E-commerce system
id="123456"

snameurl=$(echo -n $sname | sed -e 's/ /+/g')
sdescurl=$(echo -n $sdesc | sed -e 's/ /+/g')

# invoice expiration time
ttl=3600

# Customer's email
email="email.test@example.com"
emailurl=$(echo -n $email | sed -e 's/\@/%40/g')


# No need to change the following code
sandboxUrl="https://devsys.coinsbank.com/sapi"
method="merchant"
type="POST"

signdata=$(printf "_key=%s&_method=%s&_type=%s&amount=%s&currency=%s&serviceName=%s&serviceDescription=%s&merchantNumber=%s&ttl=%s&buyerEmail=%s" $key $method $type $amt $cur $snameurl $sdescurl $id $ttl $emailurl)
echo "Signature data: $signdata"

sign=$(echo -n $signdata | openssl sha512 -hmac $secret | cut -d ' ' -f 2)
echo "Signature: $sign"

json=$(printf '{"amount":"%s", "currency":"%s", "serviceName":"%s", "serviceDescription":"%s", "merchantNumber":"%s", "ttl":"%s", "buyerEmail":"%s"}' "$amt" "$cur" "$sname" "$sdesc" "$id" "$ttl" "$email")
echo "Request JSON data: $json"

request=$(echo "curl -d '$json' -H 'Content-Type: application/json' -H 'Key: $key' -H 'Signature: $sign' '$sandboxUrl/$method'")
echo "Request: $request"

curl -k -d "$json" -H "Content-Type: application/json" -H "Key: $key" -H "Signature: $sign" "$sandboxUrl/$method"
echo ""
