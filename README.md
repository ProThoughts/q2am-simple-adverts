SIMPLE ADVERTS
==============
VERSION 1.3.1
-------------
This plugin will allow to add image advert, google adsense or HTML after every nth question in list all list views.

Features
--------
- Add image advert (jpg, gif, png)
- Add google adsense
- Add HTML markup advert
- Control every nth iteration
- Add image adver to any template page (new)

Installation Guide
------------------
1. Extrat zip file.
2. Place directory called `q2am-simple-adverts` in qa-plugin folder.
3. Done

Usage Guide
-----------

once you complete installation than you can start to use the plugin with following steps.

1. Login with admin id.
2. Go to Admin > Plugins page.
3. Scroll down to "Q2AM Simple Adverts" in plugin list.
4. Click on "options" link to jump to the options section,

Here you will find all available options to customize your advert.

### Options

##### Enable Adverts 
Enable or disable Q2AM Simple Adverts plugin.

##### Image Advert 
If selected than allow to use image advert. (e.g jpg, png, gif etc).   
Note: This option will be ignored if Google Adsense or HTML option is active.

##### Image Full URL 
Place full image url for the image advert leading with http:// (e.g http://www.domain.com/adverts/demo-advert.jpg)

##### Advert Link
Place full url leading with http:// for destination link to drive user after click (e.g. http://www.q2amarket.com)

##### Google Adsense or HTML 
If selected it will allow to use google adsense code or custom HTML markup.

##### Google Adsense or HTML Code 
Place google adsense or HTML markup for adverts.

##### Display After Every 
After how many questons you want to repeat advert in all question listings.  
Default: 5

##### Save Changes
Will save all changes.

##### Reset to Defaults
Will discard all changes and reset to default settings.

Hook
====
For page template advert by default it will only add image advert below to the page heading. However it is very easy to move it to anywhere else you like, also can add on multiple places on the page.

Place below method in your theme or directly modify `qa-adverts-layer.php`
````php
$this->page_advert(); // just place it to display page image advert
````

Change Logs V1.3.1
==================
- Fixed enable-disable ***conditional*** statement issue

Change Logs V1.3
================
- Fixed reported [option bloat][v1.2github-issue] issue
- Added more page template advert below page heading
    - Ask
    - User
    - Question


Change Logs V1.2
================
- Fixed image advert issue
- Added page template advert below page heading
    - Home
    - Activity
    - Questions
    - Question
    - Categories
    - Tags
    - Users
    - Admin
    - Ask


About Question2Answer
=====================
[Question2Answer][q2a_link] is a open source question and answer system built on PHP. Built with great flexibilities to customize according to the requirements. [Find out Question2Answer community][q2a_community]

About Q2A Market
================
[Q2A Market ][author]is the leading developer for Question2Answer open source system. It is providing high quality theme, plugins and customization service.

---
Find out more for [Q2A Market][author]  
Premium and free themes and plugins on [Q2A Market Store][store]  
Watch all Q2A Market product guide and free tutorials on [TV-Q2A Market][tv]

---

Follow Us
=========
####[Facebook][fb]  
####[Twitter][twit]  
####[Google Plus][gp]  
####[Linkedin][ln]  
####[Youtube][yt] 
####[Vimeo][vm]
####[Pinterest][pin]  
####[Skype][skp]  


Disclaimer
----------
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
See the [GNU General Public License][GNU] for more details.

[q2a_link]:http://www.question2answer.org
[q2a_community]:http://www.question2answer.org/qa/
[author]: http://www.q2amarket.com
[tv]: http://tv.q2amarket.com
[GNU]:http://www.gnu.org/licenses/gpl.html
[store]:http://store.q2amarket.com
[fb]: https://www.facebook.com/q2amarket
[twit]: https://twitter.com/Q2AMarket
[gp]: https://plus.google.com/101360115965915958175/about
[ln]: http://www.linkedin.com/in/q2amarket
[yt]: http://www.youtube.com/user/q2amarket
[pin]: http://pinterest.com/q2amarket/
[vm]: https://vimeo.com/q2amarket
[skp]: http://myskype.info/q2amarket
[v1.2github-issue]: https://github.com/q2amarket/q2am-simple-adverts/issues/3