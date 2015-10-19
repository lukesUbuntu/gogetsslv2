GoGetSSLv2 version 1.1.0
###GoGetSSLv2 Extended Module For Blesta Billing System
[**Blesta**](http://www.blesta.com) is a professional web based billing and support application focusing on productivity and usability.

[**GoGetSSL**](https://www.gogetssl.com) offer's a wide range of SSL certificates and a reseller program.

This module is a extended version of the standard GoGetSSL Blesta Module, alot has been re-written and the main goal is to provide a user friendly certificate module, currently added :
* Allows certificate to be added after order/purchase
* Support for EMAIL/HTTP/DNS Authentications
* Download CSR/PKEY Options
* Generate CSR
* [View Screenshots](#-screenshots)

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
* Add Administration re-issuing of certificate options.
* Add email tags for when issuing new certificate.
* Add option to send out email after installation has been completed.
* Add support for multi-domain certificates (SANs). [#3](https://github.com/lukesUbuntu/gogetsslv2/issues/3)
* Import previous clients order into module. [#6](https://github.com/lukesUbuntu/gogetsslv2/issues/6)


####### CHANGELOG #######
version 1.1.0 
* fixed [Other Auth Issue](https://github.com/lukesUbuntu/gogetsslv2/issues/2)
* fixed loading screen on re-issue cert tab

version 1.0.9 
* fixed [Live Issue](https://github.com/lukesUbuntu/gogetsslv2/issues/1)
* When submitting cert for install shows loading screen


####### SOME SCREENSHOTS #######
Order Page
* ![Order page](http://i.imgur.com/bkCVxq3.png)

DNS Install Method
* ![DNS Install](http://i.imgur.com/LnaezDW.png)

HTTP Install Method
* ![DNS Install](http://i.imgur.com/CFBKigx.png)

Generating CSR
* ![Generating CSR](http://i.imgur.com/HQ4rOM1.png)
* ![Generating CSR](http://i.imgur.com/c5Kc5Gp.png)
