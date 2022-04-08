# m2-tiktokpixel

##Commercers Tiktok Pixel Extension This extension allows to add Tiktok Pixel Code in your store to track your visitors’ events and the effectiveness of your Facebook ads.

##Support: version - 2.3.x, 2.4.x

##How to install Extension

#How to set up and install Tiktok Pixel:

#Enable Extension:

php bin/magento module:enable Commercers_TiktokPixel
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento cache:flush
