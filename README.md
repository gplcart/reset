[![Build Status](https://scrutinizer-ci.com/g/gplcart/reset/badges/build.png?b=master)](https://scrutinizer-ci.com/g/gplcart/reset/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gplcart/reset/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gplcart/reset/?branch=master)

Reset is a [GPL Cart](https://github.com/gplcart/gplcart) module that allows superadmin to quickly drop all existing database tables and config files created during installation. Then it redirects to installation page. NOTE: all other files (e.g images) remain untouched.


**Installation**

1. Download and extract to `system/modules` manually or using composer `composer require gplcart/reset`. IMPORTANT: If you downloaded the module manually, be sure that the name of extracted module folder doesn't contain a branch/version suffix, e.g `-master`. Rename if needed.
2. Go to `admin/tool/reset` end reset your installation