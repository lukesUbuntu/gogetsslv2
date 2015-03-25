GoGetSSLv2 version 1.0.8
###GoGetSSLv2 Extended Module For Blesta Billing System
[**Blesta**](http://www.blesta.com) is a professional web based billing and support application focusing on productivity and usability.

[**GoGetSSL**](https://www.gogetssl.com) offer's a wide range of SSL certificates and a reseller program.

This module is a extended version of the standard GoGetSSL Blesta Module, alot has been re-written and added :
* Allows certs to be added after order/purchase
* Add support for HTTP/DNS Authentaction
* Can download CSR/PKEY options
* Can generate CSR Key's

####### NOTES #######
This is first initial release so please use at your *own risk*, I have done a ton of *sandbox* testing, and only several **live** testing, please [submit](https://github.com/lukesUbuntu/gogetsslv2/issues) any issues, and check [todo list](#-todo)

## Installation instructions
1. [Download](https://github.com/lukesUbuntu/gogetsslv2/archive/master.zip) this module
2. Uncompress file, then inside the folder rename the root folder to *gogetsslv2* 
3. Upload *gogetsslv2* folder to your blesta root dir to */componets/modules/* directory.
3. Go to Blesta Admin, and click on Setings->Modules and it will list the GoGetSSLv2 module, Click on "INSTALL"
4. Go to GoGetSSLv2 module and add your GoGetSSL Reseller Account.

####### TODO #######
* Update language file, some hardcoded elements need to be moved.
* Clean up some of the template files.
* Generate CSR download key options need to be linked in.
* Add *required fields* for client install Form Title,International Phone number.
* Display CSR,PKEY on client install page as download option.
* Remember form filled content when swapping between CSR Generating to install client tab.
* Fix when submitting install to show blesta loading screen.
* Add Administration re-issuing of certificate options.
* Add email tags for when issuing new certificate 
