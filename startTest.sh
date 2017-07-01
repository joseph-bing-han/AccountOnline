#!/bin/bash

if [ ! -f ~/SoapUI-5.3.0-linux-bin.tar.gz ] ; then
    wget https://b537910400b7ceac4df0-22e92613740a7dd1247910134033c0d1.ssl.cf5.rackcdn.com/soapui/5.3.0/SoapUI-5.3.0-linux-bin.tar.gz -P ~/
fi

tar zvxf ~/SoapUI-5.3.0-linux-bin.tar.gz

