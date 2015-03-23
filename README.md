#######GoGetSSLv2 v1.0.8
####### NOTES #######
This is first inital release, i have done a ton of sandbox testing, and only several live testing, any issue's please submit.

###GoGetSSLv2 Extended Module For Blesta Billing System
[**Blesta**](http://www.blesta.com) is a professional web based billing and support application focusing on productivity and usability.

[**GoGetSSL**](https://www.gogetssl.com) offer's a wide range of SSL certificates and a reseller program.

This module is a extended version of the standard GoGetSSL Blesta Module, alot has been re-written and added.

## This module adds :
1. Allows certs to be added after order/purchase
2. Add support for HTTP/DNS Authentaction
3. Can download CSR/PKEY options
4. Can generate CSR Key's


## Installation instructions
1. [Download](https://github.com/lukesUbuntu/gogetsslv2/archive/master.zip) this module
2. Uncompress file, then inside the folder rename the root folder to *gogetsslv2* 
3. Upload *gogetsslv2* folder to your blesta root dir to */componets/modules/* directory.
3. Go to Blesta Admin, and click on Setings->Modules and it will list the GoGetSSLv2 module, Click on "INSTALL"
4. Go to GoGetSSLv2 module and add your GoGetSSL Reseller Account.

####### TODO #######
1. Still have language file to update
2. Clean up some of the template files
3. Generate CSR download key options need to be linked in.
4. Fix required install field Title,Internatinal Phone number
5. Display CSR,PKEY on client install page as download option
6. Remember form filled content when swapping between CSR Generating to install client tab
