# Blinx

This repository is the onboarding platform for Blinx users. Blinx aims to connect willing volunteers to blind people
in need of assistance. Overprotection is a pivotal problem for the blind community. Very often, their only support 
system is other blind people and their family members. The app aims to ease the process of finding and affording help :)

Folder structure:

The app is built in php for ease of maintenance.

- Static webpages served up are present in form-1/
- Pure php code which provides routing logic and DB r/w 
functionality is present in form-1/php/
- The UI is elementary HTML+CSS powered by bootstrap.
- The intention is to port all static pages to dynamic php
pages and utilise common templates are assets. Most of these pages have been ported and are present 
in the root directory.

Routing logic:
The routing logic is present in the php files called upon 
form submissions. Simple 302 redirects are used to move 
along the webflow. 

Facebook and Google login:
The app allows for login through Facebook and Google. 
This involves O-Auth authentication with the domains using
auth keys provided upon app registration.



		

